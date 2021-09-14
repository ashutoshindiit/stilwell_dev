<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('dashboard.roles', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('dashboard.create-role', compact('permissions') );  
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        $role_id = $role->id;
        if(isset($request->permision) && $request->permision){
            $user_permissions = $request->permision;
            foreach($user_permissions as $key=>$permision){
                $data = array();
                $data['role_id'] = $role_id;
                $data['permission_id'] = $key;
                $data['read'] = ( @$permision['r'] ) ? $permision['r'] : 0;
                $data['update'] = ( @$permision['u'] ) ? $permision['u'] : 0;
                $data['create'] = ( @$permision['c'] ) ? $permision['c'] : 0;
                $data['delete'] = ( @$permision['d'] ) ? $permision['d'] : 0;
                $data['created_at'] =  \Carbon\Carbon::now();
                $data['updated_at'] = \Carbon\Carbon::now(); 
                DB::table('roles_permissions')->insert($data);
            }
        }
        return redirect()->route('admin.roles')->with('success','Role created successfully.');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);  
        $role->delete();
        return redirect()->back()->with('success','Role deleted successfully.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);    
        $user_permissions = $role->roles_permissions;
        return view('dashboard.update-role', compact('role','user_permissions') );  
    }

    public function update(Request $request,$id)
    {
       
        $this->validate($request, [
            'name' => 'required',
        ]);

        $role = Role::findOrFail($id);  
        $role->name = $request->name;
        $role->update();
        if(isset($request->permision) && $request->permision){
            $user_permissions = $request->permision;
            foreach($user_permissions as $key=>$permision){
                $data = array();
                $data['read'] = ( @$permision['r'] ) ? $permision['r'] : 0;
                $data['update'] = ( @$permision['u'] ) ? $permision['u'] : 0;
                $data['create'] = ( @$permision['c'] ) ? $permision['c'] : 0;
                $data['delete'] = ( @$permision['d'] ) ? $permision['d'] : 0;
                $data['created_at'] =  \Carbon\Carbon::now();
                $data['updated_at'] = \Carbon\Carbon::now(); 
                DB::table('roles_permissions')->where('role_id', $id)->where('permission_id',$key)->update($data);
            }
        }
        return redirect()->route('admin.roles')->with('success','Role updated successfully.');
    }
}
