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
               <form action="#" >
                  <i style="" class="ti-search"></i>
                  <input type="text" name="search" placeholder="Search Contacts..." required="">
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
                           <div class="col-3">
                              <div class="form-group">
                                 <select class="form-control statusFrom">
                                    <option value="">Contact Type</option>
                                    <option>Large select</option>
                                    <option>Small select</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-9 text-right">
                              <div class="custom-control custom-radio primary-radio custom-control-inline">
                                 <input type="radio" checked="" id="customRadio4" name="customRadio2" class="custom-control-input">
                                 <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio4">Show Active</label>
                              </div>
                              <div class="custom-control custom-radio primary-radio custom-control-inline">
                                 <input type="radio"  id="customRadio14" name="customRadio2" class="custom-control-input">
                                 <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio14">Show All</label>
                              </div>
                              <div class="custom-control custom-radio primary-radio custom-control-inline">
                                 <input type="radio"  id="customRadio41" name="customRadio2" class="custom-control-input">
                                 <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio41">Show Archived</label>
                              </div>
                           </div>
                        </div>
                        <div class="table-responsive">
                           <table id="dataTable" class="table text-center">
                              <thead class="bg-light text-capitalize">
                                 <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    
                                    <th>Company</th>
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
                                       <tr>
                                          <td>{{ $contact->primary_f_name }}</td>
                                          <td>{{ $contact->primary_l_name }}</td>
                                          <td>{{ $contact->company }}</td>
                                          <td>{{ $contact->address }}</td>
                                          <td>{{ $contact->primary_phone_1 }}</td>
                                          <td><span class="label label-primary">{{ date('Y/m/d',strtotime($contact->created_at)) }}</span></td>
                                          <td><span class="label label-primary">2021/06/16</span></td>
                                          <td>
                                             <select class="form-control statusFrom">
                                                <option>Select Status</option>
                                                <option>Preliminary</option>
                                                <option>Design Offered</option>
                                                <option>Design</option>
                                                <option>Estimating</option>
                                                <option>Pending</option>
                                                <option>Active Project</option>
                                                <option>Warranty</option>
                                             </select>
                                          </td>
                                          <td>
                                             <ul class="d-flex justify-content-center">
                                                <li class="mr-3"><a href="#" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="text-info"><i class="fa fa-eye"></i></a></li>
                                                <li class="mr-3"><a href="#" class="text-primary"><i class="fa fa-edit"></i></a></li>
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
  <!-- The Modal -->
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
                        <input type="checkbox" name="status" value="1">
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

@endsection 
@section('scripts_extra')
<script>
   $(document).ready(function () {
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
                  printErrorMsg(data.error);
               }
            },
         });
      });
   });
   function printErrorMsg (msg) {
      var count = 0;
      $.each( msg, function( key, value ) {
         if(count == 0){
            $('input[name='+key+']').focus();
         }
         $('.'+key+'_err').text(value);
         count++;
      });
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