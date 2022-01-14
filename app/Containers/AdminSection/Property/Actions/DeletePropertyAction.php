<?php

namespace App\Containers\AdminSection\Property\Actions;

use App\Containers\AdminSection\Property\Tasks\DeletePropertyTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeletePropertyAction extends Action
{
    public function run(Request $request)
    {
        return app(DeletePropertyTask::class)->run($request->id);
    }
}
