<?php

namespace App\Dto\System\Auth;

class LoginSystemDto
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $email,
        public string $password,
    ) {}
}
