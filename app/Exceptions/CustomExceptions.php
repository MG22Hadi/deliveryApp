<?php

namespace App\Exceptions;

use Exception;

class ValidationException extends Exception
{
    protected $code = 422; // HTTP status code for validation errors
}

class AuthenticationException extends Exception
{
    protected $code = 401; // HTTP status code for authentication errors
}

class TokenException extends Exception
{
    protected $code = 400; // HTTP status code for token errors
}
