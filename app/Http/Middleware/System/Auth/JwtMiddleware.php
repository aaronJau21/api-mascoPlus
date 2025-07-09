<?php

namespace App\Http\Middleware\System\Auth;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {

            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                throw new \App\Exceptions\NotFoundException('Usuario no encontrado');
            }
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                throw new \App\Exceptions\UnAuthorizedException('Token expirado');
            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                throw new \App\Exceptions\UnAuthorizedException('Token invalido');
            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\JWTException) {
                throw new \App\Exceptions\UnAuthorizedException('Token no proporcionado');
            } else {
                throw new \App\Exceptions\InternalServerErrorException($e->getMessage());
            }
        }
        return $next($request);
    }
}
