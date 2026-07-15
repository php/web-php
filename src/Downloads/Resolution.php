<?php

declare(strict_types=1);

namespace phpweb\Downloads;

final class Resolution
{
    /**
     * @param array<string, mixed> $options resolved download options for rendering
     * @param ?string $redirectQuery query string to redirect to (without leading
     *                               '?'), or null when the request should render
     */
    public function __construct(
        public readonly array $options,
        public readonly ?string $redirectQuery = null,
    ) {
    }
}
