<?php

namespace phpweb\Navigation;

final readonly class NavItem
{
    public function __construct(
        public string $name,
        public string $href,
        public string $id,
        public ?string $image = null,
    ) {
    }
}
