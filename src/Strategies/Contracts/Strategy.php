<?php

namespace MikeFrancis\LaravelUnleash\Strategies\Contracts;

use Illuminate\Http\Request;

interface Strategy
{
    /**
     * @param array $params Strategy Configuration from Unleash
     * @param Request $request Current Request
     * @return bool
     */
    public function isEnabled(array $params, array $constraints, Request $request): bool;
}
