<?php // -*- C++ -*-

// $Id$

/*

 This script uses the local copy of the ip-to-country.com
 database available on all php.net mirror sites to find
 out what country the user is in. This data is stored in
 a cookie for future usage, and another check is only done,
 if the cookie is expired.
 
 We have an index to speed up the search. The first line of
 the index file contains the step value used to create the
 index. The IP should be divided by this number, when an
 appropriate index entry is searched for. Then CSV formatted
 lines are placed in the file with the division results and 
 starting indexes (pointing to the data file).
 
 The data file has a fixed record size format to ease
 fseek()ing. The format of the database is:
     
  n records representing IP range and country relations
  the format of a record is:
      
   - starting IP number [10 bytes, padded with zeros from left]
   - ending IP number   [10 bytes, padded with zeros from left]
   - ISO country code   [3 bytes / letters]
   - newline            [1 byte: \n]
       
 IP numbers can be created with i2c_ip2num().
 
 Some things to consider:
 
  - Now 'NA' is stored in the cookie (no country detected).
    This is partly for safety reasons, not to bog down the
    server with country detection in case the data files are
    not there, or they are bogus, or the user has a non listed
    IP.
*/

// Start the detection
i2c_go();

// Try to find out the country of the user and 
// set a cookie in the browser (in case there is no
// cookie already storing this information)
function i2c_go()
{
    global $_SERVER, $_COOKIE, $COUNTRY;

    // User is behind a proxy and check that we discard RFC1918 IP addresses
    // if they are behind a proxy then only figure out which IP belongs to the
    // user.  Might not need any more hackin if there is a squid reverse proxy
    // infront of apache.
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        unset($ips); unset($ip);

        // Put the IP's into an array which we shall work with shortly.
        $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);

        for ($i = 0; $i < count($ips); $i++) {
            // Skip RFC 1918 IP's 10.0.0.0/8, 172.16.0.0/12 and
            // 192.168.0.0/16 -- jim kill me later with my regexp pattern
            // below.
            if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
        
        $ipnum = $ip ? $ip : $_SERVER['REMOTE_ADDR'];
    }

    // This is the real IP of the user
    else {
        $ipnum = $_SERVER['REMOTE_ADDR'];
    }
    
    // User already has a country detected with this IP stored
    if (!empty($_COOKIE['COUNTRY']) && strpos($_COOKIE['COUNTRY'], ',') !== FALSE) {
       list($COUNTRY, $storedip) = explode(",", $_COOKIE['COUNTRY']);
       if ($storedip == $ipnum) { return TRUE; }
    }

    // Convert the IP number to some useable form for searching
    $ipn = (float) sprintf("%u", ip2long($ipnum));

    // Find the index to start search from
    $idx = i2c_search_in_index($ipn);

    // Search in the database from the given index
    $country = i2c_search_in_db($ipn, $idx);

    // Set global variable for further usage
    $COUNTRY = $country;

    // Set the country in a cookie for a week
    return mirror_setcookie("COUNTRY", "$country,$ipnum", 60*60*24*7);
    
}

// Find nearest index entry for IP number 
function i2c_search_in_index($ip)
{
    global $_SERVER;

    // Indexed part and record number to jump to
    $idxpart = 0; $recnum = 0;
    
    // Open the index file for reading
    $dbidx = fopen(
        $_SERVER['DOCUMENT_ROOT'] . "/backend/ip-to-country.idx",
        "r"
    );
    if (!$dbidx) { return 0; }

    // Read in granularity from index file and
    // convert current IP to something useful
    $granularity = intval(fgets($dbidx, 64));
    $ip_chunk = intval($ip / $granularity);

    // Loop till we can read the file
    while (!feof($dbidx)) {

        // Get CSV data from index file
        $data = fgetcsv($dbidx, 100);

        // Compare current index part with our IP
        if ($ip_chunk >= $idxpart && $ip_chunk <= (int) $data[0]) {
            return $recnum;
        }

        // Store for next compare
        $idxpart = (int) $data[0];
        $recnum  = (int) $data[1];
    }

    // Return record number found
    return $recnum;
}

// Find the country searching from record $idx
// $ip should be an IP number and not an IP address
function i2c_search_in_db($ip, $idx = 0)
{
    global $_SERVER;

    // Default range and country
    $range_start = 0; $range_end = 0;
    $country = "NA";

    // Open DB for reading
    $ipdb = fopen(
        $_SERVER['DOCUMENT_ROOT'] . "/backend/ip-to-country.db",
        "r"
    );

    // Return with "NA" in case of we cannot open the db
    if (!$ipdb) { return $country; }

    // Jump to record $idx
    fseek($ipdb, $idx*24);

    // Read records until we hit the end of the file,
    // or we find the range where this IP is
    while (!feof($ipdb) && !($range_start <= $ip && $range_end >= $ip)) {
            
        // Try to read record
        $record = fread($ipdb, 24);

        // Unable to read the record => error
        if (strlen($record) != 24) { $country = "NA"; break; }

        // Split the record to it's parts
        $range_start = (float) substr($record, 0, 10);
        $range_end   = (float) substr($record, 10, 10);
        $country     = substr($record, 20, 3);
    }

    // Close datafile
    fclose($ipdb);

    // Return with the country found
    return $country;
}

// Check if the current country is valid
function i2c_valid_country()
{
    global $COUNTRY, $COUNTRIES;
    return (!empty($COUNTRY) && $COUNTRY != "NA" && isset($COUNTRIES[$COUNTRY]));
}

/* vim: set noet ts=4 sw=4 ft=php: : */
