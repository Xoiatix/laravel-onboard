<?php

namespace Xoiatix\Onboard\Tests\Stubs;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Xoiatix\Onboard\Concerns\Onboard;
use Xoiatix\Onboard\Concerns\Onboardable;

class User extends Authenticatable implements Onboardable
{
    use Onboard;

    public function isTrue(): true
    {
        return true;
    }

    public function isFalse(): false
    {
        return false;
    }
}
