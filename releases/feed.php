<?php
header("Content-Type: application/atom+xml");

include __DIR__ . "/../include/version.inc";

echo <<< XML
<?xml version="1.0" encoding="UTF-8"?>
<feed xmlns="http://www.w3.org/2005/Atom" xmlns:php="http://php.net/ns/releases">
    <title>PHP.net releases</title>
    <link href="/releases.atom" rel="self"/>
    <icon>/images/news/php-logo.gif</icon>
    <author>
        <name>Webmaster</name>
        <uri>http://php.net/contact</uri>
        <email>php-webmaster@lists.php.net</email>
    </author>
    <id>http://php.net/releases/index.php</id>

XML;

/* FIX silly editor highlighting */?><?php

$FEED_UPDATED =  0;
$RELEASED_VERSIONS = array_merge($RELEASES[5], $RELEASES[7]);
krsort($RELEASED_VERSIONS);
foreach ($RELEASED_VERSIONS as $version => $release) {
    $published = date(DATE_ATOM, strtotime($release["source"][0]["date"]));
    if ($release["announcement"]) {
        $id = "http://php.net/releases/" . str_replace(".", "_", $version) . ".php";
    } else {
        $id = "http://qa.php.net/#$version";
    }

    echo <<< XML
    <entry>
        <title>PHP {$version} released!</title>
        <id>{$id}</id>
        <php:version>{$version}</php:version>
        <published>{$published}</published>
        <summary type="html">There is a new PHP release in town!</summary>

XML;
    $maxtime = array();
    foreach ($release["source"] as $source) {
        if (!isset($source["date"])) {
            continue;
        }
        $maxtime[] = $time = strtotime($source["date"]);
        $released = date(DATE_ATOM, $time);

        echo <<< XML
        <link rel="enclosure" title="{$source["name"]}" href="/get/{$source["filename"]}/from/this/mirror">
            <php:md5>{$source["md5"]}</php:md5>
            <php:releaseDate>{$released}</php:releaseDate>
        </link>

XML;

    }

    $updated = date(DATE_ATOM, max($maxtime));

    echo <<< XML
        <updated>{$updated}</updated>
        <content src="{$id}" type="application/xhtml+xml"/>
    </entry>

XML;

    $FEED_UPDATED = max($maxtime, $FEED_UPDATED);
}

$FEED_UPDATED = date(DATE_ATOM, max($FEED_UPDATED));

echo <<< XML
    <updated>{$FEED_UPDATED}</updated>
</feed>
XML;
