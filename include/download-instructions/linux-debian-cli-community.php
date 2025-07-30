<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# Add the packages.sury.org/php repository.
sudo apt update
sudo apt install -y curl
curl -sSL https://packages.sury.org/php/README.txt | sudo bash -x

# Install PHP.
sudo apt-get install -y php<?= $version; ?>
</code></pre>
