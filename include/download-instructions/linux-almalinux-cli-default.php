<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# update the packages
sudo dnf update

# install PHP with default extensions
sudo dnf install php -y
</code></pre>

<p>
If you want to add various PHP extensions, on the command line run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# add a new non-default PHP extensions, for instance php-intl
sudo dnf install php-intl -y

# add a new PECL PHP extension, for instance Redis
sudo dnf install php-pecl-redis -y
</code></pre>
<h3>Note</h3>
<p>
Instructions for setting up a development environment with PHP on AlmaLinux 9 and 10, running on Windows WSL2 or on virtual servers, can be found on:
</p>
<p>
» <a href='https://docs.dotkernel.org/development/'>https://docs.dotkernel.org/development/</a>
</p>
