<?php

namespace App\Containers\AppSection\Authorization\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;
use Laravel\Passport\PersonalAccessClient;

class PassportAccessClientRepository extends Repository
{
    protected $fieldSearchable = [
        'name' => '=',
        'display_name' => 'like',
        'description' => 'like',
    ];

    public function model(): string
    {
        return PersonalAccessClient::class;
    }
}
