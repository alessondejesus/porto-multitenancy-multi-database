<?php

namespace App\Containers\AdminSection\Property\Actions;

use App\Containers\AdminSection\Property\Models\Property;
use App\Containers\AdminSection\Property\Tasks\FindPropertyByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindPropertyByIdAction extends Action
{
    public function run(Request $request): Property
    {
        return app(FindPropertyByIdTask::class)->run($request->id);
    }
}
