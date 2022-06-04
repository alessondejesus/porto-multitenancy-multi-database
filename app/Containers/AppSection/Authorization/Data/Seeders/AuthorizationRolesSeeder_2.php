<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreateRoleTask;
use App\Ship\Parents\Seeders\Seeder;

class AuthorizationRolesSeeder_2 extends Seeder
{
    public function run(): void
    {
        // Default Roles ----------------------------------------------------------------
        app(CreateRoleTask::class)->run(1, 'admin', 'Administrator', 'Admin');
        app(CreateRoleTask::class)->run(2, 'manager', 'Property Manager', 'Gerente');
        app(CreateRoleTask::class)->run(3, 'employee', 'Property Employee', 'Funcionário');
        app(CreateRoleTask::class)->run(4, 'client', 'Guest', 'Hóspede');
    }
}
