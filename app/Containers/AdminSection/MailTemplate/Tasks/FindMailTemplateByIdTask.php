<?php

namespace App\Containers\AdminSection\MailTemplate\Tasks;

use App\Containers\AdminSection\MailTemplate\Data\Repositories\MailTemplateRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindMailTemplateByIdTask extends Task
{
    protected MailTemplateRepository $repository;

    public function __construct(MailTemplateRepository $repository)
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
