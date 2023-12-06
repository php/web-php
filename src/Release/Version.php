<?php

declare(strict_types=1);

namespace phpweb\Release;

final readonly class Version
{
    private function __construct(
        private Major $major,
        private Minor $minor,
        private Patch $patch,
    ) {
    }

    public static function create(
        Major $major,
        Minor $minor,
        Patch $patch,
    ): self {
        return new self(
            $major,
            $minor,
            $patch,
        );
    }

    /**
     * @throws \ValueError
     */
    public static function fromString(string $value): self
    {
        if (1 !== preg_match('/^(?P<major>(0|[1-9]\d*))\.(?P<minor>(0|[1-9]\d*))\.(?P<patch>(0|[1-9]\d*))$/', $value, $matches)) {
            throw new \ValueError(\sprintf(
                'Value "%s" does not appear to be a valid value for a version.',
                $value,
            ));
        }

        return new self(
            Major::fromString($matches['major']),
            Minor::fromString($matches['minor']),
            Patch::fromString($matches['patch']),
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

    public function patch(): Patch
    {
        return $this->patch;
    }

    public function toString(): string
    {
        return sprintf(
            '%s.%s.%s',
            $this->major->toString(),
            $this->minor->toString(),
            $this->patch->toString(),
        );
    }
}
