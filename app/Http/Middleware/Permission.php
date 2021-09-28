<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Permission as PermissionModal;
use Auth;
use  App\Models\RolesPermission;
class Permission
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
        $action = app('request')->route()->getAction();
        $action_name = class_basename($action['as']);
        list($actionpre, $actionslug, $actionmeth) = explode('.', $action_name);
        $permision = PermissionModal::where('slug', $actionslug)->select('id')->first();
        $access = '';
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);
        if($permision){
            switch ($action) {
                case "index":
                    $access="read";
                    break;
                case "show":
                    $access="read";
                    break;
                case "store":
                    $access="create";
                    break;
                case "update":
                    $access="update";
                    break;
                case "destroy":
                    $access="delete";
                    break;                    
                default:
                    $access = '';
            }
            $role_id = Auth::user()->role_id;
            $is_access = RolesPermission::where('role_id',$role_id)->where('permission_id',$permision->id)->where($access,1)->first();
            if($is_access)
            {
                return $next($request);
            }else{
                return abort(404);
            }
        }else{
            return $next($request);
        }

        //dd($controller,request()->segment(count(request()->segments())));
        //exit;
        return $next($request);
    }
}
