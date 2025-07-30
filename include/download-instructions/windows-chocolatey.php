<p>
On the command line, run the following commands:
</p>
<pre><code class="language-powershell line-numbers">
# Download and install Chocolatey.
powershell -c "irm https://community.chocolatey.org/install.ps1|iex"

# Download and install PHP.
choco install php --version=<?= $version; ?> -y
</code></pre>
