<?php

namespace JocelimJr\Exceptions;

use Exception;

class MethodNotImplementedException extends Exception
{
    public function __construct($method = null, $code = 500, \Throwable $previous = null)
    {
        parent::__construct("Method '$method' not implemented.", $code, $previous);
    }
}
