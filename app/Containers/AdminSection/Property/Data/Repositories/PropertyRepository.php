<?php

namespace App\Containers\AdminSection\Property\Data\Repositories;

use App\Containers\AdminSection\Property\Models\Property;
use App\Ship\Parents\Repositories\Repository;

class PropertyRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

    public function model(): string
    {
        return Property::class;
    }
}
