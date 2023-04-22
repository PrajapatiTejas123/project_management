<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Api
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // try {
       //      $token = $request->bearerToken();
       //      $user = JWTAuth::user($request->header($token));
       //      echo "<pre>"; print_r($user); exit;

       //  } catch (JWTException $e) {
       //      if ($e instanceof TokenExpiredException) {
       //          return response()->json([
       //              'error' => 'token_expired',
       //              'code' => 401
       //          ], 401);
       //      } 
       //      else if($e instanceof TokenInvalidException){
       //          return response()->json([
       //              'error' => "token_invalid",
       //              'code' => 401
       //          ], 401);
       //      } 
       //      else {
       //          return response()->json([
       //              'error' => 'Token is required',
       //              'code' => 401,

       //          ], 401);
       //      }
       //  }

       //  return $next($request);
       
        $token = $request->bearerToken();
        try{
            $user = JWTAuth::parseToken($token)->touser();
            if (!$user) {
                return response()->json(['message'=>'user not found'], 401);
            }
        }catch(TokenExpiredException $e){
            return response()->json(['message'=>'Token is expired'], 401);
        }catch(TokenInvalidException $e){
            return response()->json(['message'=>'Token is Invalid'], 401);
        }catch(JWTException $e){
            return response()->json(['message'=>'Please Token insert'], 401);
        }
            return $next($request);
    }

}
