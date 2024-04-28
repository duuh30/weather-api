<?php

namespace App\Adapters\PostalCode;

use App\ValueObjects\PostalCode;

class ViaCepAdapter
{
    public static function toValueObject(array $data = []): PostalCode
    {
        return new PostalCode(
            zipCode: data_get($data, 'cep'),
            street: data_get($data, 'logradouro'),
            neighborhood: data_get($data, 'bairro'),
            city: data_get($data, 'localidade'),
            state: data_get($data, 'uf'),
        );
    }
}
