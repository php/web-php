<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
sudo apt-get update
sudo apt-get install -y lsb-release ca-certificates apt-transport-https curl
sudo curl -sSLo /tmp/debsuryorg-archive-keyring.deb https://packages.sury.org/debsuryorg-archive-keyring.deb
sudo dpkg -i /tmp/debsuryorg-archive-keyring.deb
sudo sh -c 'echo "deb [signed-by=/usr/share/keyrings/debsuryorg-archive-keyring.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" &gt; /etc/apt/sources.list.d/php.list'
sudo apt-get update
sudo apt-get install -y php<?= $version; ?>
</code></pre>
