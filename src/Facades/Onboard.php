<?php

namespace Xoiatix\Onboard\Facades;

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use Xoiatix\Onboard\Concerns\Onboardable;
use Xoiatix\Onboard\Flows;
use Xoiatix\Onboard\Step;

/**
 * @method static Step register(string $model, string $route, Closure $validate)
 * @method static Collection steps(Onboardable $model)
 */
class Onboard extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Flows::class;
    }
}