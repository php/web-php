<p>
On the command line, run the following commands:
</p>
<pre><code class="language-powershell line-numbers">
# Download and install Scoop.
powershell -c "irm https://get.scoop.sh | iex"

# Download and install PHP.
scoop bucket add versions
scoop install versions/php<?= $versionNoDot; ?>
</code></pre>
