<?php

namespace App\Exceptions;

use Exception;

class UnAuthorizedException extends Exception
{
    public function __construct(string $message = 'Unauthorized', int $code = 401)
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
