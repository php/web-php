<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# Add the packages.sury.org/php repository.
sudo apt-get update
sudo apt-get install -y lsb-release ca-certificates curl
sudo curl -sSLo /tmp/debsuryorg-archive-keyring.deb https://packages.sury.org/debsuryorg-archive-keyring.deb
sudo dpkg -i /tmp/debsuryorg-archive-keyring.deb
sudo tee /etc/apt/sources.list.d/php.sources &lt;&lt;EOF
Types: deb
URIs: https://packages.sury.org/php/
Suites: $(lsb_release -sc)
Components: main
Signed-By: /usr/share/keyrings/debsuryorg-archive-keyring.gpg
EOF
sudo apt-get update

# Install PHP.
sudo apt-get install -y php<?= $version; ?>
</code></pre>
