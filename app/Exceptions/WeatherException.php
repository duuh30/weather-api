<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class WeatherException extends Exception
{
    public static function unexpectedWeatherError(): self
    {
        return new self('unexpected error to get weather from site');
    }

    public function render(Request $request): JsonResponse
    {
        return response()->json([
            'message' => $this->getMessage(),
        ], ResponseAlias::HTTP_BAD_REQUEST);
    }
}
