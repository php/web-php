<?php

namespace phpweb\Navigation;

final readonly class NavItem
{
    /**
     * @param list<self> $children
     */
    public function __construct(
        public string $name,
        public string $href,
        public string $id,
        public ?string $image = null,
        public array $children = [],
    ) {
    }
}
