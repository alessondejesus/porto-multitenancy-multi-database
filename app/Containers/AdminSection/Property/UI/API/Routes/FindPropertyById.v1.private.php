<?php

/**
 * @apiGroup           Property
 * @apiName            findPropertyById
 *
 * @api                {GET} /v1/properties/:id Endpoint title here..
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

Route::get('properties/{id}', [Controller::class, 'findPropertyById'])
    ->name('api_property_find_property_by_id')
    ->middleware(['auth:api']);

