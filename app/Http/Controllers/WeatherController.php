<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherResource;
use App\Services\WeatherService;
use Throwable;

class WeatherController extends Controller
{
    public function __construct(
        private readonly WeatherService $weatherService
    ){
    }

    /**
     * @throws Throwable
     */
    public function weather(string $zipCode): WeatherResource
    {
        return WeatherResource::make(
            $this->weatherService->getWeather(
                zipCode: $zipCode
            )
        );
    }
}
