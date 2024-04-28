<?php

namespace App\ValueObjects;

class PostalCode
{
    public function __construct(
        public readonly ?string $zipCode,
        public readonly ?string $street = null,
        public readonly ?string $neighborhood = null,
        public readonly ?string $city = null,
        public readonly ?string $state = null
    ){
    }

    public function isValid(): bool
    {
        return isset($this->zipCode);
    }
}
