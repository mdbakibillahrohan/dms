<?php

namespace App\Http\Middleware;

use App\Models\Menus\MenuPermission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class MenuPermissionMiddleware
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
        if (isset(Auth::guard('admin')->user()->name)) {
            return $next($request);
        }
        $route = Route::currentRouteName();
        if (isset(Auth::guard('teacher')->user()->id)) {
            $id = Auth::guard('teacher')->user()->id;
            $menuPermission = MenuPermission::where('teacher_id', $id)->get();
            $isPermitted = false;
            foreach ($menuPermission as $menu) {
                if ($menu->route == $route) {
                    $isPermitted = true;
                    break;
                }
            }
            if ($isPermitted) {
                return $next($request);
            }
            $notification = [
                "message" => "You don't have permission",
                "type" => "warning"
            ];
            session()->flash('notification', $notification);
            return back();
        }
        return redirect('/');
    }
}
