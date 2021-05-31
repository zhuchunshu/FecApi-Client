<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Http\Request;

class Status
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if($user){
             // 如果用户已登录
            if($user->status!="正常"){
                return abort(403,'你已被封号!');
            }
        }
        return $next($request);
    }
}
