<?php

namespace App\Containers\AppSection\Tenant\Tasks;

use App\Ship\Exceptions\CreateResourceFailedException;
use Spatie\Multitenancy\Models\Tenant;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateTenantTask extends Task
{
    /**
     * @var Tenant
     */
    protected Tenant $tenant;

    /**
     * CreateTenantTask constructor.
     * @param Tenant $tenant
     */
    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    /**
     * @param array $data
     * @return mixed
     * @throws CreateResourceFailedException
     */
    public function run(array $data)
    {
        try {
            $this->tenant->unguard();

            $tenant = $this->tenant->create([
                'name' => $data['name'],
                'domain' => $data['domain'],
                'database' => $data['database']
            ]);

            $this->tenant->reguard();

            return $tenant;
        } catch (Exception $exception) {
            throw new CreateResourceFailedException($exception->getMessage());
        }
    }
}
