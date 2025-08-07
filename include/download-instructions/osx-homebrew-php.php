<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# Download and install Homebrew.
curl -o- https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh | bash

# Install and link PHP.
brew install shivammathur/php/php@<?= $version; ?>

brew link --force --overwrite php@<?= $version; ?>
</code></pre>
