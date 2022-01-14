<?php

/**
 * @apiGroup           Property
 * @apiName            deleteProperty
 *
 * @api                {DELETE} /v1/properties/:id Endpoint title here..
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

Route::delete('properties/{id}', [Controller::class, 'deleteProperty'])
    ->name('api_property_delete_property')
    ->middleware(['auth:api']);

