<?php

namespace phpweb\Framework\Build;

use Exception;
use Reflector;

class BuildStepFailureException extends Exception
{
    public function __construct(string $message, public readonly Reflector $target)
    {
        parent::__construct($message);
    }
}
