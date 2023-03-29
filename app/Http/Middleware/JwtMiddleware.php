<?php
namespace App\Http\Middleware;


use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


class JwtMiddleware extends BaseMiddleware
{


	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		try {
		   $user = JWTAuth::parseToken()->authenticate();
		} catch (Exception $e) {
       	  if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
		    return Resp('','Token is Invalid', 403) ;
		  }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
			return Resp('','Token is Expired', 401) ;
		  }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException){
			return Resp('','Token is Blacklisted', 400) ;
		  }else{
		        return  Resp('','Authorization Token not found', 400) ;
		  }
		}
           return $next($request);
	}
}
