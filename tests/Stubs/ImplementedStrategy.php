<?php

namespace MikeFrancis\LaravelUnleash\Tests\Stubs;

use Illuminate\Http\Request;
use MikeFrancis\LaravelUnleash\Strategies\Contracts\Strategy;

class ImplementedStrategy implements Strategy
{
    public function isEnabled(array $params, array $constraints, Request $request): bool
    {
        return true;
    }
}
