<?php


namespace App\Containers\AppSection\Tenant\Tasks;


use App\Containers\AppSection\Tenant\Exceptions\DatabaseAlreadyExistsException;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;

class CreateDatabaseTask extends Task
{
    public function run(string $name)
    {
        $hasDb = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$name'");

        if ($hasDb) {
            throw new DatabaseAlreadyExistsException();
        }

        DB::statement("CREATE DATABASE $name");
    }
}
