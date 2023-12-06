<?php

declare(strict_types=1);

namespace phpweb\Release;

final readonly class Branch
{
    private function __construct(
        private Major $major,
        private Minor $minor
    ) {
    }

    public static function create(
        Major $major,
        Minor $minor
    ): self {
        return new self(
            $major,
            $minor
        );
    }

    /**
     * @throws \InvalidArgumentException
     */
    public static function fromString(string $value): self
    {
        if (1 !== preg_match('/^(?P<major>(0|[1-9]\d*))\.(?P<minor>(0|[1-9]\d*)$)/', $value, $matches)) {
            throw new \InvalidArgumentException(\sprintf(
                'Value "%s" does not appear to be a valid value for a branch name.',
                $value
            ));
        }

        return new self(
            Major::fromString($matches['major']),
            Minor::fromString($matches['minor']),
        );
    }

    public function major(): Major
    {
        return $this->major;
    }

    public function minor(): Minor
    {
        return $this->minor;
    }

    public function toString(): string
    {
        return sprintf(
            '%s.%s',
            $this->major->toString(),
            $this->minor->toString(),
        );
    }
}
