<?php

namespace App\ValueObjects;

class Weather
{
    public function __construct(
        public readonly ?string $city = null,
        public readonly ?string $region = null,
        public readonly ?string $country = null,
        public readonly ?string $time = null,
        public readonly ?string $temperature = null,
        public readonly ?array $description = [],
    ){
    }

    public function isValid(): bool
    {
        return isset($this->temperature);
    }
}
