<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Models\UserRole;
use App\Models\Role;
use App\Models\RolePermissions;
use App\Models\Permissions;   vf 

use DB;
use Auth;

class RoleBaseMiddleware
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

        

        $data = DB::table('users as u')
                   ->join('user_role as ur', 'u.id',  '=', 'ur.id')
                   ->join('roles as r', 'ur.role_id',  '=', 'r.id')
                   ->select('u.id as ID', 'u.name as name','r.name as role')
                   ->where('u.id','=', 1)
                   ->first();

        if($data->role == 'Admin')
         {
             return $next($request);
         }
        else{
           return view('layouts.leave_Success');
        }
        
    }
}
