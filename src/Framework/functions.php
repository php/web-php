<?php

/* no-class */

/**
 * Default escaping mechanism for unsafe HTML
 */
function safe(string $html): string
{
    return htmlspecialchars($html, encoding: 'UTF-8');
}
