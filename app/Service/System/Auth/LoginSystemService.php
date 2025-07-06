<?php

namespace App\Service\System\Auth;

use App\Dto\System\Auth\LoginSystemDto;
use App\Exceptions\UnAuthorizedException;
use App\Http\Requests\System\Auth\LoginSystemRequest;
use App\Http\Resources\System\Auth\LoginResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginSystemService
{
    public function loginSystem(LoginSystemRequest $request)
    {
        $data = new LoginSystemDto(...$request->validated());

        if (!$token = Auth::attempt([
            'email' => $data->email,
            'password' => $data->password,
        ])) {
            throw new UnAuthorizedException('Credeciales inválidas');
        }

        $user = User::where('email', $data->email)->with('userRole')->first();


        return [
            'token' => $token,
            'user' => new LoginResource($user)
        ];
    }
}
