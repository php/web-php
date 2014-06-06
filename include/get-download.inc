<?php
// $Id$

// Try to make this page non-cached
header_nocache();

// No file to download
if (!isset($df)) {
    exit("No file requested for download");
}

// Could be a normal download or a manual download file
$possible_files = array($df, "manual/$df"); 

$site_config = array(
    'current' => 'downloads',
    'css'     => array('mirror.css')
);

// Find out what is the exact file requested 
$file = FALSE;
foreach ($possible_files as $name) {
    if (@file_exists($_SERVER['DOCUMENT_ROOT'] . '/distributions/' . $name)) {
        $file = $name;
        break;
    }
}
    
// Print out common header
site_header('Get Download', $site_config);

echo '<div id="mirrors-container">';
$size = 0;
// No downloadable file found
if ($file === FALSE) {
        $info = "<p>
 The file you requested (<strong> " . htmlspecialchars($df, ENT_QUOTES, "UTF-8") . " </strong>) is not found on
 this server (<strong>{$MYSITE}</strong>). Please try another mirror listed below</p>";
    
    echo <<<EOT
<h1>Download not found</h1>
{$info}
EOT;
} else {
    // Set local file name
    $local_file = $_SERVER['DOCUMENT_ROOT'] . '/distributions/' . $file;
    // Try to get filesize to display
    $size = @filesize($local_file);


?>

<h1>Choose mirror site for download</h1>

<p>
 You have chosen to download the following file:
<span class="download-file">
 <strong class="filename"><?php echo $df ?>
</strong>
<?php
if ($size) {
    echo '<small>(' . number_format($size, 0, '.', ',') . ' bytes)</small>';
}
?>
</span>
</p>
<?php
}
?>


    <div class="mirrors-list">
<?php print_full_mirror_list($df, $size); ?>
    </div>
</div>


<?php site_footer();

