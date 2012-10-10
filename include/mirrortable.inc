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
            echo "<p>\n We have automatically detected the following $mnum to be close\n" .
                 " to you. If you use a mirror close to you for downloads and\n" .
                 " your usual daily work, you will get better response times.\n</p>\n";
            mirror_table($df, $COUNTRY);
            
            // Print out table of other mirror sites
            echo "<p>\n Here is the list of all the other sites in case our detection\n" .
                 " did something wrong, or the local mirror sites are busy.\n</p>\n";
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
            'virtual'  => TRUE,
            'datacols' => 2,
            'download' => TRUE
        );
    } else {
        $cnf = array(
            'virtual'  => FALSE,
            'datacols' => 2,
            'download' => FALSE
        );
    }
    
    echo "<div class=\"center\">\n" . 
         " <table border=\"0\" cellpadding=\"3\" class=\"mirrors\">\n";

    // Previous mirror country code
    $prevcc = 'aa';

    // Go through all mirror sites and print out information about them
    $MURLS = array_keys($MIRRORS);
    foreach ($MURLS as $murl) {

        // If the mirror is not all right or it is virtual (not an official mirror), or if this is an IP, skip it
        if (mirror_status($murl) != MIRROR_OK ||
            (!$cnf['virtual'] && mirror_type($murl) == MIRROR_VIRTUAL) || preg_match('/^\d/',$murl)) { continue; }

        // Get the country code and check if it is
        // matching the country provided (or does not
        // match the country, which it should not be)
        $country = mirror_country($murl);
        if (!empty($cmatch)   && $country != $cmatch)   { continue; }
        if (!empty($cnomatch) && $country == $cnomatch) { continue; }
        
        // Print out a country header, if a new country is found
        if ($prevcc != $country && $country != "xx") {
            echo "  <tr>\n   <th class=\"flag\">";
            if ($country == 'xxx') {
              echo "&nbsp;";
            } else {
              print_image(
                  'flags/' . strtolower($country) . '.png',
                  $COUNTRIES[$country]
              );
            }
            echo "</th>\n" .
                 '   <th class="ch" colspan="' . $cnf['datacols'] . '">' .
                 $COUNTRIES[$country] . "</th>\n  </tr>\n";
        }

        // We print out a row for the current mirror
        $thismirror = ($MYSITE == $murl);

        // Highlight this mirror if it is the current one
        echo "  <tr" . ($thismirror ? " class=\"this\"" : "") . ">\n";
        
        // Print out caret (in bold if current mirror)
        echo '   <td class="caret">';
        print_image(($thismirror ? 'caret-r.gif' : 'caret-rg.gif'));
        echo "</td>\n";

        // Get short name of the mirror site
        $mirrorshort = substr($murl, strpos($murl, '//') + 2, -1);

        // If this is a download table print out download links
        if ($cnf['download']) {
            // Print out mirror site download link
            echo '   <td>';
            $mirrorname  = ($thismirror ? "this" : $mirrorshort);
            print_link("/get/$df/from/$mirrorname/mirror", $mirrorshort);
            echo "</td>\n";

            // Print out mirror provider's name
            echo '   <td>' . htmlspecialchars(mirror_provider($murl)) . "</td>\n";
        }
        
        // If this is a normal table, print out information
        else {
            // Print out mirror site and provider link
            echo "   <td><a href=\"$murl\">$mirrorshort</a></td>\n" .
                 "   <td><a href=\"" .
                 mirror_provider_url($murl) . "\">" .
                 htmlspecialchars(mirror_provider($murl)) .
                 "</a></td>\n";
        }

        // End row for this mirror
        echo "  </tr>\n";

        // Maintain previous country code
        $prevcc = $country;
    }
    echo " </table>\n</div>";
}
