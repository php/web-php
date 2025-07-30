<p>
On the command line, run the following commands:
</p>
<pre><code class="language-powershell line-numbers">
# Download and install PHP.
powershell -c "& ([ScriptBlock]::Create((irm 'https://php.net/install/windows.ps1'))) -Version <?= $version; ?>"
</code></pre>
