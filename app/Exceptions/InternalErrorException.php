<?php

namespace App\Exceptions;

use Exception;

class InternalErrorException extends Exception
{
    public const STATUS = 500;

    protected const CODE = 'InternalError';

    protected const MESSAGE = 'The request failed due to an internal error.';
}
