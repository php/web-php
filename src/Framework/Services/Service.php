<?php

namespace phpweb\Framework\Services;

use Attribute;

/**
 * Attach this attribute to a class to register it with the
 * service container under its own name.
 */
#[Attribute(Attribute::TARGET_CLASS)]
readonly class Service
{
    /**
     * @param array{class-string, string}|null $factory
     */
    public function __construct(public ?array $factory = null, public ?bool $public = null)
    {
    }
}
