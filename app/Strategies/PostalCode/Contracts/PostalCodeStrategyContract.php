<?php

namespace App\Strategies\PostalCode\Contracts;

use App\ValueObjects\PostalCode;

interface PostalCodeStrategyContract
{
    public function findByZipCode(string $zipCode): PostalCode;
}
