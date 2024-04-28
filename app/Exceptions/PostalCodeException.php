<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostalCodeException extends Exception
{
    public static function invalidPostalCode(): self
    {
        return new self('invalid zip_code');
    }

    public function render(Request $request): JsonResponse
    {
        return response()->json([
            'message' => $this->getMessage(),
        ], ResponseAlias::HTTP_BAD_REQUEST);
    }
}
