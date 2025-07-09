<?php

namespace App\Exceptions;

use Exception;

class InternalServerErrorException extends Exception
{
    public function __construct(string $message = 'Internal Server Error', int $code = 500)
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
