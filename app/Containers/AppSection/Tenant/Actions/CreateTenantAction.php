<?php

namespace App\Containers\AppSection\Tenant\Actions;

use App\Containers\AppSection\Tenant\Tasks\CreateTenantTask;
use App\Ship\Parents\Actions\Action;
use Spatie\Multitenancy\Models\Tenant;

class CreateTenantAction extends Action
{
    public function run(array $data): Tenant
    {
        return app(CreateTenantTask::class)->run($data);
    }
}
