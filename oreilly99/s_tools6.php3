<?php require "header.inc"?>
<h1>Session Variables</h1>

<p>Variables whose value are persistent across page views.

<p>Register a variable with <code>session_register(variable, value)</code>

<p>Automatically does cookie-based tracking of sessions once a
variable is set.

<p>You can set pass the session in the PATH_INFO (requires mod_rewrite
tricks to pull it back out) or by adding it as a GET value (using
the SID constant).

<?php require "footer.inc"?>
