<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Data\Repositories\PassportClientRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Laravel\Passport\Client;
use Exception;

class CreatePassportClientTask extends Task
{
    protected PassportClientRepository $repository;

    public function __construct(PassportClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(string $name, string $secret = null, string $redirect = null): Client
    {
        try {
            $permission = $this->repository->create([
                'name' => $name,
                'secret' => $secret,
                'provider' => 'users',
                'redirect' => $redirect,
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => '0',
            ]);
        } catch (Exception $exception) {
            throw new CreateResourceFailedException($exception->getMessage());
        }

        return $permission;
    }
}
