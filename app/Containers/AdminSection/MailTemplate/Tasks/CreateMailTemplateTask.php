<?php

namespace App\Containers\AdminSection\MailTemplate\Tasks;

use App\Containers\AdminSection\MailTemplate\Data\Repositories\MailTemplateRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateMailTemplateTask extends Task
{
    protected MailTemplateRepository $repository;

    public function __construct(MailTemplateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
