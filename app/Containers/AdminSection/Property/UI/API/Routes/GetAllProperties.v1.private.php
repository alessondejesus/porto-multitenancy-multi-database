<?php

/**
 * @apiGroup           Property
 * @apiName            getAllProperties
 *
 * @api                {GET} /v1/properties Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

use App\Containers\AdminSection\Property\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('properties', [Controller::class, 'getAllProperties'])
    ->name('api_property_get_all_properties')
    ->middleware(['auth:api']);

