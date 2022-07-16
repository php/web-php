<?php

/**
 * Any ideas?
 *
 * @see https://github.com/php/web-php
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

    return file_get_contents($url, false, $ctx);
}
