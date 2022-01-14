<?php

namespace App\Containers\AdminSection\Property\Tasks;

use App\Containers\AdminSection\Property\Data\Repositories\PropertyRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllPropertiesTask extends Task
{
    protected PropertyRepository $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
