<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPassword
{

    public function handle(Request $request, Closure $next)
    {
        if( $request->header('api_password') !== env('API_PASSWORD','123456')){
            return response()->json(['message' => 'Please enter the password']);
        }
        return $next($request);
    }
}
