<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# Add the ondrej/php repository.
sudo apt update
sudo apt install -y software-properties-common
sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y
sudo apt update

# Install PHP.
sudo apt install -y php<?= $version; ?>
</code></pre>
