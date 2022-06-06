<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Data\Repositories\PassportAccessClientRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Laravel\Passport\PersonalAccessClient;

class CreatePassportAccessClientTask extends Task
{
    protected PassportAccessClientRepository $repository;

    public function __construct(PassportAccessClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(string $clientId): PersonalAccessClient
    {
        try {
            $permission = $this->repository->create([
                'client_id' => $clientId
            ]);
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }

        return $permission;
    }
}
