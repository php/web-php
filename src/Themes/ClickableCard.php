<?php

namespace phpweb\Themes;

class ClickableCard
{
    public function __construct(
        public string|HTML $title,
        public string $href,
        public string $href_label = '',
        public string $image = '',
        public string|HTML $body = '',
    ) {
    }
}
