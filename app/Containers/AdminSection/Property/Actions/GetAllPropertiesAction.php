<?php

namespace App\Containers\AdminSection\Property\Actions;

use App\Containers\AdminSection\Property\Tasks\GetAllPropertiesTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllPropertiesAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllPropertiesTask::class)->addRequestCriteria()->run();
    }
}
