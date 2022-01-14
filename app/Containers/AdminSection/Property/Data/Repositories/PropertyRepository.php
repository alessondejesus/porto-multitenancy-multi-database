<?php

namespace App\Containers\AdminSection\Property\Data\Repositories;

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
}
