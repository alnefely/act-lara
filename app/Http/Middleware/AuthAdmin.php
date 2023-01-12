<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $rol)
    {
        $AuthAdmin = Auth::guard('AuthAdmin');

        if( $AuthAdmin->check() )
        {   
            if ( empty($AuthAdmin->user()->group_id) || $AuthAdmin->user()->group->$rol != 'enable' ) {
                return redirect('/admin/home')->with('error', 'ليس لديك الصلاحية لفتح هذه الصفحة');
            }
            return $next($request);
        }
        return redirect('/auth');
    }
}
