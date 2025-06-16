<?php

namespace Xoiatix\Onboard\Tests\Stubs;

use Xoiatix\Onboard\Concerns\Onboard;
use Xoiatix\Onboard\Concerns\Onboardable;

class Group implements Onboardable
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
