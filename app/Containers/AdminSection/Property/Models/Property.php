<?php

namespace App\Containers\AdminSection\Property\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Spatie\PrefixedIds\Models\Concerns\HasPrefixedId;

class Property extends Model
{
    use HasPrefixedId, UsesTenantConnection, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'is_active',
        'attributes',
        'prefixed_id',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Property';
}
