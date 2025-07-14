<?php

namespace App\Exceptions;

use Exception;

class ConfictException extends Exception
{
    public function __construct($message = "Conflict", $code = 409)
    {
        parent::__construct($message, $code);
    }

    public function render($request)
    {
        return response()->json([
            'msg' => $this->getMessage()
        ], $this->getCode());
    }
}
