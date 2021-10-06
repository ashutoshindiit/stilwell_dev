<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;

class SendEmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            'emailTo' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            "emailSubject" => 'required',
            "emailText" => 'required',
        ]);
        if ($validator->passes()) {
            $files = $request->file('emailFile');
            $data = array(
                'to'=> $request->emailTo,
                'emailSubject'=> $request->emailSubject,
                'emailText'=> $request->emailText
            );            

            \Mail::send('dashboard.emails.email', compact('data'), function ($message) use($data, $files){    
                $message->from('25userdemo@gmail.com');
                $message->to($data['to'])->subject($data['emailSubject']);
                if($files) {
                    $message->attach($files->getRealPath(), array(
                        'as' => $files->getClientOriginalName(), // If you want you can chnage original name to custom name      
                        'mime' => $files->getMimeType())
                    );
                }
            });            
            return response()->json(['success'=>'true']);
        }else{
            return response()->json(['error'=>$validator->errors()]);
        }
    }
}
