<?php

namespace phpweb\Themes;

class ClickableCard
{
    public function __construct(
        public string $title,
        public string $href,
        public string $href_label = '',
        public string $image = '',
        public string $body = '',
    ) {
    }
}
