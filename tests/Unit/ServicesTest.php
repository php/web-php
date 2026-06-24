<?php

declare(strict_types=1);

namespace phpweb\Test\Unit;

use PHPUnit\Framework;
use phpweb\Framework\Services\Dummy\DummyService;
use phpweb\Framework\Services\ServiceLocator;

final class ServicesTest extends Framework\TestCase
{
    public function testBasicService(): void
    {
        $instance = ServiceLocator::make()->get(DummyService::class);

        self::assertInstanceOf(DummyService::class, $instance);
    }
}
