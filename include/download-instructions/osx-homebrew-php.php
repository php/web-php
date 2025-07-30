<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
brew tap shivammathur/php
brew install php@<?= $version; ?>

brew link --force --overwrite php@<?= $version; ?>
</code></pre>
