<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# Add the Remi's RPM repository.
sudo subscription-manager repos --enable codeready-builder-for-rhel-$(rpm -E %rhel)-$(arch)-rpms
sudo dnf install -y dnf-plugins-core
sudo dnf install -y https://dl.fedoraproject.org/pub/epel/epel-release-latest-$(rpm -E %rhel).noarch.rpm
sudo dnf install -y https://rpms.remirepo.net/enterprise/remi-release-$(rpm -E %rhel).rpm
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
