<?php

declare(strict_types=1);

namespace phpweb\Release;

final readonly class Major
{
    private function __construct(private readonly string $value)
    {
    }

    /**
     * @throws \InvalidArgumentException
     */
    public static function fromString(string $value): self
    {
        if (1 !== preg_match('/^(0|[1-9]\d*)$/', $value)) {
            throw new \InvalidArgumentException(\sprintf(
                'Value "%s" does not appear to be a valid value for a major version.',
                $value
            ));
        }

        return new self($value);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
