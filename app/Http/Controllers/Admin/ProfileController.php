<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use File;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.profile',compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if($request->has('profile_update')){
            if($user->email != $request->email){
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users'
                ]);
            }else{
                $request->validate([
                    'name' => 'required'
                ]);
            }
            User::where('id',$user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'company' => $request->company,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
            return redirect()->back()->with('profileSuccess','Profile updated successfully!');
        }

        if($request->has('password_update')){
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:6',
                'password_confirmation' => 'required_with:new_password|same:new_password|min:6'
            ]);   

            $data = $request->all();

            if (!Hash::check($data['old_password'], $user->password)) {
                return back()->with('old_passworderr', 'The old password does not match')->withInput($request->input());
            } else {
                User::where('id',$user->id)->update([
                    'password' => Hash::make($request->new_password),
                ]);   
                return redirect()->back()->with('passwordsuccess','Password updated successfully!'); 
            }
        }

    }

    public function updateAvatar(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:2000',
        ]);

        if ($validator->fails()) {
        return response()
            ->json([
                'success' => false,
                'error' =>  $validator->errors()->first()
            ]);
        }

        $user = Auth::user();
        $user_avatar = $user->avatar;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = time(). "-" . $photo->getClientOriginalName();
            $request->file('photo')->move(public_path('assets/images/user/images'), $fileName);
            $user->avatar = $fileName;
            $user->save();
            if($user_avatar){
                $image_path = public_path("assets/images/user/images/{$user_avatar}");
                if (File::exists($image_path)) {
                    unlink($image_path);
                }               
            }
        }

        return ['success'=>true,'message'=>'Successfully updated'];
    }
}
