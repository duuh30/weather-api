<?php

namespace App\Strategies\Weather\Services;

use App\Adapters\Weather\WeatherStackAdapter;
use App\Strategies\Weather\Contracts\WeatherStrategyContract;
use App\ValueObjects\Weather;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class WeatherStackStrategy implements WeatherStrategyContract
{
    public function getWeather(string $city): Weather
    {
        $response = $this->makeRequest($city)
            ->json();

        return WeatherStackAdapter::toValueObject($response ?? []);
    }

    public function makeRequest(string $city): Response
    {
        $weatherStackConfig = config('weather.weather_stack');

        return Http::baseUrl(
            url: $weatherStackConfig['url']
        )
            ->acceptJson()
            ->get('current', [
                'access_key' => $weatherStackConfig['access_key'],
                'query' => $city
            ]);
    }
}
