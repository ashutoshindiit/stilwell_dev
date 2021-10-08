<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    public function index()
    {
        $teams = User::orderBy('id','desc')->get();
        return view('dashboard.teams', compact('teams'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('dashboard.create-team', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|required_with:password|same:password|min:6',
            'status' => 'required',
            'role' => 'required',
        ],
        [
            'password_confirmation.same'=>'Confirm password mismatched',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
            'status' => $request->status,
        ]);

        return redirect('admin/teams');
    }

    public function edit($id) 
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('dashboard.update-team',compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        if($request->has('update_profile')){
            $user = User::findOrFail($id);
            if($user->email != $request->email){
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'status' => 'required',
                    'role' => 'required',
                ]);
            }else{
                $request->validate([
                    'name' => 'required',
                    'status' => 'required',
                    'role' => 'required',
                ]);
            }
            User::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role,
                'status' => $request->status,
            ]);
            return redirect()->back()->with('successMessage','Team updated successfully!');
        }

        if($request->has('update_password')){
            $request->validate([
                'password' => 'required|min:6',
                'password_confirmation' => 'required|required_with:password|same:password|min:6',
            ],
            [
                'password_confirmation.same'=>'Confirm password mismatched',
            ]
            );    
            User::where('id',$id)->update([
                'password' => Hash::make($request->password),
            ]);        
            return redirect()->back()->with('successMessagePass','Password updated successfully!');
        }

    }

    public function destroy($id)
    {
        $role = User::findOrFail($id);  
        $role->delete();
        return redirect()->back()->with('success','User deleted successfully.');
    }
}
