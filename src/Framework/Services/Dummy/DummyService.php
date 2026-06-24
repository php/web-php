<?php

namespace phpweb\Framework\Services\Dummy;

use phpweb\Framework\Services\Service;

#[Service(factory: [DummyServiceFactory::class, 'build'], public: true)]
class DummyService
{
}
