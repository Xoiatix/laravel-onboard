<?php

namespace Xoiatix\Onboard\Concerns;

use Xoiatix\Onboard\Manager;

interface Onboardable
{
    /**
     * Get the onboarding manager instance.
     *
     * @return Manager
     */
    public function onboarding(): Manager;
}
