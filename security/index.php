<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'security/index.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
if(!isset($_COOKIE["MAGIC_COOKIE"])) {
    mirror_redirect("/manual/security");
    exit;
}

$SIDEBAR_DATA = <<< EOT
<br>
<div id="securitySidebar">
 <h3><a href="/security/">Security Center?</a></h3>
 <p>In an effort to make security related information more readily available, the PHP Security Response Team created a new Security Center on March 1st, 2007. The Security Center will serve as the central location where interested parties can find information about security threats, fixes and/or workarounds and any other related meterial.</p>

 <h3>Security related books</h3>
 <ul>
  <li><a href="http://www.amazon.com/exec/obidos/ASIN/0973862106/">Guide to PHP Security</a></li>
  <li><a href="http://www.amazon.com/exec/obidos/ASIN/059600656X/">Essential PHP Security</a></li>
 </ul>

 <h3>Other links</h3>
 <ul>
  <li><a href="http://php.net/manual/security">PHP manual on security</a></li>
  <li><a href="http://www.suhosin.org">Suhosin</a></li>
  <li><a href="http://phpsec.org/projects/guide/">PHP Security Consortium</a></li>
 </ul>
</div>
EOT;


site_header("PHP Security center");
echo "<h1>PHP Security Center</h1>\n";

$dbfile = $_SERVER['DOCUMENT_ROOT'] . '/security/vulndb.txt';
$fp = @fopen($dbfile, "rt");
if(is_resource($fp)) {
    $RECORDS = array();
    $record_no = 1;
    while($s = fgets($fp)) {
        if($s == "\n") {
            if(!isset($RECORDS[$record_no]["id"])) {
                $RECORDS[$record_no]["id"] = $record_no;
            }
            $field = null;
            $record_no++;
            continue;
        }
        if(preg_match("/^([-\w]+):\s*(.*)/", $s, $m)) {
            // new record
            $field = strtolower($m[1]);
            $data = $m[2];
        } else {
            $data = $s;
        }
        if($field) {
            if(isset($RECORDS[$record_no][$field])) {
                    $RECORDS[$record_no][$field] .= $data;
                } else {
                    $RECORDS[$record_no][$field] = $data;
                }
            }
        }
    }

    //echo "<pre>";print_r($RECORDS);
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
    if(!$id || !isset($RECORDS[$id])) {
?>
<h3>PHP Vulnerability Disclosures</h3>
<p>This page contains information about PHP-related security threats, patches and known workarounds.</p>
<p>If you believe you have discovered a security problem in PHP please inform the<br>PHP Security Response Team in confidence by mailing <a href="mailto:security@php.net">security@php.net</a></p>
<br>
<p>The following colors are used to highlight the severity of a bug:</p>
<ul class="colors">
 <li class="low">low risk is yellow</li>
 <li class="medium">medium risk is orange</li>
 <li class="critical">critical is red</li>
</ul>
<?php
    function cmp_records($a, $b) {
        $c = date("Ym", strtotime($a["published"]));
        $d = date("Ym", strtotime($b["published"]));
        if($c >= $d) {
            if($c > $d) {
                return -1;
            }
            return 0;
        }
        return 1;
    }
    usort($RECORDS, "cmp_records");

    $last_month = "";
    foreach($RECORDS as $record) {
        if(!isset($record["summary"])) {
            if(strlen($record["description"]) > 80) {
                $record["summary"] = substr($record["description"], 0, 70) . "...";
            } else {
                $record["summary"] = $record["description"];
            }
        }
        $current_month = date("Ym", strtotime($record["published"]));
        if($current_month != $last_month) {
            $last_month = $current_month;
            $current_month = $record["affects"];

            echo "<br><h1>", date("F Y", strtotime($record["published"])), "</h1>\n";
        }
?>
<div class="record <?php echo strtolower($record["severity"]) ?>">
    <div class="id"><a href="/security/advisories/PHPSA-<?php echo $record["id"] ?>.php">PHPSA-<?php printf("%04d", $record["id"]) ?></a></div>
    <div class="date"><?php echo date("Y-m-d", strtotime($record["published"]))?></div>
    <div class="range <?php echo strtolower($record["range"]) ?>"><?php echo $record["range"] ?></div>
    <div class="affects"><?php echo $record["affects"] ?></div>
    <div class="summary"><?php echo $record["summary"] ?></div>
</div>

<?php
    } // foreach($records);
} elseif(isset($RECORDS)) { // Print a single record
    $date = date("F jS Y", strtotime($RECORDS[$id]["published"]));
    $RECORDS[$id]["id"] = sprintf("PHPSA-%04d", $RECORDS[$id]["id"]);
    printf("<h3>%s (%s)</h3>\n", $RECORDS[$id]["id"], $date);
    echo "<div class=\"singlerecord\">\n";
    foreach($RECORDS[$id] as $field => $data) {
        if(!$data) {
            continue;
        }
        $title = ucfirst(strtr($field, "-", " "));
        // Turn urls into links (stolen from master/manage/user-notes.php)
        $data = preg_replace(
            '!((mailto:|(http|ftp|nntp|news):\/\/).*?)(\s|<|\)|"|\\|\'|$)!',
            '<a href="\1" target="_blank">\1</a>\4',
            $data
        );
        echo <<< EOT
 <div class="row $field">
  <div class="title">$title</div>
  <div class="data">$data</div>
 </div>\n
EOT;
    }
    echo "</div>\n";
}

site_footer();

