<?php 
$MYSITE = "/"; // Will be http://[foo.]php.net
$MY_LANG = 'en'; // Will use lang from accept header, or last saved 'preferred lang'

function site_header($title = '', $config = array())
{
    global $MYSITE, $MY_LANG;
    global $SIDEBAR_DATA;

    if (isset($config["current"])) {
        $curr = $config["current"];
    }
    else {
        switch($_SERVER["BASE_PAGE"]) {
            case "privacy.php":
            default:
                $curr = "";
            break;

            case "mailing-lists.php":
            case "sidebars.php":
            case "sites.php":
            case "support.php":
            case "tips.php":
            case "urlhowto.php":
                $curr = "help";
            break;
        }
    }
    if (empty($title)) {
        $title = "Hypertext Preprocessor";
    }

    require __DIR__ ."/../header.php";
}

function site_footer($config = array())
{
    require __DIR__ . "/../footer.php";
}

/* vim: set et ts=4 sw=4 ft=php: : */

