<?php

namespace App\Containers\AdminSection\Property\Actions;

use App\Containers\AdminSection\Property\Models\Property;
use App\Containers\AdminSection\Property\Tasks\UpdatePropertyTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdatePropertyAction extends Action
{
    public function run(Request $request): Property
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdatePropertyTask::class)->run($request->id, $data);
    }
}
