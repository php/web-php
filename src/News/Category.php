<?php

declare(strict_types=1);

namespace phpweb\News;

/**
 * The category terms a news entry can carry.
 */
enum Category: string
{
    case Frontpage = 'frontpage';
    case Releases = 'releases';
    case Conferences = 'conferences';
    case Cfp = 'cfp';
}
