<?php

namespace App\Http\Middleware;

use Closure;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class APIKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $keys = DB::table('api_keys')->select('api_key')->pluck('api_key');
        if(  $keys->contains($request->header('api_key')))
        {

        return $next($request);

        }
        $data = [
            'status'=> 201,
            'msg' => 'Filed'
        ];
        return response()->json($data);
    }
}
