<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactStatus;
use App\Models\Estimate;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstimateController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        $leadStatus = ContactStatus::all();
        $estimates = Estimate::all();
        return view('dashboard.estimate',compact('estimates','leadStatus','leads'));
    }

    public function store(Request $request)
    {
        $attributeNames = array(
            'lead_id' => 'lead',     
        );

    	$validator = Validator::make($request->all(), [
            'project_name' => 'required',
            'project_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
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
        $contact = new Estimate();
        $contact->fill($request->all());
        $contact->save();
        flashMessageSet('Estimate created successfully.','success');
        return ['success'=>true];
    }

    public function destroy($id)
    {
        $contact = Estimate::findOrFail($id);  
        $contact->delete();     
        flashMessageSet('Estimate deleted successfully.','success');
        return redirect()->back();           
    }

    public function show($id)
    {
        $estimate = Estimate::findOrFail($id);
        return $estimate;
    }    

    public function update(Request $request, $id)
    {
        $attributeNames = array(
            'lead_id' => 'lead', 
        );

    	$validator = Validator::make($request->all(), [
            'project_name' => 'required',
            'project_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $validator->setAttributeNames($attributeNames);
        
        if ($validator->fails()) {
            return response()
                ->json([
                    'success' => false,
                    'error' =>  $validator->errors()
                ]);
        }

        $contact = Estimate::findOrFail($id);
        $contact->fill($request->all());
        $contact->update();        
        flashMessageSet('Estimate updated successfully.','success');
        return ['success'=>true];           
    }

    public function updateStatus(Request $request)
    {
        $estimate_id = $request->estimate_id;
        $contact = Estimate::findOrFail($estimate_id);  
        $contact->status = $request->status_id;
        $contact->update();       
    }
}
