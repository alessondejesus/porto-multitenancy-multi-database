<?php

namespace App\Containers\AdminSection\Property\Tasks;

use App\Containers\AdminSection\Property\Data\Repositories\PropertyRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindPropertyByIdTask extends Task
{
    protected PropertyRepository $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
