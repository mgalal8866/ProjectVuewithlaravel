<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class APIVersion
{

     public function handle($request, Closure $next, $guard)
        {
            if( config('app.api_latest') == $guard ){

                return $next($request);
            }else{

                return response(['error' => 'Filed API V']);
            }
        }
}
