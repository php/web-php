<?php

header("Content-Type: application/atom+xml");

include __DIR__ . "/../include/version.inc";

echo <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<feed xmlns="http://www.w3.org/2005/Atom" xmlns:php="https://www.php.net/ns/releases">
    <title>PHP.net releases</title>
    <link href="/releases.atom" rel="self"/>
    <icon>/images/news/php-logo.gif</icon>
    <author>
        <name>Webmaster</name>
        <uri>https://www.php.net/contact</uri>
        <email>php-webmaster@lists.php.net</email>
    </author>
    <id>https://www.php.net/releases/index.php</id>

XML;

ob_start();

// Flatten major versions out of RELEASES.
$RELEASED_VERSIONS = array_reduce($RELEASES, 'array_merge', []);
$FEED_UPDATED = 0;
krsort($RELEASED_VERSIONS);
foreach ($RELEASED_VERSIONS as $version => $release) {
    $published = date(DATE_ATOM, strtotime($release["source"][0]["date"]));
    if ($release["announcement"]) {
        $id = "https://php.net/releases/" . str_replace(".", "_", $version) . ".php";
    } else {
        $id = "https://qa.php.net/#$version";
    }

    echo <<<XML
    <entry>
        <title>PHP {$version} released!</title>
        <id>{$id}</id>
        <php:version>{$version}</php:version>
        <published>{$published}</published>
        <summary type="html">There is a new PHP release in town!</summary>

XML;
    $maxtime = [];
    foreach ($release["source"] as $source) {
        if (!isset($source["date"])) {
            continue;
        }
        $maxtime[] = $time = strtotime($source["date"]);
        $released = date(DATE_ATOM, $time);

        echo "        <link rel=\"enclosure\" title=\"{$source["name"]}\" href=\"/distributions/{$source["filename"]}\">\n";
        foreach (['md5', 'sha256'] as $hashAlgo) {
            if (isset($source[$hashAlgo])) {
                echo "            <php:{$hashAlgo}>{$source[$hashAlgo]}</php:{$hashAlgo}>\n";
            }
        }

        echo <<<XML
            <php:releaseDate>{$released}</php:releaseDate>
        </link>

XML;

    }

    $updated = date(DATE_ATOM, max($maxtime));

    if (isset($release['tags'])) {
        foreach ($release['tags'] as $tag) {
            echo '        <php:tag>', htmlspecialchars($tag), "</php:tag>\n";
        }
    }

    echo <<<XML
        <updated>{$updated}</updated>
        <content src="{$id}" type="application/xhtml+xml"/>
    </entry>

XML;

    $FEED_UPDATED = max($maxtime, $FEED_UPDATED);
}

$entries = ob_get_clean();

$FEED_UPDATED = date(DATE_ATOM, max($FEED_UPDATED));

echo "    <updated>{$FEED_UPDATED}</updated>\n";
echo $entries;
echo "</feed>";
