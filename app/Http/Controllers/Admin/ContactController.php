<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function __construct()
    {
       
    }

    public function index()
    {
        $contacts = Contact::all();
        $contactStatus = ContactStatus::all();
        return view('dashboard.contacts', compact('contacts','contactStatus'));
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
        ],
        [
            'primary_f_name.required' => 'First name is required',
            'primary_l_name.required' => 'Last name is required',
        ]
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return response()
                ->json([
                    'success' => false,
                    'error' =>  $validator->errors()
                ]);
        }
        $request->status = 1;
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

    public function updateStatus(Request $request)
    {
        $contact_id = $request->contact_id;
        $contact = Contact::findOrFail($contact_id);  
        $contact->status = $request->status_id;
        $contact->update();       
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return $contact;
    }

    public function update(Request $request, $id)
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

        $contact = Contact::findOrFail($id);
        $contact->fill($request->all());
        $contact->update();        
        flashMessageSet('Contact updated successfully.','success');
        return ['success'=>true];        
    }
}
