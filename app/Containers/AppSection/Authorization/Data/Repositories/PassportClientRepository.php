<?php

namespace App\Containers\AppSection\Authorization\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;
use Laravel\Passport\Client;

class PassportClientRepository extends Repository
{
    protected $fieldSearchable = [

    ];

    public function model(): string
    {
        return Client::class;
    }
}
