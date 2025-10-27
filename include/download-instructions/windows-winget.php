<p>
On the command line, run the following commands:
</p>
<?php

$wingetPackageName = 'PHP.PHP.' . $version;
$wingetPackageDescription = 'PHP ' . $version . ' - Thread-safe';

if (isset($options['usage']) && $options['usage'] === 'cli') {
    $wingetPackageName = 'PHP.PHP.NTS.' . $version;
    $wingetPackageDescription = 'PHP ' . $version . ' - Not-Thread safe';
}
?>
<pre><code class="language-powershell line-numbers">
# Download and install <?= $wingetPackageDescription ?>

winget install <?= $wingetPackageName ?>
</code></pre>
<?php
unset($wingetPackageDescription, $wingetPackageName);
