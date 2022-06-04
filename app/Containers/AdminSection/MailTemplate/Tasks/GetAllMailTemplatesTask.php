<?php

namespace App\Containers\AdminSection\MailTemplate\Tasks;

use App\Containers\AdminSection\MailTemplate\Data\Repositories\MailTemplateRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllMailTemplatesTask extends Task
{
    protected MailTemplateRepository $repository;

    public function __construct(MailTemplateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
