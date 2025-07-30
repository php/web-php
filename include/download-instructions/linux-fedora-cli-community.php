<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
sudo dnf install -y dnf-plugins-core
sudo dnf install -y https://rpms.remirepo.net/fedora/remi-release-$(rpm -E %fedora).rpm
sudo dnf module reset php -y
sudo dnf module enable php:remi-<?= $version; ?> -y
sudo dnf install -y php
</code></pre>
