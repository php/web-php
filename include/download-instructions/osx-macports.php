<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# Please refer to https://guide.macports.org/chunked/installing.macports.html for installing MacPorts.

# Install PHP <?= $version; ?>

sudo port install php<?= $versionNoDot; ?>


# Switch Active PHP <?= $version; ?> version
sudo port select --set php php<?= $versionNoDot; ?>
</code></pre>
