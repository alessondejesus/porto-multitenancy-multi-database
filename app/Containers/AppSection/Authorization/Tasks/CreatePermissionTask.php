<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Data\Repositories\PermissionRepository;
use App\Containers\AppSection\Authorization\Models\Permission;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreatePermissionTask extends Task
{
    protected PermissionRepository $repository;

    public function __construct(PermissionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, string $name, string $description = null, string $displayName = null, string $group = null): Permission
    {
        app()['cache']->forget('spatie.permission.cache');

        try {
            $permission = $this->repository->create([
                'id' => $id,
                'name' => trim($name),
                'description' => trim($description),
                'display_name' => trim($displayName),
                'group' => trim($group),
                'guard_name' => 'api',
            ]);
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }

        return $permission;
    }
}
