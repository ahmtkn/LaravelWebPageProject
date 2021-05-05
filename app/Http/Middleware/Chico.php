<?php

namespace App\Http\Middleware;

use App\Helper\Helper;
use Closure;
use DB;

class Chico
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
        if(!checkDBConnection() && !$request->is('install')){
            clearAllLogs();
            return redirect()->route('install.index');
        }
        if(checkDBConnection()){
            DB::connection()->disableQuerylog();
            Helper::setRoles();
        }

        return $next($request);
    }
}
