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
