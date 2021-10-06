<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    public function getEmail()
    {
        return view('auth.forgot-password');
    }

    public function postEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.password.verify',['token' => $token], function($message) use ($request) {
            $message->from('25userdemo@gmail.com');
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('message', 'We have e-mailed your password reset link! Please check your inbox.');
    }    
}
