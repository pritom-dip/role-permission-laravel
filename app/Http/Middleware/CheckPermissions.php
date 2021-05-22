<?php

namespace App\Http\Middleware;
use App\Helpers\GlobalHelper;
use Closure;
use Route;
use Auth;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next, $guard = null )
    {  
        $guard              = GlobalHelper::getGuard();
        $currentRouteName   = Route::currentRouteName();
        $check_guard        = Auth::guard('admin')->check();

        // dd(Auth::guard($guard)->user()->role->name);

        if(Auth::guard($guard)->user()->role->name == 'Super Admin'){
            return $next($request);
        }
        
        if( $check_guard && !empty(Auth::guard($guard)->user()->id)){
            $permissions = Auth::user()->role->permission;
            if(!empty($permissions)){ 
                foreach( $permissions->permissions as $permission ){
                    $permission = json_decode($permission);  
                    if (isset($permission->route_name)) {
                        if($permission->route_name == $currentRouteName){ 
                            return $next($request);
                        }
                    }
                }
            }
        }   
        return redirect()->route('admin.dashboard')->with('error', 'Unauthorized access');    
        // return $next($request);
    }
}
