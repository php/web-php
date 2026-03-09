<?php if ($options['os'] === 'linux'): ?>
<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# Download and install FrankenPHP.
curl https://frankenphp.dev/install.sh | sh

# Serve the current directory.
frankenphp php-server
</code></pre>
<?php elseif ($options['os'] === 'osx'): ?>
<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# Install FrankenPHP using Homebrew.
brew install dunglas/frankenphp/frankenphp

# Serve the current directory.
frankenphp php-server
</code></pre>
<?php elseif ($options['os'] === 'windows'): ?>
<p>
In PowerShell, run the following commands:
</p>
<pre><code class="language-powershell line-numbers">
# Download and install FrankenPHP.
irm https://frankenphp.dev/install.ps1 | iex

# Serve the current directory.
frankenphp php-server
</code></pre>
<?php endif; ?>

<p>
For more information, see the <a href="https://frankenphp.dev/docs/">FrankenPHP documentation</a>.
</p>
