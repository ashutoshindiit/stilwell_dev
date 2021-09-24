@extends('layouts.app')

@section('content')
@include('includes/sidebar')
<!--==================================*
   Main Content Section
   *====================================-->
<div class="main-content page-content conBox">

   <div class="topheader">
      <div class="card">
         <div class="card-body">
            <div class="search-box pull-left">
               <form action="javascript:void(0)" >
                  <i style="" class="ti-search"></i>
                  <input type="text" id="contact_search" placeholder="Search Contacts..." required>
               </form>
            </div>
            <button type="button" class="ml-3 btn btn-rounded btn-primary" data-toggle="modal" data-target="#contactModal">New Contact</button>
            <button type="button" class="ml-2 btn btn-rounded  btn-info">Open Contact</button>
            <button style="float: right;" type="button" class="ml-2 btn btn-rounded  btn-outline-primary">Create New Lead</button>
         </div>
      </div>
   </div>
   <!--==================================*
      Main Section
      *====================================-->
   <div class="main-content-inner">
      <div class="row">
         <!-- data table -->
         <div class="col-12">
            <div class="card">
               <div class="card-body ">
                  @php 
                     flashMessageGet();
                  @endphp
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row align-items-center">
                           <div class="col-2">
                              <div class="form-group">
                                 <select class="form-control statusSource">
                                    <option value="">Filter by Type</option>
                                    <option value="Client">Client</option>
                                    <option value="Subcontractor">Subcontractor</option>
                                    <option value="Personal">Personal</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-2">
                              <div class="form-group">
                                 <select class="form-control statusLabel">
                                    <option value="">Filter by Label</option>
                                    <option value="Painters">Painters</option>
                                    <option value="Drywallers">Drywallers</option>
                                    <option value="Framers">Framers</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-8 text-right">
                              <div class="custom-control custom-radio primary-radio custom-control-inline">
                                 <input type="radio" value="" id="customRadio14" name="contactStatchChk" class="custom-control-input" checked>
                                 <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio14">Show All</label>
                              </div>
                              <div class="custom-control custom-radio primary-radio custom-control-inline">
                                 <input type="radio" value="Active" id="customRadio4" name="contactStatchChk" class="custom-control-input">
                                 <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio4">Show Active</label>
                              </div>
                              <div class="custom-control custom-radio primary-radio custom-control-inline">
                                 <input type="radio" value="Inactive" id="customRadio41" name="contactStatchChk" class="custom-control-input">
                                 <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio41">Show Archived</label>
                              </div>
                           </div>
                        </div>
                        <div class="table-responsive">
                           <table id="dataTableContact" class="table text-center">
                              <thead class="bg-light text-capitalize">
                                 <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Company</th>
                                    <th>Contact Status</th>
                                    <th>Source</th>
                                    <th>Label</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Date Created</th>
                                    <th>Date Revised</th>
                                    <th> Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @if(count($contacts) > 0 )
                                    @foreach ($contacts as $contact)
                                       <tr data-contactId="{{ $contact->id }}">
                                          <td>{{ $contact->primary_f_name }}</td>
                                          <td>{{ $contact->primary_l_name }}</td>
                                          <td>{{ $contact->company }}</td>
                                          <td>{{ ($contact->active == 0) ? 'Inactive' : 'Active' }}</td>
                                          <td>{{ $contact->source }}</td>
                                          <td>{{ $contact->label }}</td>
                                          <td>{{ $contact->address }}</td>
                                          <td>{{ $contact->primary_phone_1 }}</td>
                                          <td><span class="label label-primary">{{ date('Y/m/d',strtotime($contact->created_at)) }}</span></td>
                                          <td><span class="label label-primary">{{ date('Y/m/d',strtotime($contact->updated_at)) }}</span></td>
                                          <td>
                                             <select class="form-control contactStatus">
                                                @foreach ($contactStatus as $status)
                                                   <option value="{{ $status->id }}" @if($contact->status == $status->id) selected @endif>{{ $status->name }}</option>
                                                @endforeach
                                             </select>
                                          </td>
                                          <td>
                                             <ul class="d-flex justify-content-center">
                                                <li class="mr-3"><a href="#" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="text-info view_contact"><i class="fa fa-eye"></i></a></li>
                                                <li class="mr-3"><a href="#" class="text-primary edit-contact"><i class="fa fa-edit"></i></a></li>
                                                <form action="{{ Route('admin.contacts.destroy',['contact'=>$contact->id]) }}" id="delete_contact_{{$contact->id}}" method="post">
                                                   @csrf
                                                   @method('DELETE')
                                                </form>                                                
                                                <li><a href="#"  onclick="archiveFunction('delete_contact_{{$contact->id}}')" class="text-danger"><i class="ti-trash"></i></a></li>
                                             </ul>
                                       </td>
                                       </tr>                                       
                                    @endforeach
                                 @endif
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!--div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                     </div-->
                  </div>
               </div>
            </div>
         </div>
         <!-- data table -->
      </div>
   </div>
   <!--==================================*
      End Main Section
      *====================================-->
</div>
<!--=================================*
   End Main Content Section
   *===================================-->
  <!-- Add Contact The Modal -->
<div class="modal contact-modal" id="contactModal">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header p-0">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="add_contacts" action="" method="post"> 
               <div class="contactInfo">
                  <h2>Add Contact</h2>
                  <div class="switchBox">
                     <span class="ac">Active</span>
                     <label class="switch">
                        <input type="checkbox" name="active" value="1">
                        <span class="slider round"></span>
                     </label>
                  </div>
                  <hr />
                  <div class="form-group w-50">
                     <div class="row">
                        <div class="col-md-6">
                           <select class="form-control statusFrom" name="source">
                              <option value="Client">Client</option>
                              <option value="Subcontractor">Subcontractor</option>
                              <option value="Personal">Personal</option>
                           </select>                        
                        </div>
                        <div class="col-md-6">
                           <select class="form-control statusFrom" name="label">
                              <option value="Painters">Painters</option>
                              <option value="Drywallers">Drywallers</option value="">
                              <option value="Framers">Framers</option>
                           </select>                        
                        </div>
                     </div>
                  </div>

                  <div class="contactInfoBox mb-2">
                     <h3>Primary Information</h3>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="First Name" name="primary_f_name">
                              <span class="primary_f_name_err alert text-danger error-form"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Last Name" name="primary_l_name">
                              <span class="primary_l_name_err alert text-danger error-form"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Phone 1" name="primary_phone_1">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <select class="form-control statusFrom" name="primary_phone_1_type">
                                 <option value="">Select Type</option>
                                 <option value="Home">Home</option>
                                 <option value="Office">Office</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Phone 2" name="primary_phone_2">
                           </div>
                        </div>
                     
                        <div class="col-md-6">
                           <div class="form-group">
                              <select class="form-control statusFrom" name="primary_phone_2_type">
                                 <option value="">Select Type</option>
                                 <option value="Home">Home</option>
                                 <option value="Office">Office</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Email" name="primary_email">
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="contactInfoBox">
                     <h3>Secondary Information</h3>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Relationship" name="relationship">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="First Name" name="secondary_f_name">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Last Name" name="secondary_l_name">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Phone 1" name="secondary_phone_1">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <select class="form-control statusFrom" name="secondary_phone_1_type">
                                 <option value="">Select Type</option>
                                 <option value="Home">Home</option>
                                 <option value="Office">Office</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group" name="secondary_phone_2">
                              <input class="form-control" type="text" placeholder="Phone 2">
                           </div>
                        </div>
                     
                        <div class="col-md-6">
                           <div class="form-group">
                              <select class="form-control statusFrom" name="secondary_phone_2_type">
                                 <option value="">Select Type</option>
                                 <option value="Home">Home</option>
                                 <option value="Office">Office</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Email" name="secondary_email">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Address" name="address">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="City" name="city">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="State" name="state">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Zip Code" name="zipcode">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Company" name="company">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Title" name="title">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <textarea class="form-control" rows="5" placeholder="Notes" name="notes"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <button type="button" class="btn cbtn btn-rounded btn-primary add-contact-btn" >Save</button>
               </div>
            </form>
        </div>
      </div>
   </div>
</div>   

  <!-- The Edit Contact Modal -->
  <div class="modal contact-modal" id="contactModalEdit">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header p-0">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="update_contacts" action="" method="post"> 
               <div class="contactInfo">
                  <h2>Edit Contact</h2>
                  <div class="switchBox">
                     <span class="ac">Active</span>
                     <label class="switch">
                        <input type="hidden" name="active" value="0">
                        <input type="checkbox" name="active" value="1">
                        <span class="slider round"></span>
                     </label>
                  </div>
                  <hr />
                  <div class="form-group w-50">
                     <div class="row">
                        <div class="col-md-6">
                           <select class="form-control statusFrom" name="source">
                              <option value="Client">Client</option>
                              <option value="Subcontractor">Subcontractor</option>
                              <option value="Personal">Personal</option>
                           </select>                        
                        </div>
                        <div class="col-md-6">
                           <select class="form-control statusFrom" name="label">
                              <option value="Painters">Painters</option>
                              <option value="Drywallers">Drywallers</option value="">
                              <option value="Framers">Framers</option>
                           </select>                        
                        </div>
                     </div>
                  </div>

                  <div class="contactInfoBox mb-2">
                     <h3>Primary Information</h3>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="First Name" name="primary_f_name">
                              <span class="primary_f_name_err alert text-danger error-form"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Last Name" name="primary_l_name">
                              <span class="primary_l_name_err alert text-danger error-form"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Phone 1" name="primary_phone_1">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <select class="form-control statusFrom" name="primary_phone_1_type">
                                 <option value="">Select Type</option>
                                 <option value="Home">Home</option>
                                 <option value="Office">Office</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Phone 2" name="primary_phone_2">
                           </div>
                        </div>
                     
                        <div class="col-md-6">
                           <div class="form-group">
                              <select class="form-control statusFrom" name="primary_phone_2_type">
                                 <option value="">Select Type</option>
                                 <option value="Home">Home</option>
                                 <option value="Office">Office</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Email" name="primary_email">
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="contactInfoBox">
                     <h3>Secondary Information</h3>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Relationship" name="relationship">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="First Name" name="secondary_f_name">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Last Name" name="secondary_l_name">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Phone 1" name="secondary_phone_1">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <select class="form-control statusFrom" name="secondary_phone_1_type">
                                 <option value="">Select Type</option>
                                 <option value="Home">Home</option>
                                 <option value="Office">Office</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group" name="secondary_phone_2">
                              <input class="form-control" type="text" placeholder="Phone 2">
                           </div>
                        </div>
                     
                        <div class="col-md-6">
                           <div class="form-group">
                              <select class="form-control statusFrom" name="secondary_phone_2_type">
                                 <option value="">Select Type</option>
                                 <option value="Home">Home</option>
                                 <option value="Office">Office</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Email" name="secondary_email">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Address" name="address">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="City" name="city">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="State" name="state">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Zip Code" name="zipcode">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Company" name="company">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Title" name="title">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <textarea class="form-control" rows="5" placeholder="Notes" name="notes"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <button type="button" class="btn cbtn btn-rounded btn-primary update-contact-btn" >Update</button>
               </div>
            </form>
        </div>
      </div>
   </div>
</div> 
<!-- View Contact The Modal -->
<div class="modal contact-modal" id="viewcontact">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header p-0">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body viewBox1">
            <form id="view_contact" action="" method="post">
               <div class="contactInfo">
                  <h2 class="d-flex justify-content-between align-items-center">View Contact <span class="v_status"><i class="fa fa-check" aria-hidden="true"></i> Active</span></h2>
                  <hr />
                  <div class="contactInfoBox   mb-2">
                     <h3>Primary Information</h3>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>First Name</label>
                              <h4 class="v_primary_f_name">Charles</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Last Name</label>
                              <h4 class="v_primary_l_name">Johnson</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Phone1</label>
                              <h4 class="v_primary_phone_1">123456789</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Type</label>
                              <h4 class="v_primary_phone_1_type">Home</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Phone2</label>
                              <h4 class="v_primary_phone_2">123456789</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Type</label>
                              <h4 class="v_primary_phone_2_type">Office</h4>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Email</label>
                              <h4 class="v_primary_email">abc@gmail.com</h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="contactInfoBox">
                     <h3>Secondary Information</h3>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Relationship</label>
                              <h4 class="v_relationship">abc@gmail.com</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>First Name</label>
                              <h4 class="v_secondary_f_name">Charles</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Last Name</label>
                              <h4 class="v_secondary_l_name">Johnson</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Phone1</label>
                              <h4 class="v_secondary_phone_1">123456789</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Type</label>
                              <h4 class="v_secondary_phone_1_type">Home</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Phone1</label>
                              <h4 class="v_secondary_phone_2">123456789</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Type</label>
                              <h4 class="v_secondary_phone_2_type">Office</h4>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Email</label>
                              <h4 class="v_secondary_email">abc@gmail.com</h4>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Address</label>
                              <h4 class="v_address">#40 New York</h4>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>City</label>
                              <h4 class="v_city">Xyz</h4>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>State</label>
                              <h4 class="v_state">Xyz</h4>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Zip Code</label>
                              <h4 class="v_zipcode">123456</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Company</label>
                              <h4 class="v_company">Xyz</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Title</label>
                              <h4 class="v_title">Xyz</h4>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Notes</label>
                              <h4 class="v_notes">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="contactInfoBox">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Type</label>
                              <h4 class="v_source">Personal</h4>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Label</label>
                              <h4 class="v_label">Painters</h4>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection 
@section('scripts_extra')
<script>
   $(document).ready(function () {

      var table = $('#dataTableContact').DataTable({
        "columnDefs": [
            {
                "targets": [ 3 ],
                "visible": false,
            },
            {
                "targets": [ 4 ],
                "visible": false,
            },
            {
                "targets": [ 5 ],
                "visible": false,
            }
        ]
      });

      $('input:radio[name="contactStatchChk"]').change(function(){
         var statusSource = $('.statusSource').val().toLowerCase()
         var statusLabel = $('.statusLabel').val().toLowerCase()
         var statusChk = $('input[name=contactStatchChk]:checked').val().toLowerCase()
         if (!statusSource && !statusLabel && !statusChk) {
            table.search("").draw();   
            return;
         }
         table.search(this.value, true, false, true ).draw();
         $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {

            if(statusSource && statusLabel && statusChk){
               console.log(1)
               if (data[4].toLowerCase() == statusSource && data[5].toLowerCase() == statusLabel && data[3].toLowerCase() == statusChk) return true
            }
            else if(statusSource && statusLabel){
               console.log(2)
               if (data[4].toLowerCase() == statusSource && data[5].toLowerCase() == statusLabel) return true
            }
            else if(statusSource && statusChk){
               console.log(3)
               if (data[4].toLowerCase() == statusSource && data[3].toLowerCase() == statusChk) return true
            }
            else if(statusLabel && statusChk){
               console.log(4)
               if (data[5].toLowerCase() == statusLabel && data[3].toLowerCase() == statusChk) return true
            }
            else if(statusChk){
               console.log(5)
               if (data[3].toLowerCase() == statusChk) return true
            }
            else if(statusLabel){
               console.log(6)
               if (data[5].toLowerCase() == statusLabel) return true
            }
            else if(statusSource){
               console.log(7)
               if (data[4].toLowerCase() == statusSource) return true
            }
            return false
         })
         table.draw();   
         $.fn.dataTable.ext.search.pop()
      });    

      $('.statusSource').change(function(){
         var statusSource = $('.statusSource').val().toLowerCase()
         var statusLabel = $('.statusLabel').val().toLowerCase()
         var statusChk = $('input[name=contactStatchChk]:checked').val().toLowerCase()
         if (!statusSource && !statusLabel && !statusChk) {
            table.search("").draw();   
            return;
         }
         table.search(this.value, true, false, true ).draw();
         $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {

            if(statusSource && statusLabel && statusChk){
               console.log(1)
               if (data[4].toLowerCase() == statusSource && data[5].toLowerCase() == statusLabel && data[3].toLowerCase() == statusChk) return true
            }
            else if(statusSource && statusLabel){
               console.log(2)
               if (data[4].toLowerCase() == statusSource && data[5].toLowerCase() == statusLabel) return true
            }
            else if(statusSource && statusChk){
               console.log(3)
               if (data[4].toLowerCase() == statusSource && data[3].toLowerCase() == statusChk) return true
            }
            else if(statusLabel && statusChk){
               console.log(4)
               if (data[5].toLowerCase() == statusLabel && data[3].toLowerCase() == statusChk) return true
            }
            else if(statusChk){
               console.log(5)
               if (data[3].toLowerCase() == statusChk) return true
            }
            else if(statusLabel){
               console.log(6)
               if (data[5].toLowerCase() == statusLabel) return true
            }
            else if(statusSource){
               console.log(7)
               if (data[4].toLowerCase() == statusSource) return true
            }
            return false
         })
         table.draw();   
         $.fn.dataTable.ext.search.pop()
      });

      $('.statusLabel').change(function(){
         var statusSource = $('.statusSource').val().toLowerCase()
         var statusLabel = $('.statusLabel').val().toLowerCase()
         var statusChk = $('input[name=contactStatchChk]:checked').val().toLowerCase()
         if (!statusSource && !statusLabel && !statusChk) {
            table.search("").draw();   
            return;
         }
         table.search(this.value, true, false, true ).draw();
         $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {

            if(statusSource && statusLabel && statusChk){
               console.log(1)
               if (data[4].toLowerCase() == statusSource && data[5].toLowerCase() == statusLabel && data[3].toLowerCase() == statusChk) return true
            }
            else if(statusSource && statusLabel){
               console.log(2)
               if (data[4].toLowerCase() == statusSource && data[5].toLowerCase() == statusLabel) return true
            }
            else if(statusSource && statusChk){
               console.log(3)
               if (data[4].toLowerCase() == statusSource && data[3].toLowerCase() == statusChk) return true
            }
            else if(statusLabel && statusChk){
               console.log(4)
               if (data[5].toLowerCase() == statusLabel && data[3].toLowerCase() == statusChk) return true
            }
            else if(statusChk){
               console.log(5)
               if (data[3].toLowerCase() == statusChk) return true
            }
            else if(statusLabel){
               console.log(6)
               if (data[5].toLowerCase() == statusLabel) return true
            }
            else if(statusSource){
               console.log(7)
               if (data[4].toLowerCase() == statusSource) return true
            }
            return false
         })
         table.draw();   
         $.fn.dataTable.ext.search.pop()
      }); 

      $(document).on('keyup','#contact_search', function(e){
         table.search(this.value).draw();
      });

      $(document).on('click','.view_contact', function(e){
         e.preventDefault();
         var contact_id = $(this).parents('tr').attr('data-contactId');
         var $this = $(this);
         if(contact_id){
            var url = "{{ route('admin.contacts.show', ['contact'=>':id']) }}";
            url = url.replace(':id', contact_id);
            $.ajax({
               url: url,
               type:"GET",
               success:function(data){
                  openViewContact(data);                  
               },
            });            
         }
      });

      $(document).on('click','.edit-contact', function(e){
         e.preventDefault();
         var contact_id = $(this).parents('tr').attr('data-contactId');
         var $this = $(this);
         if(contact_id){
            var url = "{{ route('admin.contacts.show', ['contact'=>':id']) }}";
            url = url.replace(':id', contact_id);
            $.ajax({
               url: url,
               type:"GET",
               success:function(data){
                  openEditContact(data);                  
               },
            });            
         }
      });

      $(document).on('change','.contactStatus', function(){
         var contact_id = $(this).parents('tr').attr('data-contactId');
         var status_id = $(this).val();
         var $this = $(this);
         if(status_id && contact_id){
            $.ajax({
               url: "{{ Route('admin.contact.status.update') }}",
               type:"PUT",
               data: {
                  'contact_id' : contact_id,
                  'status_id' : status_id
               },
               success:function(data){
                  $this.parents('tr').css('background','rgba(173, 216, 230, 0.4)');
                  setTimeout(function(){ $this.parents('tr').css('background',''); $this.blur();  }, 1000 );
                  
               },
            });            
         }
      });

      $(document).on('click','.add-contact-btn', function(){
         $('.error-form').empty();
         $.ajax({
            url: "{{ Route('admin.contacts.store') }}",
            type:"POST",
            data: $('#add_contacts').serialize(),
            success:function(data){
               if ($.isEmptyObject(data.error)) {
                  location.reload();
               } else {
                  printErrorMsg('#add_contacts', data.error);
               }
            },
         });
      });

      $(document).on('click','.update-contact-btn', function(){
         $('.error-form').empty();
         var contact_id =  $('#update_contacts .update-contact-btn').attr('contact-id');
         var url = "{{ route('admin.contacts.update', ['contact'=>':id']) }}";
         url = url.replace(':id', contact_id);
         $.ajax({
            url: url,
            type:"PUT",
            data: $('#update_contacts').serialize(),
            success:function(data){
               if ($.isEmptyObject(data.error)) {
                  location.reload();
               } else {
                  printErrorMsg('#update_contacts',data.error);
               }
            },
         });
      });
      
   });

   function openEditContact(data)
   {
      $('#update_contacts select[name=source]').val(data.source);
      $('#update_contacts select[name=label]').val(data.label);
      if(data.active == 1){
         $('#update_contacts input[name=active]').prop('checked',true);
      }else{
         $('#update_contacts input[name=active]').prop('checked',false);
      }
      $('#update_contacts input[name=primary_f_name]').val(data.primary_f_name);
      $('#update_contacts input[name=primary_l_name]').val(data.primary_l_name);
      $('#update_contacts input[name=primary_phone_1]').val(data.primary_phone_1);
      $('#update_contacts select[name=primary_phone_1_type]').val(data.primary_phone_1_type);
      $('#update_contacts input[name=primary_phone_2]').val(data.primary_phone_2);
      $('#update_contacts select[name=primary_phone_2_type]').val(data.primary_phone_2_type);
      $('#update_contacts input[name=primary_email]').val(data.primary_email);
      $('#update_contacts input[name=relationship]').val(data.relationship);
      $('#update_contacts input[name=secondary_f_name]').val(data.secondary_f_name);
      $('#update_contacts input[name=secondary_l_name]').val(data.secondary_l_name);
      $('#update_contacts input[name=secondary_phone_1]').val(data.secondary_phone_1);
      $('#update_contacts select[name=secondary_phone_1_type]').val(data.secondary_phone_1_type);
      $('#update_contacts input[name=secondary_phone_2]').val(data.secondary_phone_2);
      $('#update_contacts select[name=secondary_phone_2_type]').val(data.secondary_phone_2_type);   
      $('#update_contacts input[name=secondary_email]').val(data.secondary_email);   
      $('#update_contacts input[name=address]').val(data.address);
      $('#update_contacts input[name=city]').val(data.city);
      $('#update_contacts input[name=state]').val(data.state);
      $('#update_contacts input[name=zipcode]').val(data.zipcode);
      $('#update_contacts input[name=company]').val(data.company);
      $('#update_contacts input[name=title]').val(data.title);
      $('#update_contacts textarea[name=notes]').val(data.notes);
      $('#update_contacts .update-contact-btn').attr('contact-id',data.id);
      $('#contactModalEdit').modal('show');
   }


   function openViewContact(data)
   {
      console.log(data);
      $('#viewcontact .v_source').html(data.source);
      $('#viewcontact .v_label').html(data.label);
      if(data.active == 1){
         $('#viewcontact .v_status').html('<i class="fa fa-check" aria-hidden="true"></i> Active');
      }else{
         $('#viewcontact .v_status').html('<i class="fa fa-close" aria-hidden="true"></i> Inactive');
      }
      $('#viewcontact .v_primary_f_name').html(data.primary_f_name);
      $('#viewcontact .v_primary_l_name').html(data.primary_l_name);
      $('#viewcontact .v_primary_phone_1').html(data.primary_phone_1);
      $('#viewcontact .v_primary_phone_1_type').html(data.primary_phone_1_type);
      $('#viewcontact .v_primary_phone_2').html(data.primary_phone_2);
      $('#viewcontact .v_primary_phone_2_type').html(data.primary_phone_2_type);
      $('#viewcontact .v_primary_email').html(data.primary_email);
      $('#viewcontact .v_relationship').html(data.relationship);
      $('#viewcontact .v_secondary_f_name').html(data.secondary_f_name);
      $('#viewcontact .v_secondary_l_name').html(data.secondary_l_name);
      $('#viewcontact .v_secondary_phone_1').html(data.secondary_phone_1);
      $('#viewcontact .v_secondary_phone_1_type').html(data.secondary_phone_1_type);
      $('#viewcontact .v_secondary_phone_2').html(data.secondary_phone_2);
      $('#viewcontact .v_secondary_phone_2_type').html(data.secondary_phone_2_type);   
      $('#viewcontact .v_secondary_email').html(data.secondary_email);   
      $('#viewcontact .v_address').html(data.address);
      $('#viewcontact .v_city').html(data.city);
      $('#viewcontact .v_state').html(data.state);
      $('#viewcontact .v_zipcode').html(data.zipcode);
      $('#viewcontact .v_company').html(data.company);
      $('#viewcontact .v_title').html(data.title);
      $('#viewcontact .v_notes').html(data.notes);
      $('#viewcontact').modal('show');
   }


   function archiveFunction(formID) {
      event.preventDefault(); // prevent form submit
      var form = document.getElementById(formID);
      swal({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, delete it!'
      }).then(function(isConfirm){
         if (isConfirm.value == true) {
            form.submit()
         }
      })
   }


</script>
@endsection