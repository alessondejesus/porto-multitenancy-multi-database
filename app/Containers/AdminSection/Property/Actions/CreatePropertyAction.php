<?php

namespace App\Containers\AdminSection\Property\Actions;

use App\Containers\AdminSection\Property\Models\Property;
use App\Containers\AdminSection\Property\Tasks\CreatePropertyTask;
use App\Containers\AppSection\Tenant\Actions\CreateTenantAction;
use App\Containers\AppSection\Tenant\Tasks\CreateDatabaseTask;
use Illuminate\Support\Facades\Artisan;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Str;

class CreatePropertyAction extends Action
{
    public function run(Request $request): Property
    {
        $data = $request->sanitizeInput([
            'name',
            'slug',
            'email',
            'attributes'
        ]);

        $slug = Str::slug($data['slug']);

        $data['database'] = 'tenant_' . Str::slug($slug, '_');
        $data['domain'] = $slug . '.' . config('app.base_url');

        $tenant = app(CreateTenantAction::class)->run($data);

        app(CreateDatabaseTask::class)->run($data['database']);

        return $tenant->execute(function () use ($data) {
            Artisan::call('migrate --seed');

            return app(CreatePropertyTask::class)->run($data);
        });
    }
}
