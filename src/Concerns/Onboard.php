<?php

namespace Xoiatix\Onboard\Concerns;

use Xoiatix\Onboard\Manager;
use Illuminate\Support\Facades\App;

trait Onboard
{
    /**
     * Get the onboarding manager instance.
     *
     * @return Manager
     */
    public function onboarding(): Manager
    {
        return App::make(Manager::class, ['model' => $this]);
    }
}
