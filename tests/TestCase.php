<?php

namespace Xoiatix\Onboard\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Xoiatix\Onboard\ServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }
}
