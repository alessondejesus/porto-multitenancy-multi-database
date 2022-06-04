<?php

namespace App\Containers\AppSection\User\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder;

class UserPermissionsSeeder_1 extends Seeder
{
    public function run(): void
    {
        // Default Permissions ----------------------------------------------------------
        $createPermissionTask = app(CreatePermissionTask::class);
        $createPermissionTask->run(null, 'search-users', 'Find a User in the DB.');
        $createPermissionTask->run(null, 'list-users', 'Get All Users.');
        $createPermissionTask->run(null, 'update-users', 'Update a User.');
        $createPermissionTask->run(null, 'delete-users', 'Delete a User.');
        $createPermissionTask->run(null, 'refresh-users', 'Refresh User data.');
    }
}
