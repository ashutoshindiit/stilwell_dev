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
                  <input type="text" name="search" id="lead_search" placeholder="Search Leads..." required="">
               </form>
            </div>
            <a class="ml-3 btn btn-rounded btn-primary" data-toggle="modal" data-target="#leadModal">Create New Lead</a>
            <a class="ml-2 btn btn-rounded  btn-info">Open Lead</a>
            <a style="float: right;" class="ml-2 btn btn-rounded  btn-outline-primary">Create New Estimate</a>
         </div>
      </div>
   </div>
   <!--==================================*
      Main Section
      *====================================-->
   <div class="main-content-inner">
      <div class="row">
         <!-- data table -->
         <div class="col-md-12 grid-margin tabdash ">
            <!--ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item mr-2">
                  <a class="active show btn bg-white" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Leads</a>
               </li>
               <li class="nav-item">
                  <a class="btn bg-white" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lead Info</a>
               </li>
            </ul-->
            <!--  <div class="d-flex justify-content-between flex-wrap tabdash">
               <div class="d-flex">
                  <button class="btn bg-primary mr-3"> <i class="feather ft-phone"></i> Contacts</button>
                  <button class="btn bg-white "><i class="feather ft-user"></i> Contact Info</button>
               </div>
               </div> -->
         </div>
         <div class="col-12">
            <div class="card-body ptb0 pt-0">
               @php 
                  flashMessageGet();
               @endphp
               <div class="tab-content mt-3" id="myTabContent">
                  <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                     <div class="card">
                        <div class="card-body">
                           <div class="row align-items-center mb-3">
                              <div class="col-12">
                                 <div class="custom-control custom-radio primary-radio custom-control-inline">
                                    <input type="radio" checked value="" id="customRadio14" name="leadStatusChk" class="custom-control-input">
                                    <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio14">Show All</label>
                                 </div>
                                 <div class="custom-control custom-radio primary-radio custom-control-inline">
                                    <input type="radio" value="Active" id="customRadio4" name="leadStatusChk" class="custom-control-input">
                                    <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio4">Show Active</label>
                                 </div>
                                 <div class="custom-control custom-radio primary-radio custom-control-inline">
                                    <input type="radio" value="Inactive" id="customRadio41" name="leadStatusChk" class="custom-control-input">
                                    <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio41">Show Inactive</label>
                                 </div>
                              </div>
                           </div>
                           <div class="table-responsive">
                              <table id="dataTableLead"  class="table text-center">
                                 <thead class="bg-light text-capitalize">
                                    <tr>
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th>Project Name</th>
                                       <th>Project Address</th>
                                       <th>Lead Status</th>
                                       <th>Project Type</th>
                                       <th>Lead Source</th>
                                       <th>Date Created</th>
                                       <th>Date Revised</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @if(count($leads) > 0)
                                       @foreach ($leads as $lead)
                                          <tr data-leadId="{{ $lead->id }}">
                                             <td>{{ $lead->first_name }}</td>
                                             <td>{{ $lead->last_name }}</td>
                                             <td>{{ $lead->project_name }}</td>
                                             <td>{{ $lead->address }}</td>
                                             <td>{{ ($lead->active == 0) ? 'Inactive' : 'Active' }}</td>
                                             <td>{{ $lead->project_type }}</td>
                                             <td>{{ $lead->source }}</td>
                                             <td><span class="label label-primary">{{ date('Y/m/d',strtotime($lead->created_at)) }}</span></td>
                                             <td><span class="label label-primary">{{ date('Y/m/d',strtotime($lead->created_at)) }}</span></td>
                                             <td>
                                                <select class="form-control leadStatus">
                                                   @foreach ($leadStatus as $status)
                                                      <option value="{{ $status->id }}" @if($lead->status == $status->id) selected @endif>{{ $status->name }}</option>
                                                   @endforeach
                                                </select>
                                             </td>
                                             <td>
                                                <ul class="d-flex justify-content-center">
                                                   <li class="mr-3"><a href="#" class="text-info view_lead"><i class="fa fa-eye"></i></a></li>
                                                   <li class="mr-3"><a href="#" class="text-primary edit-lead"><i class="fa fa-edit"></i></a></li>
                                                   <form action="{{ Route('admin.leads.destroy',['lead'=>$lead->id]) }}" id="delete_lead_{{$lead->id}}" method="post">
                                                      @csrf
                                                      @method('DELETE')
                                                   </form>                                                      
                                                   <li><a href="#" onclick="archiveFunction('delete_lead_{{$lead->id}}')" class="text-danger"><i class="ti-trash"></i></a></li>
                                                </ul>
                                             </td>
                                          </tr>                                          
                                       @endforeach
                                    @endif
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
  <div class="modal contact-modal" id="leadModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header p-0">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="add_leads" action="" method="post"> 
               <div class="contactInfo">
                  <h2>Add Lead</h2>
                  <div class="switchBox">
                     <span class="ac">Active</span>
                     <label class="switch">
                        <input type="checkbox" name="active" value="1">
                        <span class="slider round"></span>
                     </label>
                  </div>
                  <hr />
                  <div class="contactInfoBox">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Project Name" name="project_name">
                              <span class="project_name_err alert text-danger error-form"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Project Type" name="project_type">
                              <span class="project_type_err alert text-danger error-form"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="First Name" name="first_name">
                              <span class="first_name_err alert text-danger error-form"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Last Name" name="last_name">
                              <span class="last_name_err alert text-danger error-form"></span>                          
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Lead Source" name="source">
                           </div>
                        </div>
                        
                        <div class="col-md-6">
                           <div class="form-group">
                              <div class="form-group">
                                 <select class="form-control" name="contact_id">
                                    <option value="">Select Contact</option>
                                    @if($contacts)
                                    @foreach($contacts as $contact)
                                       <option value="{{ $contact->id }}"> {{ $contact->full_name }}</option>
                                    @endforeach
                                    @endif
                                 </select>
                                 <span class="contact_id_err alert text-danger error-form"></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Project Address</label>
                              <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                              <label class="custom-control-label" for="customCheck1">Click if Different From Home Address</label>
                              </div>
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
                        <div class="col-md-12">
                           <div class="form-group">
                              <textarea class="form-control" rows="5" placeholder="Notes" name="notes"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <button type="button" class="btn cbtn btn-rounded btn-primary add-lead-btn">Save</button>
               </div>
            </form>
        </div>
      </div>
    </div>
  </div>     

   <div class="modal contact-modal" id="leadModalEdit">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-header p-0">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form id="update_leads" action="" method="post"> 
                  <div class="contactInfo">
                     <h2>Edit Lead</h2>
                     <div class="switchBox">
                        <span class="ac">Active</span>
                        <label class="switch">
                           <input type="hidden" name="active" value="0">
                           <input type="checkbox" name="active" value="1">
                           <span class="slider round"></span>
                        </label>
                     </div>
                     <hr />
                     <div class="contactInfoBox">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Project Name" name="project_name">
                                 <span class="project_name_err alert text-danger error-form"></span>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Project Type" name="project_type">
                                 <span class="project_type_err alert text-danger error-form"></span>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="First Name" name="first_name">
                                 <span class="first_name_err alert text-danger error-form"></span>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Last Name" name="last_name">
                                 <span class="last_name_err alert text-danger error-form"></span>                          
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Lead Source" name="source">
                              </div>
                           </div>
                           
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="form-group">
                                    <select class="form-control" name="contact_id">
                                       <option value="">Select Contact</option>
                                       @if($contacts)
                                       @foreach($contacts as $contact)
                                          <option value="{{ $contact->id }}"> {{ $contact->full_name }}</option>
                                       @endforeach
                                       @endif
                                    </select>
                                    <span class="contact_id_err alert text-danger error-form"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Project Address</label>
                                 <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                 <label class="custom-control-label" for="customCheck1">Click if Different From Home Address</label>
                                 </div>
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
                           <div class="col-md-12">
                              <div class="form-group">
                                 <textarea class="form-control" rows="5" placeholder="Notes" name="notes"></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <button type="button" class="btn cbtn btn-rounded btn-primary update-lead-btn">Update</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>  
   <!-- View Lead The Modal -->
   <div class="modal contact-modal" id="viewLead">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-header p-0">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body viewBox1">
               <form id="view_lead" action="" method="post">
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

      var table = $('#dataTableLead').DataTable();

      $(document).on('keyup','#lead_search', function(e){
         table.search(this.value).draw();
      });

      $('input:radio[name="leadStatusChk"]').change(function(){

         var searchTerm = this.value.toLowerCase()
         if (!searchTerm) {
            table.draw();   
            return;
         }
         table.search(this.value, true, false, true ).draw();
         $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            if (data[4].toLowerCase() == searchTerm) return true
            return false
         })
         table.draw();   
         $.fn.dataTable.ext.search.pop()
      });  

      $(document).on('click','.view_lead', function(e){
         e.preventDefault();
         var lear_id = $(this).parents('tr').attr('data-leadId');
         var $this = $(this);
         if(lear_id){
            var url = "{{ route('admin.leads.show', ['lead'=>':id']) }}";
            url = url.replace(':id', lear_id);
            $.ajax({
               url: url,
               type:"GET",
               success:function(data){
                  openViewLead(data);                      
               },
            });            
         }
      });

      $(document).on('click','.edit-lead', function(e){
         e.preventDefault();
         var lear_id = $(this).parents('tr').attr('data-leadId');
         var $this = $(this);
         if(lear_id){
            var url = "{{ route('admin.leads.show', ['lead'=>':id']) }}";
            url = url.replace(':id', lear_id);
            $.ajax({
               url: url,
               type:"GET",
               success:function(data){
                  openEditLead(data);                  
               },
            });            
         }
      });

      $(document).on('change','.leadStatus', function(){
         var lead_id = $(this).parents('tr').attr('data-leadId');
         var status_id = $(this).val();
         var $this = $(this);
         if(status_id && lead_id){
            $.ajax({
               url: "{{ Route('admin.lead.status.update') }}",
               type:"PUT",
               data: {
                  'lead_id' : lead_id,
                  'status_id' : status_id
               },
               success:function(data){
                  $this.parents('tr').css('background','rgba(173, 216, 230, 0.4)');
                  setTimeout(function(){ $this.parents('tr').css('background',''); $this.blur();  }, 1000 );
                  
               },
            });            
         }
      });

      $(document).on('click','.add-lead-btn', function(){
         $('.error-form').empty();
         $.ajax({
            url: "{{ Route('admin.leads.store') }}",
            type:"POST",
            data: $('#add_leads').serialize(),
            success:function(data){
               console.log(data);
               if ($.isEmptyObject(data.error)) {
                  location.reload();
               } else {
                  printErrorMsg('#add_leads', data.error);
               }
            },
         });
      });

      $(document).on('click','.update-lead-btn', function(){
         $('.error-form').empty();
         console.log('hi');
         var lead_id =  $('#update_leads .update-lead-btn').attr('lead-id');
         var url = "{{ route('admin.leads.update', ['lead'=>':id']) }}";
         url = url.replace(':id', lead_id);
         $.ajax({
            url: url,
            type:"PUT",
            data: $('#update_leads').serialize(),
            success:function(data){
               if ($.isEmptyObject(data.error)) {
                  location.reload();
               } else {
                  printErrorMsg('#update_leads',data.error);
               }
            },
         });
      });

   });

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

   function openEditLead(data)
   {
      if(data.active == 1){
         $('#update_leads input[name=active]').prop('checked',true);
      }else{
         $('#update_leads input[name=active]').prop('checked',false);
      }
      $('#update_leads input[name=project_name]').val(data.project_name);
      $('#update_leads input[name=project_type]').val(data.project_type);
      $('#update_leads input[name=first_name]').val(data.first_name);
      $('#update_leads input[name=last_name]').val(data.last_name);
      $('#update_leads input[name=source]').val(data.source);
      $('#update_leads select[name=contact_id]').val(data.contact_id);
      $('#update_leads input[name=address]').val(data.address);
      $('#update_leads input[name=city]').val(data.city);
      $('#update_leads input[name=state]').val(data.state);
      $('#update_leads input[name=zipcode]').val(data.zipcode);
      $('#update_leads textarea[name=notes]').val(data.notes);
      $('#update_leads .update-lead-btn').attr('lead-id',data.id);
      $('#leadModalEdit').modal('show');
   }   

   function openViewLead(data)
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
      $('#viewLead').modal('show');
   }


</script>
@endsection