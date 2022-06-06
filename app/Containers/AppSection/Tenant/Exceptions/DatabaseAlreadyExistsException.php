<?php


namespace App\Containers\AppSection\Tenant\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class DatabaseAlreadyExistsException extends Exception
{
    protected $code = Response::HTTP_BAD_REQUEST;
    protected $message = 'Database already exists.';
}

