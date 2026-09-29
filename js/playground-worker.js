/*
 * Playground execution worker: runs the editor's files through the PHP
 * WebAssembly build that also powers the manual's interactive examples
 * (/js/php-web.mjs + /js/php-web.wasm).
 *
 * Protocol (main -> worker): { files: [{name, content}], entry }
 * Protocol (worker -> main): { type: 'stdout', text }
 *                            { type: 'done', ms }
 *                            { type: 'fatal', text, ms? }
 */

if (typeof self.window === 'undefined') {
  // Parts of the Emscripten loader expect a window global.
  self.window = self;
}

// The directory the editor's files are materialised in. The main thread strips
// this prefix back off filenames in diagnostics, so traces read as "lib.php"
// rather than "/playground/lib.php".
const WORKDIR = '/playground';

const PHP_MODULE_URL = '/js/php-web.mjs';
const PHP_WASM_URL = '/js/php-web.wasm';

let createPhpModule = null;

async function loadFactory() {
  if (!createPhpModule) {
    const phpModule = await import(PHP_MODULE_URL);
    createPhpModule = phpModule.default;
  }
  return createPhpModule;
}

// Compile php-web.wasm exactly once and reuse the resulting WebAssembly.Module
// across every run. Each run still instantiates a fresh module (fresh memory,
// globals and filesystem), but the expensive fetch + compile happens a single
// time instead of on every Run click.
let wasmModulePromise = null;

function getWasmModule() {
  if (!wasmModulePromise) {
    wasmModulePromise = WebAssembly.compileStreaming(fetch(PHP_WASM_URL)).catch(() => {
      // Dev servers that send the wrong MIME type (not application/wasm)
      // break compileStreaming; fall back to compiling the raw bytes.
      return fetch(PHP_WASM_URL)
        .then((response) => response.arrayBuffer())
        .then((bytes) => WebAssembly.compile(bytes));
    });
  }
  return wasmModulePromise;
}

self.onmessage = async (event) => {
  const data = event.data || {};
  const files = Array.isArray(data.files) ? data.files : [];
  const entry = data.entry || files[0]?.name;
  const started = performance.now();

  let factory;
  try {
    factory = await loadFactory();
  } catch (error) {
    self.postMessage({
      type: 'fatal',
      text: 'Could not load the PHP WebAssembly build (/js/php-web.mjs).\n\n'
        + String(error?.message || error),
    });
    return;
  }

  if (!entry) {
    self.postMessage({ type: 'fatal', text: 'No entry file to run.' });
    return;
  }

  try {
    // Fresh instance per run: a brand-new module guarantees a clean
    // filesystem and clean global state.
    const Module = await factory({
      print: (text) => self.postMessage({ type: 'stdout', text }),
      printErr: (text) => self.postMessage({ type: 'stdout', text }),
      // Reuse the once-compiled module instead of letting Emscripten fetch
      // and recompile php-web.wasm on every instantiation.
      instantiateWasm: (imports, successCallback) => {
        getWasmModule()
          .then((wasmModule) => WebAssembly.instantiate(wasmModule, imports))
          .then((instance) => successCallback(instance))
          .catch((error) => {
            self.postMessage({
              type: 'fatal',
              text: 'Failed to instantiate the PHP WebAssembly module.\n'
                + String(error?.message || error),
            });
          });
        return {}; // tells Emscripten the instantiation is async
      },
    });

    writeFiles(Module.FS, files);
    Module.FS.chdir(WORKDIR);
    Module.ccall('phpw', null, ['string'], [WORKDIR + '/' + sanitizeFileName(entry)]);

    self.postMessage({ type: 'done', ms: Math.round(performance.now() - started) });
  } catch (error) {
    // A WASM abort (e.g. out of memory, or a fatal that calls exit()) lands here.
    self.postMessage({
      type: 'fatal',
      text: String(error?.message || error),
      ms: Math.round(performance.now() - started),
    });
  }
};

function writeFiles(FS, files) {
  mkdirp(FS, WORKDIR);
  for (const file of files) {
    if (!file || !file.name) {
      continue;
    }
    const path = WORKDIR + '/' + sanitizeFileName(file.name);
    mkdirp(FS, dirname(path));
    FS.writeFile(path, file.content == null ? '' : String(file.content));
  }
}

function dirname(path) {
  const lastSlash = path.lastIndexOf('/');
  return lastSlash <= 0 ? '/' : path.slice(0, lastSlash);
}

function mkdirp(FS, path) {
  let current = '';
  for (const part of path.split('/').filter(Boolean)) {
    current += '/' + part;
    try {
      FS.mkdir(current);
    } catch (error) {
      /* EEXIST - fine. */
    }
  }
}

function sanitizeFileName(name) {
  return String(name)
    .split('/')
    .filter((segment) => segment && segment !== '.' && segment !== '..')
    .join('/');
}
