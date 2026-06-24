<?php

namespace phpweb\Framework\Build;

use Psr\Log\LoggerInterface;

/**
 * Each build step receives this context as a means of passing information
 * and providing logging.
 *
 * While logging is the main function, it is wrapped here to facilitate
 * future expansion without needing to update every call site.
 */
class BuildContext
{
    public function __construct(
        public readonly LoggerInterface $logger,
    ) {
    }
}
