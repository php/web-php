<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# Add the Remi's RPM repository.
sudo dnf install -y dnf-plugins-core
sudo dnf install -y https://rpms.remirepo.net/fedora/remi-release-$(rpm -E %fedora).rpm
<?php if ($multiversion) { ?>

# Install PHP (multiple versions).
sudo dnf install -y php<?= $versionNoDot; ?>
<?php } else { ?>
sudo dnf module reset php -y
sudo dnf module enable php:remi-<?= $version; ?> -y

# Install PHP (single/default version).
sudo dnf install -y php
<?php } ?>
</code></pre>
