const WORKER_URL = '/js/playground-worker.js';
const EDITOR_URL = '/js/ext/codemirror-php.mjs';
const WORKDIR = '/playground/';

// A PHP diagnostic headline, with or without the "PHP " log prefix.
const SEVERITY =
  /^(?:PHP\s+)?(Parse error|Fatal error|Recoverable fatal error|Warning|Deprecated|Notice|Strict Standards|Error):\s/;
const THROWN = /^\s*thrown in .* on line \d+\s*$/;
const SCRIPT_FAILED = /^Failed to execute PHP script\.?\s*$/;

const EXAMPLES = {
  hello: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

echo "Hello, world!\\n";

$version = phpversion();
printf("Running on PHP %s\\n", $version);
`,
      },
    ],
  },
  array: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

$numbers = range(1, 10);

$squares = array_map(fn ($n) => $n ** 2, $numbers);
$even    = array_filter($squares, fn ($n) => $n % 2 === 0);

echo implode(', ', $even), "\\n";
echo 'Sum: ', array_sum($squares), "\\n";
`,
      },
    ],
  },
  json: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

$release = [
    'name' => 'PHP',
    'version' => PHP_VERSION,
    'released' => date('Y-m-d'),
    'features' => ['pipe operator', 'clone with', 'URI parsing'],
];

$json = json_encode($release, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
echo $json, "\\n\\n";

$decoded = json_decode($json, associative: true);
echo 'Newest feature: ', end($decoded['features']), "\\n";
`,
      },
    ],
  },
  classes: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

interface Shape
{
    public function area(): float;
}

final class Circle implements Shape
{
    public function __construct(private readonly float $r) {}

    public function area(): float
    {
        return M_PI * $this->r ** 2;
    }
}

$c = new Circle(2.0);
printf("Area: %.4f\\n", $c->area());
`,
      },
    ],
  },
  include: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

// Entry point. Pull in helpers and a class from sibling files.
require __DIR__ . '/greeting.php';
require __DIR__ . '/Counter.php';

echo greet('world'), "\\n";

$c = new Counter();
$c->bump();
$c->bump();
printf("Counter is at %d\\n", $c->value());
`,
      },
      {
        name: 'greeting.php',
        content: `<?php

function greet(string $who): string
{
    return "Hello, {$who}!";
}
`,
      },
      {
        name: 'Counter.php',
        content: `<?php

final class Counter
{
    private int $n = 0;

    public function bump(): void { $this->n++; }
    public function value(): int { return $this->n; }
}
`,
      },
    ],
  },
  enums: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

enum Suit: string
{
    case Hearts = '♥';
    case Diamonds = '♦';
    case Clubs = '♣';
    case Spades = '♠';

    public function color(): string
    {
        return match ($this) {
            Suit::Hearts, Suit::Diamonds => 'red',
            Suit::Clubs, Suit::Spades => 'black',
        };
    }
}

foreach (Suit::cases() as $suit) {
    printf("%s %-8s is %s\\n", $suit->value, $suit->name, $suit->color());
}
`,
      },
    ],
  },
  generators: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

// Generators produce values lazily: the sequence is infinite,
// but only the values we ask for are ever computed.
function fibonacci(): Generator
{
    [$current, $next] = [0, 1];
    while (true) {
        yield $current;
        [$current, $next] = [$next, $current + $next];
    }
}

foreach (fibonacci() as $index => $number) {
    if ($index >= 10) {
        break;
    }
    echo $number, ' ';
}
echo "\\n";
`,
      },
    ],
  },
  hooks: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

// Property hooks (PHP 8.4): computed properties without boilerplate getters.
final class Temperature
{
    public float $fahrenheit {
        get => $this->celsius * 9 / 5 + 32;
        set => $this->celsius = ($value - 32) * 5 / 9;
    }

    public function __construct(public float $celsius) {}
}

$temperature = new Temperature(25.0);
printf("%.1f °C is %.1f °F\\n", $temperature->celsius, $temperature->fahrenheit);

$temperature->fahrenheit = 100.0;
printf("100 °F is %.1f °C\\n", $temperature->celsius);
`,
      },
    ],
  },
  pipe: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

// The pipe operator (PHP 8.5) chains calls left to right.
$slug = '  Hello, PHP 8.5 Playground!  '
    |> trim(...)
    |> strtolower(...)
    |> (fn (string $text) => preg_replace('/[^a-z0-9]+/', '-', $text))
    |> (fn (string $text) => trim($text, '-'));

echo $slug, "\\n";
`,
      },
    ],
  },
  web: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

// Switch the Output toggle to "Preview" to see this rendered as a page.
$langs = ['PHP', 'JavaScript', 'Python', 'Rust'];
?>
<!doctype html>
<style>
  body { font-family: system-ui, sans-serif; margin: 2rem; color: #1c1e2b; }
  h1   { color: #4F5B93; }
  li   { margin: .2rem 0; }
</style>
<h1>Hello from PHP</h1>
<p>The current time is <strong><?= date('H:i:s') ?></strong>.</p>
<ul>
<?php foreach ($langs as $lang): ?>
  <li><?= htmlspecialchars($lang) ?></li>
<?php endforeach; ?>
</ul>
`,
      },
    ],
  },
  exception: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

function parseAge(string $value): int
{
    if (!ctype_digit($value)) {
        throw new InvalidArgumentException("Not a number: {$value}");
    }

    return (int) $value;
}

function register(string $age): void
{
    $parsed = parseAge($age);
    echo "Registered, age {$parsed}\\n";
}

register('forty');
`,
      },
    ],
  },
  warning: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

$data = ['name' => 'Rasmus'];

// Reading a missing key emits a warning, then execution continues.
echo $data['email'], "\\n";

echo "Still running afterwards\\n";
`,
      },
    ],
  },
  parse: {
    entry: 'index.php',
    files: [
      {
        name: 'index.php',
        content: `<?php

// A missing semicolon below is a compile-time parse error.
$greeting = 'hello'
echo $greeting;
`,
      },
    ],
  },
};

const elEditor = document.getElementById('editor');
const elTabs = document.getElementById('tabs');
const elAddFile = document.getElementById('add-file');
const elOutput = document.getElementById('output');
const elRun = document.getElementById('run');
const elStop = document.getElementById('stop');
const elClear = document.getElementById('clear');
const elExamples = document.getElementById('examples');
const elStatus = document.getElementById('status');
const elTiming = document.getElementById('timing');
const elVersion = document.getElementById('version');
const elModeRaw = document.getElementById('mode-raw');
const elModePreview = document.getElementById('mode-preview');

let outputMode = 'raw';
let hasRun = false;
let editor = null;
let view = null;

async function initEditor() {
  try {
    editor = await import(EDITOR_URL);
    view = editor.createView(elEditor.parentNode);
    elEditor.hidden = true;
  } catch (error) {
    console.warn('CodeMirror unavailable; using a plain textarea.', error);
    editor = null;
    view = null;
  }
}

/* ---- File model -------------------------------------------------------- */
let files = [];
let entryName = null;
let activeName = null;

function makeDocument(text) {
  return view ? editor.makeState(text) : { value: text };
}

function documentValue(file) {
  return view ? file.doc.doc.toString() : file.doc.value;
}

function fileByName(name) {
  return files.find((file) => file.name === name) ?? null;
}

function syncActiveDocument() {
  const current = activeName ? fileByName(activeName) : null;
  if (!current) {
    return;
  }
  if (view) {
    current.doc = view.state;
  } else {
    current.doc.value = elEditor.value;
  }
}

function setActive(name) {
  const file = fileByName(name);
  if (!file) {
    return;
  }
  syncActiveDocument();
  activeName = name;
  if (view) {
    view.setState(file.doc);
  } else {
    elEditor.value = file.doc.value;
  }
  renderTabs();
  view?.focus();
}

function setEntry(name) {
  if (!fileByName(name)) {
    return;
  }
  entryName = name;
  renderTabs();
}

/* Read a filename from the user, normalised and checked for clashes. Returns
 * null if cancelled, blank, or a duplicate (excludeName allows a no-op rename
 * back to the same name). */
function promptName(message, initial, excludeName) {
  const input = window.prompt(message, initial || '');
  if (input == null) {
    return null;
  }
  const name = input.trim().replace(/^\/+/, '');
  if (!name) {
    return null;
  }
  if (fileByName(name) && name !== excludeName) {
    window.alert(`A file named “${name}” already exists.`);
    return null;
  }
  return name;
}

function addFile() {
  const name = promptName('New file name (e.g. helpers.php):', '');
  if (!name) {
    return;
  }
  files.push({ name, doc: makeDocument('<?php\n\n') });
  if (!entryName) {
    entryName = name;
  }
  setActive(name);
}

function renameFile(oldName) {
  const file = fileByName(oldName);
  if (!file) {
    return;
  }
  const name = promptName('Rename file:', oldName, oldName);
  if (!name || name === oldName) {
    return;
  }
  file.name = name;
  if (entryName === oldName) {
    entryName = name;
  }
  if (activeName === oldName) {
    activeName = name;
  }
  renderTabs();
}

function deleteFile(name) {
  if (files.length <= 1) {
    return;
  }
  if (!window.confirm(`Delete “${name}”?`)) {
    return;
  }
  const index = files.findIndex((file) => file.name === name);
  if (index < 0) {
    return;
  }
  files.splice(index, 1);
  if (entryName === name) {
    entryName = files[0].name;
  }
  if (activeName === name) {
    activeName = null;
    setActive(files[Math.max(0, index - 1)].name);
  } else {
    renderTabs();
  }
}

function renderTabs() {
  elTabs.replaceChildren();
  for (const file of files) {
    const isEntry = file.name === entryName;
    const isActive = file.name === activeName;

    const tab = document.createElement('div');
    tab.className = `tab${isActive ? ' is-active' : ''}${isEntry ? ' is-entry' : ''}`;
    tab.setAttribute('role', 'tab');
    tab.setAttribute('aria-selected', String(isActive));

    const entryButton = document.createElement('button');
    entryButton.type = 'button';
    entryButton.className = 'tab-entry';
    entryButton.textContent = isEntry ? '▶' : '▷';
    entryButton.title = isEntry
      ? 'Entry point - this file runs on Run'
      : 'Set as entry point';
    entryButton.setAttribute('aria-label', entryButton.title);
    entryButton.addEventListener('click', (event) => {
      event.stopPropagation();
      setEntry(file.name);
    });
    tab.appendChild(entryButton);

    const nameElement = document.createElement('span');
    nameElement.className = 'tab-name';
    nameElement.textContent = file.name;
    nameElement.title = 'Double-click to rename';
    nameElement.addEventListener('dblclick', (event) => {
      event.stopPropagation();
      renameFile(file.name);
    });
    tab.appendChild(nameElement);

    if (files.length > 1) {
      const closeButton = document.createElement('button');
      closeButton.type = 'button';
      closeButton.className = 'tab-close';
      closeButton.textContent = '×';
      closeButton.title = 'Delete file';
      closeButton.setAttribute('aria-label', `Delete ${file.name}`);
      closeButton.addEventListener('click', (event) => {
        event.stopPropagation();
        deleteFile(file.name);
      });
      tab.appendChild(closeButton);
    }

    tab.addEventListener('click', () => setActive(file.name));
    elTabs.appendChild(tab);
  }
}

function loadExample(key) {
  const example = EXAMPLES[key];
  if (!example) {
    return;
  }
  files = example.files.map((file) => ({ name: file.name, doc: makeDocument(file.content) }));
  entryName = example.entry || files[0].name;
  activeName = null;
  setActive(entryName);
}

// Snapshot every file's current text for the worker.
function collectFiles() {
  syncActiveDocument();
  return files.map((file) => ({ name: file.name, content: documentValue(file) }));
}

/* ---- Worker lifecycle --------------------------------------------------- */
let worker = null;
let mode = 'boot'; // boot | warmup | running | idle
let stdoutBuffer = [];

function spawnWorker() {
  worker = new Worker(WORKER_URL, { type: 'module' });
  worker.onmessage = onWorkerMessage;
  worker.onerror = (event) => {
    handleFatal(
      'The execution worker failed to start.\n' + (event?.message || ''),
    );
  };
}

function warmup() {
  // Instantiate the module once up front: it confirms readiness, surfaces a
  // broken build immediately, and lets us read the real PHP version.
  mode = 'warmup';
  stdoutBuffer = [];
  setStatus('Loading PHP…', 'loading');
  worker.postMessage({
    files: [{ name: 'version.php', content: '<?php echo PHP_VERSION;' }],
    entry: 'version.php',
  });
}

function onWorkerMessage(event) {
  const message = event.data || {};
  switch (message.type) {
    case 'stdout':
      if (mode === 'running') {
        stdoutBuffer.push(message.text);
        renderLive();
      } else if (mode === 'warmup') {
        stdoutBuffer.push(message.text);
      }
      break;
    case 'done':
      if (mode === 'warmup') {
        finishWarmup();
      } else if (mode === 'running') {
        finishRun(message.ms);
      }
      break;
    case 'fatal':
      handleFatal(message.text, message.ms);
      break;
  }
}

function finishWarmup() {
  const version = stdoutBuffer.join('').trim();
  if (/^\d+\.\d+/.test(version)) {
    elVersion.textContent = `PHP ${version}`;
    elVersion.title = `Bundled PHP version ${version}`;
  }
  setReady();
}

/* ---- Run / Stop ---------------------------------------------------------- */
function run() {
  if (mode !== 'idle') {
    return;
  }
  stdoutBuffer = [];
  mode = 'running';
  elOutput.replaceChildren();
  elTiming.textContent = '';
  setStatus('Running…', 'running');
  elRun.disabled = true;
  elStop.disabled = false;
  worker.postMessage({ files: collectFiles(), entry: entryName });
}

function stop() {
  if (mode !== 'running') {
    return;
  }
  // A run is a synchronous WASM call; the only way to abort it is to kill the
  // worker. Spawn a fresh one so the next Run is ready to go.
  worker.terminate();
  spawnWorker();
  hasRun = true;
  renderFinal();
  appendExitLine('Execution stopped.');
  setReady();
}

function finishRun(ms) {
  hasRun = true;
  renderFinal();
  if (typeof ms === 'number') {
    elTiming.textContent = `${ms} ms`;
  }
  setReady();
}

function handleFatal(text, ms) {
  if (mode === 'running') {
    hasRun = true;
    renderFinal();
    appendDiagnosticBlock({ headline: `Fatal error: ${text}`, rest: [], severity: 'Fatal error' }, false);
    if (typeof ms === 'number') {
      elTiming.textContent = `${ms} ms`;
    }
    setReady();
  } else {
    // Boot/warmup failure: the build is missing or the worker won't start.
    mode = 'idle';
    elRun.disabled = false;
    elStop.disabled = true;
    setStatus('PHP unavailable', 'error');
    elOutput.replaceChildren();
    appendDiagnosticBlock({ headline: text, rest: [], severity: 'Fatal error' }, false);
  }
}

/* ---- Output rendering ---------------------------------------------------- */

// Live, unstyled echo of stdout while a script runs, so long jobs show progress.
function renderLive() {
  if (outputMode !== 'raw') {
    return;
  }
  const lines = trimTrailingBlank(dropScriptFailed(stdoutBuffer.slice()));
  let span = elOutput.querySelector('.out-stdout.live');
  if (!lines.length) {
    span?.remove();
    return;
  }
  if (!span) {
    span = document.createElement('span');
    span.className = 'out-stdout live';
    elOutput.appendChild(span);
  }
  span.textContent = lines.join('\n');
}

// Build the final output in whichever view is selected.
function renderFinal() {
  elOutput.classList.toggle('is-preview', outputMode === 'preview');
  if (outputMode === 'preview') {
    renderPreview();
  } else {
    renderRaw();
  }
}

// Render PHP's output as an HTML document inside a sandboxed iframe - what you
// would see if the script were served by a web SAPI.
function renderPreview() {
  elOutput.replaceChildren();
  const iframe = document.createElement('iframe');
  iframe.className = 'preview-frame';
  iframe.setAttribute('sandbox', 'allow-scripts allow-modals allow-forms');
  iframe.setAttribute('title', 'Rendered HTML output');
  iframe.srcdoc = dropScriptFailed(stdoutBuffer.slice()).join('');
  elOutput.appendChild(iframe);
}

// Raw view: program text plus extracted, styled diagnostics.
function renderRaw() {
  elOutput.replaceChildren();

  const segments = parseSegments(trimTrailingBlank(dropScriptFailed(stdoutBuffer.slice())));
  for (const segment of segments) {
    if (segment.kind === 'out') {
      appendStdout(segment.text);
    } else {
      appendDiagnosticBlock(segment, isWarning(segment.severity));
    }
  }

  if (!elOutput.childNodes.length) {
    const placeholder = document.createElement('p');
    placeholder.className = 'output-placeholder';
    placeholder.textContent = '(no output)';
    elOutput.appendChild(placeholder);
  }
}

// Split a line array into ordered program-output and diagnostic segments.
function parseSegments(lines) {
  const segments = [];
  let buffer = [];

  const flush = () => {
    while (buffer.length && buffer[0] === '') {
      buffer.shift();
    }
    while (buffer.length && buffer[buffer.length - 1] === '') {
      buffer.pop();
    }
    if (buffer.length) {
      segments.push({ kind: 'out', text: buffer.join('\n') });
    }
    buffer = [];
  };

  for (let lineIndex = 0; lineIndex < lines.length; lineIndex++) {
    const match = lines[lineIndex].match(SEVERITY);
    if (!match) {
      buffer.push(lines[lineIndex]);
      continue;
    }

    flush();
    const headline = lines[lineIndex];
    const rest = [];
    lineIndex++;
    // A Fatal/Parse error may be followed by a stack trace; consume the
    // "Stack trace:" header, the "#N …" frames and the trailing "thrown in"
    // line, and nothing past it.
    while (lineIndex < lines.length) {
      const line = lines[lineIndex];
      if (/^Stack trace:/.test(line) || /^#\d+/.test(line) || THROWN.test(line)) {
        rest.push(line);
        lineIndex++;
        if (THROWN.test(line)) {
          break;
        }
      } else {
        break;
      }
    }
    lineIndex--; // for-loop will re-increment
    segments.push({ kind: 'diag', headline, rest, severity: match[1] });
  }
  flush();
  return segments;
}

function isWarning(severity) {
  return /warning|deprecated|notice|strict/i.test(severity || '');
}

function appendStdout(text) {
  const span = document.createElement('span');
  span.className = 'out-stdout';
  span.textContent = `${text}\n`;
  elOutput.appendChild(span);
}

function appendDiagnosticBlock(block, warning) {
  const container = document.createElement('div');
  container.className = `diagnostic${warning ? ' is-warning' : ''}`;

  const headline = document.createElement('span');
  headline.className = 'diag-headline';
  headline.textContent = relabel(block.headline);
  container.appendChild(headline);

  for (const rawLine of block.rest || []) {
    const line = relabel(rawLine);
    const node = document.createElement('span');
    if (/^Stack trace:/.test(line)) {
      node.className = 'diag-trace-head';
      node.textContent = line;
    } else if (/^#\d+/.test(line)) {
      node.className = 'diag-frame';
      const frameMatch = line.match(/^(#\d+)([\s\S]*)$/);
      const frameNumber = document.createElement('span');
      frameNumber.className = 'frame-no';
      frameNumber.textContent = frameMatch[1];
      node.appendChild(frameNumber);
      node.appendChild(document.createTextNode(frameMatch[2]));
    } else if (THROWN.test(line)) {
      node.className = 'diag-thrown';
      node.textContent = line.trim();
    } else {
      node.className = 'diag-frame';
      node.textContent = line;
    }
    container.appendChild(node);
  }

  elOutput.appendChild(container);
}

function appendExitLine(text) {
  const exitLine = document.createElement('p');
  exitLine.className = 'exit-line';
  exitLine.textContent = text;
  elOutput.appendChild(exitLine);
}

// Strip the worker's working-directory prefix so diagnostics and stack frames
// read as plain filenames.
function relabel(line) {
  return line.split(WORKDIR).join('');
}

function trimTrailingBlank(lines) {
  while (lines.length && lines[lines.length - 1] === '') {
    lines.pop();
  }
  return lines;
}

function dropScriptFailed(chunks) {
  return chunks.filter((chunk) => !SCRIPT_FAILED.test(chunk));
}

/* ---- Status helpers ------------------------------------------------------ */
function setStatus(text, kind) {
  elStatus.textContent = text;
  elStatus.className = `status status-${kind}`;
}

function setReady() {
  mode = 'idle';
  elRun.disabled = false;
  elStop.disabled = true;
  setStatus('', 'ready');
}

function setMode(newMode) {
  if (newMode === outputMode) {
    return;
  }

  outputMode = newMode;
  elModeRaw.classList.toggle('is-active', newMode === 'raw');
  elModePreview.classList.toggle('is-active', newMode === 'preview');
  elModeRaw.setAttribute('aria-pressed', String(newMode === 'raw'));
  elModePreview.setAttribute('aria-pressed', String(newMode === 'preview'));

  if (mode !== 'running' && hasRun) {
    renderFinal();
  }
}

function clearOutput() {
  stdoutBuffer = [];
  hasRun = false;
  elOutput.classList.remove('is-preview');
  elOutput.replaceChildren();
  const placeholder = document.createElement('p');
  placeholder.className = 'output-placeholder';
  placeholder.innerHTML = 'Press <kbd>Run</kbd> to execute the code.';
  elOutput.appendChild(placeholder);
  elTiming.textContent = '';
}

/* ---- Wiring -------------------------------------------------------------- */
elRun.addEventListener('click', run);
elStop.addEventListener('click', stop);
elAddFile.addEventListener('click', addFile);
elModeRaw.addEventListener('click', () => setMode('raw'));
elModePreview.addEventListener('click', () => setMode('preview'));
elClear.addEventListener('click', clearOutput);
elExamples.addEventListener('change', () => {
  loadExample(elExamples.value);
});
document.addEventListener('keydown', (event) => {
  if ((event.metaKey || event.ctrlKey) && event.key === 'Enter') {
    event.preventDefault();
    run();
  }
});

await initEditor();
loadExample('hello');
spawnWorker();
warmup();
