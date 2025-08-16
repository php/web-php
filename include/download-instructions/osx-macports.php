<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# Please refer to https://guide.macports.org/chunked/installing.macports.html for installing MacPorts.
sudo port install php<?= $versionNoDot; ?>

# To install a previous version:
sudo port install php<?= $priorVersionNoDot; ?>

# To switch to a different version:
sudo port select php php<?= $priorVersionNoDot; ?>
</code></pre>
