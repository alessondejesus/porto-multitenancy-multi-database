<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;


use App\Containers\AppSection\Authorization\Tasks\CreatePassportAccessClientTask;
use App\Containers\AppSection\Authorization\Tasks\CreatePassportClientTask;
use App\Ship\Parents\Seeders\Seeder;

class AuthorizationPassportPasswordSeeder_4 extends Seeder
{
    public function run(): void
    {
        $secret = config('passport.password_access_client.secret');

        $client = app(CreatePassportClientTask::class)->run('Password Access Client', $secret, 'http://localhost');

        app(CreatePassportAccessClientTask::class)->run($client->id);
    }
}
