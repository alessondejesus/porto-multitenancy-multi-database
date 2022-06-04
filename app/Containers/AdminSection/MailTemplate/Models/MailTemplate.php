<?php

namespace App\Containers\AdminSection\MailTemplate\Models;

use App\Ship\Parents\Models\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class MailTemplate extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name',
        'subject',
        'system_name',
        'template',
        'property_id',
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
    protected string $resourceKey = 'MailTemplate';
}
