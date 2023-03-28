<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use  DB;
class APIKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $keys = DB::table('api_key')->select('api_key')->pluck('api_key');
        //`dd( $keys->contains("adsfasdfasdfasdff"));

        // $request->header('api_key')
        if(  $keys->contains('adsfasdfasdfasdff'))
        {
            return $next($request);
        }
        $data = [
            'status'=> 200,
            'msg' => 'Filed'
        ];
        return response()->json($data);
    }
}
