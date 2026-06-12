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
<blockquote class="note"><p>
	<strong class="note">Note</strong>:
	The install script uses your distribution's packages (deb or RPM) when
	available, and those receive updates through the system package manager.
	If a standalone binary is installed instead, FrankenPHP does not update
	automatically: its dependencies (such as OpenSSL) are statically compiled
	into the binary, so you are responsible for updating FrankenPHP yourself,
	including when security fixes are released for those dependencies. To
	update the standalone binary, re-run the install script.
</p></blockquote>
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
<blockquote class="note"><p>
	<strong class="note">Note</strong>:
	The standalone binary installed by this script does not update
	automatically: its dependencies (such as OpenSSL) are statically compiled
	into the binary, so you are responsible for updating FrankenPHP yourself,
	including when security fixes are released for those dependencies. To
	update, re-run the install script in PowerShell.
</p></blockquote>
<?php endif; ?>

<p>
For more information, see the <a href="https://frankenphp.dev/docs/">FrankenPHP documentation</a>.
</p>
