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

function doc_toc($lang) {
    include __DIR__ . "/../manual/$lang/toc/index.inc";

    echo "<dl>\n";
    doc_toc_list($lang, $TOC, "getting-started");
    doc_toc_list($lang, $TOC, "langref");
    echo "</dl>\n";

    echo "<dl>\n";
    doc_toc_list($lang, $TOC, "security");
    doc_toc_list($lang, $TOC, "features");
    echo "</dl>\n";

    echo "<dl>\n";
    doc_toc_list($lang, $TOC, "funcref");
    echo "</dl>\n";

    echo "<dl>\n";
    doc_toc_title($lang, $TOC, "install");
    doc_toc_title($lang, $TOC, "internals2");
    doc_toc_title($lang, $TOC, "faq");
    doc_toc_title($lang, $TOC, "appendices");
    echo "<dt><a href='/quickref.php'>Quick function reference</a></dt>\n";
    echo "</dl>\n";

}
function doc_toc_list($lang, $index, $file) {
    include __DIR__ . "/../manual/$lang/toc/$file.inc";

    doc_toc_title($lang, $index, $file);
    foreach($TOC as $entry) {
        echo "\t<dd><a href='/manual/$lang/{$entry[0]}'>{$entry[1]}</a></dd>\n";
    }
    echo "</dt>\n";
}
function doc_toc_title($lang, $index, $file) {
    foreach($index as $entry) {
        if ($entry[0] == "$file.php") {
            $link  = $entry[0];
            $title = $entry[1];
            break;
        }
    }
    echo "<dt><a href='/manual/$lang/$link'>$title</a></dt>\n";
}

/* vim: set et ts=4 sw=4 ft=php: : */

