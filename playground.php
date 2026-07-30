<?php
$_SERVER['BASE_PAGE'] = 'playground.php';
include_once __DIR__ . '/include/prepend.inc';

site_header(
    'Playground',
    [
        'current' => 'playground',
        'css' => ['playground.css'],
        'description' => 'Run PHP code in your browser. The PHP Playground runs a real PHP build compiled to WebAssembly, entirely client-side.',
    ],
);
?>

<div class="playground-page">
  <h1>Playground</h1>
  <p class="lead">
    Write PHP and run it right here. The code executes in your browser
    through a real PHP interpreter compiled to WebAssembly. Nothing
    is sent to a server.
  </p>

  <div class="playground-toolbar" role="toolbar" aria-label="Playground controls">
    <button id="run" class="btn btn-primary" type="button" disabled>
      <span class="btn-icon" aria-hidden="true">&#9654;</span> Run
      <kbd>&#8984;&#9166;</kbd>
    </button>
    <button id="stop" class="btn" type="button" disabled>Stop</button>
    <button id="clear" class="btn" type="button">Clear output</button>

    <label class="examples">
      <span>Examples</span>
      <select id="examples" aria-label="Load an example">
        <option value="hello">Hello, world</option>
        <option value="array">Arrays &amp; functions</option>
        <option value="classes">Classes &amp; interfaces</option>
        <option value="include">Multiple files (include)</option>
        <option value="web">HTML page (Web output)</option>
        <option value="exception">Uncaught exception (stack trace)</option>
        <option value="warning">Warning &amp; notice</option>
        <option value="parse">Parse error</option>
      </select>
    </label>

    <span class="spacer"></span>
    <span id="status" class="status status-loading">Loading PHP&hellip;</span>
    <span id="version" class="version-badge" title="Bundled PHP version">PHP</span>
  </div>

  <div class="playground-panes">
    <section class="pane pane-editor" aria-label="PHP source">
      <div class="pane-head pane-head--editor">
        <div id="tabs" class="tabs" role="tablist" aria-label="Source files"></div>
        <button id="add-file" class="tab-add" type="button" title="Add a file" aria-label="Add a file">+&nbsp;File</button>
      </div>
      <textarea id="editor" aria-label="PHP source code" spellcheck="false"></textarea>
    </section>

    <section class="pane pane-output" aria-label="Output">
      <div class="pane-head">
        <span class="pane-title">Output</span>
        <div class="seg" role="group" aria-label="Output view">
          <button id="mode-raw" class="seg-btn is-active" type="button" aria-pressed="true" title="Plain-text output, like the PHP CLI">Raw</button>
          <button id="mode-preview" class="seg-btn" type="button" aria-pressed="false" title="Render the output as HTML, like a web page">Preview</button>
        </div>
        <span id="timing" class="timing"></span>
      </div>
      <div id="output" class="output" aria-live="polite">
        <p class="output-placeholder">Press <kbd>Run</kbd> to execute the code.</p>
      </div>
    </section>
  </div>
</div>

<script type="module" src="/cached.php?t=<?php echo @filemtime(__DIR__ . '/js/playground.js'); ?>&amp;f=/js/playground.js"></script>

<?php site_footer(); ?>
