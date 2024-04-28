<?php

namespace App\Adapters\Weather;

use App\ValueObjects\Weather;

class WeatherStackAdapter
{
    public static function toValueObject(array $data = []): Weather
    {
        return new Weather(
            city: data_get($data, 'location.name'),
            region: data_get($data, 'location.region'),
            country: data_get($data, 'location.country'),
            time: data_get($data, 'location.localtime'),
            temperature: data_get($data, 'current.temperature'),
            description: data_get($data, 'current.weather_descriptions'),
        );
    }
}
