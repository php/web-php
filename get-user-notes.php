<?php 
require_once 'shared-manual.inc';

// a tool for
// (on www.php.net) providing manual-notes in serialised form
// (on mirror site) retrieving above and storing for local access

global $MYSITE;

if(strstr($MYSITE,"www.php.net")) {
	
	if ( empty( $title ) ) {
		echo "<html><body>You need to pass a title</body></html>";
		exit;
	}

	$host = 'localhost';
	$user = 'nobody';
	$pass = '';

	// SQL stolen from shared-manual.inc:manualGetUserNotes()
	if ( $title == "all" )
		$query = "SELECT *,UNIX_TIMESTAMP(ts) AS xwhen FROM note ORDER BY id";
	else
		$query = "SELECT *,UNIX_TIMESTAMP(ts) AS xwhen FROM note WHERE sect = '$title' ORDER BY id";


	// is there a more efficient way to do this?
	$notes = array();

	$db_id = mysql_connect($host, $user, $pass);
	$result_id = mysql_db_query("php3", $query, $db_id);
	if ($result_id && mysql_num_rows($result_id) > 0) {
		while ($row = mysql_fetch_array($result_id,MYSQL_ASSOC)) {
			$notes[$row["sect"]][] = $row;
		}
	}

	echo serialize( $notes );

} else {

	// retreive ALL notes from www.php.net
	// break up into sections and save to usernotes/

	echo "<html><body><ul>";

	if ( file_exists( "usernotes.txt" ) )
		$source = "usernotes.txt";
	else
		$source = "http://www.php.net/get-user-notes.php?title=all";

	echo "<li>Retreiving notes from $source...";
	flush();
	$fh = fopen( $source, "r" );
	$notes = unserialize( fread( $fh, 100000000 ) );
	fclose( $fh );
	echo "done!<br>\n";

	$notes_dir = "manual/usernotes";

	# create usernotes if not already there
	if ( !@is_dir( $notes_dir ) ) {
		echo "<li>Creating $notes_dir...";
		if ( @mkdir( $notes_dir, 0755 ) ) {
			echo "done!\n";
		} else {
			echo "<B>FAILED!</b></body></html>";
			exit;
		}
	}			

	echo "<li>Writing local files...<br><ol>";
	foreach( $notes as $sect => $note ) {
		echo "<li>$sect...";
		flush();
		$fh = fopen( "$notes_dir/" . urlencode($sect) . ".txt", "w" );
		fwrite( $fh, serialize( $note ) );
		fclose( $fh ); 
		echo "done\n";
	}
	echo "</ol>";

	echo "<li>Finished!\n";
	echo "</ul></body></html>";
	
}

?>
