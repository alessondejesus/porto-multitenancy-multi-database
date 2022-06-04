<?php

namespace App\Containers\AdminSection\MailTemplate\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class MailTemplateRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
