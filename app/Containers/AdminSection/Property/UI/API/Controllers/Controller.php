<?php

namespace App\Containers\AdminSection\Property\UI\API\Controllers;

use App\Containers\AdminSection\Property\UI\API\Requests\CreatePropertyRequest;
use App\Containers\AdminSection\Property\UI\API\Requests\DeletePropertyRequest;
use App\Containers\AdminSection\Property\UI\API\Requests\GetAllPropertiesRequest;
use App\Containers\AdminSection\Property\UI\API\Requests\FindPropertyByIdRequest;
use App\Containers\AdminSection\Property\UI\API\Requests\UpdatePropertyRequest;
use App\Containers\AdminSection\Property\UI\API\Transformers\PropertyTransformer;
use App\Containers\AdminSection\Property\Actions\CreatePropertyAction;
use App\Containers\AdminSection\Property\Actions\FindPropertyByIdAction;
use App\Containers\AdminSection\Property\Actions\GetAllPropertiesAction;
use App\Containers\AdminSection\Property\Actions\UpdatePropertyAction;
use App\Containers\AdminSection\Property\Actions\DeletePropertyAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createProperty(CreatePropertyRequest $request): JsonResponse
    {
        $property = app(CreatePropertyAction::class)->run($request);
        return $this->created($this->transform($property, PropertyTransformer::class));
    }

    public function findPropertyById(FindPropertyByIdRequest $request): array
    {
        $property = app(FindPropertyByIdAction::class)->run($request);
        return $this->transform($property, PropertyTransformer::class);
    }

    public function getAllProperties(GetAllPropertiesRequest $request): array
    {
        $properties = app(GetAllPropertiesAction::class)->run($request);
        return $this->transform($properties, PropertyTransformer::class);
    }

    public function updateProperty(UpdatePropertyRequest $request): array
    {
        $property = app(UpdatePropertyAction::class)->run($request);
        return $this->transform($property, PropertyTransformer::class);
    }

    public function deleteProperty(DeletePropertyRequest $request): JsonResponse
    {
        app(DeletePropertyAction::class)->run($request);
        return $this->noContent();
    }
}
