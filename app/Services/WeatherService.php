<?php

namespace App\Services;

use App\Exceptions\WeatherException;
use App\Strategies\Weather\Contracts\WeatherStrategyContract;
use App\ValueObjects\Weather;
use Throwable;

class WeatherService
{
    public function __construct(
        private readonly PostalCodeService $postalCodeService,
        private readonly WeatherStrategyContract $weatherStrategy
    ){
    }

    /**
     * @throws Throwable
     */
    public function getWeather(string $zipCode): Weather
    {
        $postalCode = $this->postalCodeService->getPostalCode(
            zipCode: $zipCode
        );

        $siteWeather = $this->weatherStrategy->getWeather(
            city: $postalCode->city
        );

        throw_unless($siteWeather->isValid(), WeatherException::unexpectedWeatherError());

        return $siteWeather;
    }
}
