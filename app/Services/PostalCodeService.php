<?php

namespace App\Services;

use App\Exceptions\PostalCodeException;
use App\Strategies\PostalCode\Contracts\PostalCodeStrategyContract;
use App\ValueObjects\PostalCode;
use Throwable;

class PostalCodeService
{
    public function __construct(
        private readonly PostalCodeStrategyContract $postalCodeStrategy
    ){
    }

    /**
     * @throws Throwable
     */
    public function getPostalCode(string $zipCode): PostalCode
    {
        $postalCode = $this->postalCodeStrategy->findByZipCode(
            zipCode: $zipCode
        );

        throw_unless($postalCode->isValid(), PostalCodeException::invalidPostalCode());

        return $postalCode;
    }
}
