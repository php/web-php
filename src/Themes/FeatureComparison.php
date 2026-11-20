<?php

namespace phpweb\Themes;

readonly class FeatureComparison
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public array $links,
        public string $before,
        public string $after,
        public string $before2 = '',
        public string $after2 = '',
        public bool $highlightCode = true,
    ) {}
}
