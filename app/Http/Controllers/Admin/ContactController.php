<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard.contacts', compact('contacts'));
    }

    public function store(Request $request)
    {
        $attributeNames = array(
            'primary_f_name' => 'Primary First Name',
            'primary_l_name' => 'Primary Last Name',     
        );

    	$validator = Validator::make($request->all(), [
            'primary_f_name' => 'required',
            'primary_l_name' => 'required',
        ]);

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return response()
                ->json([
                    'success' => false,
                    'error' =>  $validator->errors()
                ]);
        }

        $contact = new Contact();
        $contact->fill($request->all());
        $contact->save();
        flashMessageSet('Contact created successfully.','success');
        return ['success'=>true];
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);  
        $contact->delete();     
        flashMessageSet('Contact deleted successfully.','success');
        return redirect()->back()->with('success','Contact deleted successfully.');   
    }
}
