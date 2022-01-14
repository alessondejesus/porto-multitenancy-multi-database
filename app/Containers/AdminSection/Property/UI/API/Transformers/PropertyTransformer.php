<?php

namespace App\Containers\AdminSection\Property\UI\API\Transformers;

use App\Containers\AdminSection\Property\Models\Property;
use App\Ship\Parents\Transformers\Transformer;

class PropertyTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(Property $property): array
    {
        $response = [
            'object' => $property->getResourceKey(),
            'id' => $property->getHashedKey(),
            'created_at' => $property->created_at,
            'updated_at' => $property->updated_at,
            'readable_created_at' => $property->created_at->diffForHumans(),
            'readable_updated_at' => $property->updated_at->diffForHumans(),

        ];

        return $response = $this->ifAdmin([
            'real_id'    => $property->id,
            // 'deleted_at' => $property->deleted_at,
        ], $response);
    }
}
