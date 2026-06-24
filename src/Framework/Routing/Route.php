<?php

namespace phpweb\Framework\Routing;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class Route
{
    /**
     * @param list<string>|null $methods
     */
    public function __construct(
        public ?string $path = null,
        public ?array $methods = [],
    ) {
    }
}
