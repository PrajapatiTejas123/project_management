<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Auth;

class RoleApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
{
    try {
               
       
        $token = JWTAuth::parseToken();
             
        $user = $token->authenticate();
         //echo "<pre>"; print_r($user); exit;
    } catch (TokenExpiredException $e) {
           
        return $this->unauthorized('Your token has expired. Please, login again.');
    } catch (TokenInvalidException $e) {
       
        return $this->unauthorized('Your token is invalid. Please, login again.');
    }catch (JWTException $e) {
       
        return $this->unauthorized('Please, attach a Bearer Token to your request');
    }
        // echo "<pre>"; print_r($user->roles); exit;
        if($user->roles == 0 || $user->roles == 1){
        return $next($request);
    }

    return $this->unauthorized();
}

private function unauthorized($message = null){
    return response()->json([
        'message' => $message ? $message : 'You are unauthorized to access this resource',
        'success' => false
    ], 401);
}
}
