<?php
/* $Id$ */

/*
  This file includes functions to find close mirrors and list
  the sites in to tables below each other. First is the close
  mirror's table (sites in the same country as the user), second
  is the other mirror's table.
  
  Include this file only if you are going to output a page which
  should list mirror sites.
*/

// If we have a valid country, and we have at least one mirror
// in that country, provide some intro text and the list of 
// close mirrors, and other mirrors
function mirror_list($df = '') {

    global $COUNTRY;

    // Valid country code present in $COUNTRY
    if (i2c_valid_country()) {
        
        // Count number of active mirrors in this country
        $close = count_mirrors($COUNTRY);
        
        // There is at least one close mirror
        if ($close > 0) {
            
            // Print out close mirrors' table
            $mnum = (($close > 1) ? "mirrors" : "mirror");
            echo "<p>We have automatically detected the following $mnum to be close\n" .
                 "to you. If you use a mirror close to you for downloads and\n" .
                 "your usual daily work, you will get better response times.</p>\n";
            mirror_table($df, $COUNTRY);
            
            // Print out table of other mirror sites
            echo "<p>Here is the list of all the other sites in case our detection\n" .
                 "did something wrong, or the local mirror sites are busy.\n";
            mirror_table($df, '', $COUNTRY);
        } else { mirror_table($df); }
    } else { mirror_table($df); }
}

// List mirrors, possibly restricted
function mirror_table($df = '', $cmatch = '', $cnomatch = '') {

    global $MIRRORS, $COUNTRIES, $MYSITE;
    
    // Configure the table based on whether this is a download
    // table or a usual mirror listing table
    if (!empty($df)) {
        $cnf = array(
            'width'    => 500,
            'virtual'  => TRUE,
            'datacols' => 2,
            'download' => TRUE
        );
    } else {
        $cnf = array(
            'width'    => 560,
            'virtual'  => FALSE,
            'datacols' => 2,
            'download' => FALSE
        );
    }
    
    echo '<div class="center">' . "\n" . 
         '<table border="0" cellpadding="3" cellspacing="1" width="' .
         $cnf['width'] . '">' . "\n";

    // Previous mirror country code
    $prevcc = 'aa';

    // Go through all mirror sites and print out information about them
    $MURLS = array_keys($MIRRORS);
    foreach ($MURLS as $murl) {

        // If the mirror is not all right or it is virtual (not an official mirror), skip it
        if (mirror_status($murl) != MIRROR_OK ||
            (!$cnf['virtual'] && mirror_type($murl) == MIRROR_VIRTUAL)) { continue; }

        // Get the country code and check if it is
        // matching the country provided (or does not
        // match the country, which it should not be)
        $country = mirror_country($murl);
        if (!empty($cmatch)   && $country != $cmatch)   { continue; }
        if (!empty($cnomatch) && $country == $cnomatch) { continue; }
        
        // Print out a country header, if a new country is found
        if ($prevcc != $country && $country != "xx") {
            echo '<tr><td colspan="' . ($cnf['datacols'] + 1) . '"></td></tr>' . "\n";
            echo '<tr bgcolor="#cccccc"><td width="40" align="center">';
            print_image(
                'flags/' . strtolower($country) . '.png',
                $COUNTRIES[$country],
                FALSE,
                'class="flag"'
            );
            echo '<br /></td>';
            echo '<td colspan="' . $cnf['datacols'] . '"><b>' .
                 $COUNTRIES[$country] . '</b><br /></td>';
            echo '</tr>' . "\n";
        }

        // We print out a row for the current mirror
        $thismirror = ($MYSITE == $murl);

        // Highlight this mirror if it is the current one
        echo '<tr bgcolor="' . ($thismirror ? '#ffffcc' : '#e0e0e0') . '">' . "\n";

        // Print out caret (in bold if current mirror)
        echo '<td bgcolor="#ffffff" align="right">';
        print_image( ($thismirror ? 'caret-r.gif' : 'caret-rg.gif') );
        echo '<br /></td>' . "\n";

        // Get short name of the mirror site
        $mirrorshort = substr($murl, strpos($murl, '//') + 2, -1);

        // If this is a download table print out download links
        if ($cnf['download']) {
            // Print out mirror site download link
            echo '<td><small>';
            $mirrorname  = ($thismirror ? "this" : $mirrorshort);
            print_link("/get/$df/from/$mirrorname/mirror", $mirrorshort);
            echo '</small><br /></td>' . "\n";

            // Print out mirror provider's name
            echo '<td><small>';
            echo mirror_provider($murl);
            echo '</small><br /></td>' . "\n";
        }
        
        // If this is a normal table, print out information
        else {
            // Print out mirror site link
            echo '<td><small>';
            print_link($murl, $mirrorshort);
            echo '</small><br /></td>' . "\n";

            // Print out mirror provider's link
            echo '<td><small>';
            print_link(mirror_provider_url($murl), htmlspecialchars(mirror_provider($murl)));
            echo '</small><br /></td>' . "\n";
        }

        // End row for this mirror
        echo "</tr>\n";

        // Maintain previous country code
        $prevcc = $country;
    }
    echo "</table>\n</div>";
}
