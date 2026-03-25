<p>
On the command line, run the commands below.
</p>
<p>
This installation method uses binaries provided by a third-party provider,
adding patches to the PHP source code that the PHP project has no control over.
</p>
<p>
Specifically, this provider includes
<a href="https://salsa.debian.org/php-team/php/-/commit/aa12fa4540c8733ab6d68763b2107f39ec48fb37">a patch</a>
that adds telemetry to the Apache 2 and PHP-FPM modules.
</p>
<pre><code class="language-bash line-numbers">
# Add the packages.sury.org/php repository.
sudo apt update
sudo apt install -y lsb-release ca-certificates curl
sudo curl -sSLo /tmp/debsuryorg-archive-keyring.deb https://packages.sury.org/debsuryorg-archive-keyring.deb
sudo dpkg -i /tmp/debsuryorg-archive-keyring.deb
sudo tee /etc/apt/sources.list.d/php.sources &lt;&lt;EOF
Types: deb
URIs: https://packages.sury.org/php/
Suites: $(lsb_release -sc)
Components: main
Signed-By: /usr/share/keyrings/debsuryorg-archive-keyring.gpg
EOF
sudo apt update

# Install PHP.
sudo apt install -y php<?= $version; ?>
</code></pre>
