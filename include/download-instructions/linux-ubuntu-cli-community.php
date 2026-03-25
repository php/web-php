<div class="note">
<p>
	This installation method uses binaries provided by a third-party provider.
	It contains patches to the PHP source code added by the build provider,
	over which the PHP project has no control.
</p>
</div>
<div class="warning">
<p>
	Specifically, this provider includes <a
	href="https://salsa.debian.org/php-team/php/-/commit/aa12fa4540c8733ab6d68763b2107f39ec48fb37">a
	patch</a> that adds telemetry to the Apache 2 and PHP-FPM modules.
</p>
</div>
<pre><code class="language-bash line-numbers">
# Add the ondrej/php repository.
sudo apt update
sudo apt install -y software-properties-common
sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y
sudo apt update

# Install PHP.
sudo apt install -y php<?= $version; ?>
</code></pre>
