<?php require "header.inc"?>
<h1>Taking Advantage of the Include Path</h1>

<p>By using the include path, we can override global
parameters within individual directories.

<p>For example, say we have a copyright notice included
on every page, using <code>include 'copyright.inc';</code>.
If include_path is set to ".:/path/to/default", we will
pick up copyright.inc from the current directoriy if it
exists, otherwise we'll get the default.

<?php require "footer.inc"?>
