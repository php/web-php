<?php

// $Id$

/*
 This code is used to post data to the central server which
 can store the data in database and/or mail notices or requests
 to PHP.net stuff and servers
*/

function posttohost($url, $data)
{
    $data = http_build_query($data);

    $opts = array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $data,
    );

    $ctx = stream_context_create(array('http' => $opts));

    $response_body = file_get_contents($url, false, $ctx);

    return $response_body;
}
