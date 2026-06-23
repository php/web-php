<?php

namespace phpweb\Framework\Services\Dummy;

use phpweb\Framework\Services\Service;

#[Service]
class DummyServiceFactory
{
    public function build(): DummyService
    {
        return new DummyService();
    }
}
