<?php

require_once 'prepend.inc';

// This file is intended to be used on php.net only!
if (!is_primary_site()) { exit; }

// Connect and generate the list from the DB
if (@mysql_connect("localhost","nobody","")) {
    if (@mysql_select_db("php3")) {
        $res = @mysql_query("SELECT * FROM mirrors ORDER BY cc");
        if ($res) {
            echo "<?php\n\$MIRRORS = array(\n";
            while ($row = @mysql_fetch_array($res)) {
                if (!strstr("http:",$row[hostname])) { $row[hostname]="http://$row[hostname]/"; }
                // Set inactive mirrors to type 2 so they won't show up in the drop-down.
                if (!$row["active"]) { $row["mirrortype"] = 2; }
                echo "  \"$row[hostname]\" => array(\"$row[cc]\",\"$row[providername]\",$row[has_stats],\"$row[providerurl]\",$row[mirrortype],$row[has_search],\"$row[lang]\"),\n";
            }
            echo '  0 => array("xx", "Unknown", 0, "/", 2, 0, "en")', "\n";
            echo ");\n";
            echo "?>\n";
            exit;
        }
    }
}

// In case of something went wrong
echo "<?php\n\$MIRRORS = array(\n";
echo '  0 => array("xx", "This feature is not working currently", 0, "/", 2, 0, "en")', "\n";
echo ");\n";
echo "?>\n";

?>
