<?php require "header.inc"?>
<h1>Include, Require, and Readfile</h1>

<p>These allow you to include code or static HTML
from another file.

<p><code>require</code> is replaced with the contents of the file the
first time it is evaluated.

<p><code>include</code> evaluates the contents of its argument each
time it is evaluated.

<p><code>readfile</code> reads the file as static HTML (safe for
spitting out unsafe data)

<?php require "footer.inc"?>
