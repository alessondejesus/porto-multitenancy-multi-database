<?php

namespace App\Containers\AdminSection\MailTemplate\Tasks;

use App\Containers\AdminSection\MailTemplate\Data\Repositories\MailTemplateRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateMailTemplateTask extends Task
{
    protected MailTemplateRepository $repository;

    public function __construct(MailTemplateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
