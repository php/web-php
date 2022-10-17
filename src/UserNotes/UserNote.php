<?php

namespace phpweb\UserNotes;

/**
 * @readonly
 * @psalm-immutable
 */
final class UserNote
{
    /** @var string $id */
    public $id;

    /** @var string $sect */
    public $sect;

    /** @var string $rate */
    public $rate;

    /** @var string $ts */
    public $ts;

    /** @var string $user */
    public $user;

    /** @var string $text */
    public $text;

    /** @var int $upvotes */
    public $upvotes;

    /** @var int $downvotes */
    public $downvotes;

    public function __construct(
        string $id,
        string $sect,
        string $rate,
        string $ts,
        string $user,
        string $text,
        int $upvotes = 0,
        int $downvotes = 0
    ) {
        $this->id = $id;
        $this->sect = $sect;
        $this->rate = $rate;
        $this->ts = $ts;
        $this->user = $user;
        $this->text = $text;
        $this->upvotes = $upvotes;
        $this->downvotes = $downvotes;
    }
}
