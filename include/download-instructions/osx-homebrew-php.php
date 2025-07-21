<p>
On the command line, run the following commands:
</p>
<pre class="shellCommands">
brew tap shivammathur/php
brew install php@<?= $version; ?>

brew link --force --overwrite php@<?= $version; ?>
</pre>
