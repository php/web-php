<?php
// Try to make this page non-cached
header_nocache();

// No file to download
if (!isset($df)) {
    exit("No file requested for download");
}

// Could be a normal download or a manual download file
$possible_files = [$df, "manual/$df"];

$site_config = [
    'current' => 'downloads',
    'css' => ['mirror.css'],
];

// Find out what is the exact file requested
$file = false;
foreach ($possible_files as $name) {
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/distributions/' . $name)) {
        $file = $name;
        break;
    }
}

// Print out common header
site_header('Get Download', $site_config);

echo '<div id="mirrors-container">';
$size = 0;
// No downloadable file found
if ($file === false) {
        $info = "<p>
 The file you requested (<strong>" . htmlspecialchars($df, ENT_QUOTES, "UTF-8") . "</strong>) is not found on
 this server (<strong>{$MYSITE}</strong>).</p>";

    echo <<<EOT
<h1>Download not found</h1>
{$info}
EOT;
} else {
    // Set local file name
    $local_file = $_SERVER['DOCUMENT_ROOT'] . '/distributions/' . $file;
    // Try to get filesize to display
    $size = file_get_size($local_file);
}
?>
</div>


<?php site_footer();
