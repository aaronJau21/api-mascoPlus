<?php

namespace App\Http\Controllers\System\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Auth\LoginSystemRequest;
use App\Service\System\Auth\LoginSystemService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $loginService;

    public function __construct(LoginSystemService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(LoginSystemRequest $request)
    {
        return $this->loginService->loginSystem($request);
    }
}
