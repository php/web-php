<?php

declare(strict_types=1);

namespace phpweb\Release;

final readonly class Patch
{
    private function __construct(private string $value)
    {
    }

    /**
     * @throws \ValueError
     */
    public static function fromString(string $value): self
    {
        if (1 !== preg_match('/^(0|[1-9]\d*)$/', $value)) {
            throw new \ValueError(\sprintf(
                'Value "%s" does not appear to be a valid value for a patch version.',
                $value,
            ));
        }

        return new self($value);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
