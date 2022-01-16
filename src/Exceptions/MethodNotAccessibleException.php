<?php

namespace JocelimJr\Exceptions;

use Exception;

class MethodNotAccessibleException extends Exception
{
    public function __construct($method = null, $code = 500, \Throwable $previous = null)
    {
        parent::__construct("Method '$method' not accessible.", $code, $previous);
    }
}
