<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
sudo apt update
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php<?= $version; ?>
</code></pre>
