<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactStatus;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $leads = Lead::orderBy('created_at', 'desc')->get();
        $leadStatus = ContactStatus::all();
        return view('dashboard.leads',compact('contacts','leads','leadStatus'));
    }

    public function store(Request $request)
    {
        $attributeNames = array(
            'contact_id' => 'Contact',     
        );

    	$validator = Validator::make($request->all(), [
            'project_name' => 'required',
            'project_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_id' => 'required',
        ]);

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return response()
                ->json([
                    'success' => false,
                    'error' =>  $validator->errors()
                ]);
        }
        $request->status = 1;
        $contact = new Lead();
        $contact->fill($request->all());
        $contact->save();
        flashMessageSet('Leads created successfully.','success');
        return ['success'=>true];
    }

    public function destroy($id)
    {
        $contact = Lead::findOrFail($id);  
        $contact->delete();     
        flashMessageSet('Lead deleted successfully.','success');
        return redirect()->back();           
    }

    public function show($id)
    {
        $lead = Lead::with('contact')->findOrFail($id);
        return $lead;
    }    

    public function update(Request $request, $id)
    {
        $attributeNames = array(
            'contact_id' => 'Contact',     
        );

    	$validator = Validator::make($request->all(), [
            'project_name' => 'required',
            'project_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_id' => 'required',
        ]);

        $validator->setAttributeNames($attributeNames);
        
        if ($validator->fails()) {
            return response()
                ->json([
                    'success' => false,
                    'error' =>  $validator->errors()
                ]);
        }

        $contact = Lead::findOrFail($id);
        $contact->fill($request->all());
        $contact->update();        
        flashMessageSet('Lead updated successfully.','success');
        return ['success'=>true];   
    }

    public function updateStatus(Request $request)
    {
        $lead_id = $request->lead_id;
        $contact = Lead::findOrFail($lead_id);  
        $contact->status = $request->status_id;
        $contact->update();       
    }
}
