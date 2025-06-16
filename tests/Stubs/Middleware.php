<?php

namespace Xoiatix\Onboard\Tests\Stubs;

use Illuminate\Http\Request;
use Xoiatix\Onboard\Concerns\Onboardable;
use Xoiatix\Onboard\Middleware as BaseMiddleware;

class Middleware extends BaseMiddleware
{
    /**
     * Get the onboardable model.
     *
     * @param Request $request
     * @return Onboardable|null
     */
    protected function uses(Request $request): ? Onboardable
    {
        return $request->user();
    }
}
