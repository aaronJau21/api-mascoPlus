<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function __construct(string $message = 'Not Found', int $code = 404)
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
