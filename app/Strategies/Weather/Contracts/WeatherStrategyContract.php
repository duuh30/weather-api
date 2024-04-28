<?php

namespace App\Strategies\Weather\Contracts;

use App\ValueObjects\Weather;

interface WeatherStrategyContract
{
    public function getWeather(string $city): Weather;
}
