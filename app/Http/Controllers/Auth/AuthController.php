<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember_me = $request->has('remember_me') ? true : false;

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials,$remember_me)) {
            if(Auth::check() && Auth::user()->status == 0){
                Auth::logout();
                return redirect()->back()->withInput($request->all())->withErrors('Sorry, Your account is not activated yet!');
            }
            return redirect()->intended('admin')
                        ->withSuccess('You have Successfully loggedin');
        }
        return redirect()->back()->withInput($request->all())->withErrors('Incorrect Credentials!');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
