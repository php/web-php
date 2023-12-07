<?php

namespace phpweb\UserNotes;

final readonly class UserNote
{
    public function __construct(
        public string $id,
        public string $sect,
        public string $rate,
        public string $ts,
        public string $user,
        public string $text,
        public int $upvotes = 0,
        public int $downvotes = 0,
    ) {
    }
}
