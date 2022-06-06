<?php

namespace App\Containers\AppSection\Tenant\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;
use Spatie\Multitenancy\Models\Tenant;

class TenantRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
    ];

    public function model(): string
    {
        return Tenant::class;
    }
}
