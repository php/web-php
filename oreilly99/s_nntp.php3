<?php require "header.inc"?>
<H1>NNTP Example using the IMAP Module</H1>

<?example('<?$server="{news.php.net/nntp:119}";
    $nntp = imap_open($server."php.dev","","",OP_ANONYMOUS);
    if(!$msg) {
        $num = imap_num_msg($nntp);
        echo "$num messages in php.dev, showing the last 25<br>\n"; ?>
        <table><tr><th align=left>no.</th><th>Size</th>
        <th align=left>From</th><th align=left>Subject</th></tr><?
        for($i=$num-24; $i<=$num; $i++) {
            $header = imap_header($nntp, $i);
            if(!$header->Size) continue;
            $from = $header->from;
            $addr = $from[0]->mailbox."@".$from[0]->host;
            $name = $from[0]->personal ? $from[0]->personal:$addr;
            echo "<tr><td><a href=\"$PHP_SELF?msg=$i\">$i</a></td><td>".
  $header->Size."</td><td><a href=\"mailto: $addr\">$name</a></td>\n";
            echo "<td>".$header->subject."</td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";
    } else {
        $header = imap_header($nntp, $msg);
        $from = $header->from;
        $addr = $from[0]->mailbox."@".$from[0]->host;
        $name = $from[0]->personal;
        echo "<table border=1>\n";
        echo "<tr><th align=left>From: </th><td>$name &lt;
  <a href=\"mailto: $addr\">$addr</a>&gt;</td></tr>\n";
        echo "<tr><th align=left>Subject:</th><td>". $header->Subject."</td>\n";
        echo "<tr><th align=left>Date: </th><td>".
  date("H:i:s M d/y",$header->udate+4*3600)." EDT</td></tr>\n";
        echo "<tr><td colspan=2><PRE>";
        echo htmlspecialchars(imap_body($nntp,$msg));
        echo "</PRE></td></tr>\n";
        echo "</table>\n";
    }
    imap_close($nntp);
?>')?>

<?php require "footer.inc"?>
