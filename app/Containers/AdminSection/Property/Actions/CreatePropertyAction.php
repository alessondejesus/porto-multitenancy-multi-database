<?php

namespace App\Containers\AdminSection\Property\Actions;

use App\Containers\AdminSection\Property\Models\Property;
use App\Containers\AdminSection\Property\Tasks\CreatePropertyTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreatePropertyAction extends Action
{
    public function run(Request $request): Property
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreatePropertyTask::class)->run($data);
    }
}
