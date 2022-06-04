<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Data\Repositories\RoleRepository;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateRoleTask extends Task
{
    protected RoleRepository $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $id, string $name, string $description = null, string $displayName = null, int $level = 0): Role
    {
        app()['cache']->forget('spatie.permission.cache');

        try {
            $role = $this->repository->create([
                'id' => $id,
                'name' => strtolower(trim($name)),
                'description' => trim($description),
                'display_name' => trim($displayName),
                'guard_name' => 'api',
                'level' => $level,
            ]);
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }

        return $role;
    }
}
