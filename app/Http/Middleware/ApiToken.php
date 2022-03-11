<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Http\Controllers\AccessAPIController;
use App\Models\mac_address;

use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // if (Cache::get($this->email) != exec('getmac')) {
        //     return response()->json('Unauthorized', 401);
        // }

        $user = JWTAuth::parsetoken()->authenticate();

        // return response()->json(['api_token_user' => $user]);

        if(Cache::get($user->email) == exec("getmac")){
            return $next($request);
        }else{
            return response()->json(['status' => 'Unauthorized access your mac address is not registered']);
        }

        // return $next($request);

        // dump($user_associated->name);

    }
}
