<?php

namespace App\Strategies\PostalCode\Services;

use App\Strategies\PostalCode\Contracts\PostalCodeStrategyContract;
use App\ValueObjects\PostalCode;
use App\Adapters\PostalCode\ViaCepAdapter;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class ViaCepStrategy implements PostalCodeStrategyContract
{
    public function findByZipCode(string $zipCode): PostalCode
    {
        $response = $this->makeRequest($zipCode)
            ->json();

        return ViaCepAdapter::toValueObject($response ?? []);
    }

    protected function makeRequest(string $zipCode): Response
    {
        return Http::baseUrl(
            url: config('postal_code.via_cep.url')
        )
            ->acceptJson()
            ->get("$zipCode/json");
    }
}
