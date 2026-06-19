<?php

namespace phpweb\Framework\Build;

/**
 * Build steps are automatically discovered and their build function
 * invoked during the build phase invoked by running bin/build.php
 */
interface BuildStep
{
    /**
     * @throws BuildStepFailureException
     */
    public static function build(BuildContext $context): void;
}
