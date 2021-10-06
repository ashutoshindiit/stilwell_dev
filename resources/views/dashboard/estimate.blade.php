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
                  <input type="text" id="estimate_search" name="search" placeholder="Search Estimates..." required="">
               </form>
            </div>
            <button type="button" class="ml-3 btn btn-rounded btn-primary">Open Estimate</button>
            @if(Auth::user()->permission('estimates','create') == 1)
            <a href="javascript:void(0)" class="ml-2 btn btn-rounded  btn-info" data-toggle="modal" data-target="#estimateModal">Create New Estimate</a>
            @endif
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
            @php 
            flashMessageGet();
            @endphp
            <div class="card card mt-3">
               <div class="card-body">
                  <div class="row align-items-center">
                     <div class="col-12 text-left mb-3">
                        <div class="custom-control custom-radio primary-radio custom-control-inline">
                           <input type="radio" value="" id="customRadio14" name="estimateStatusChk" class="custom-control-input" checked>
                           <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio14">Show All</label>
                        </div>
                        <div class="custom-control custom-radio primary-radio custom-control-inline">
                           <input type="radio" value="Active" id="customRadio4" name="estimateStatusChk" class="custom-control-input">
                           <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio4">Show Active</label>
                        </div>
                        <div class="custom-control custom-radio primary-radio custom-control-inline">
                           <input type="radio" value="Inactive" id="customRadio41" name="estimateStatusChk" class="custom-control-input">
                           <label style="font-weight: 400;font-size: 14px;" class="custom-control-label" for="customRadio41">Show Inactive</label>
                        </div>
                     </div>
                  </div>
                  <div class="table-responsive">
                     <table id="dataTableEstimate"  class="table text-center">
                        <thead class="bg-light text-capitalize">
                           <tr>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Porject Name</th>
                              <th>Porject Address</th>
                              <th>Lead Status</th>
                              <th>Project Type</th>
                              <th>Date Created</th>
                              <th>Date Revised</th>
                              <th>Status</th>
                              <th>Action</th>
                              <th>ID</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(count($estimates) > 0)
                              @foreach ($estimates as $estimate)                           
                                 <tr  data-estimateId="{{ $estimate->id }}"">
                                    <td>{{ $estimate->first_name }}</td>
                                    <td>{{ $estimate->last_name }}</td>
                                    <td>{{ $estimate->project_name }}</td>
                                    <td>{{ $estimate->address }}</td>
                                    <td>{{ ($estimate->active == 0) ? 'Inactive' : 'Active' }}</td>
                                    <td>{{ $estimate->project_type }}</td>
                                    <td><span class="label label-primary">{{ date('Y/m/d',strtotime($estimate->created_at)) }}</span></td>
                                    <td><span class="label label-primary">{{ date('Y/m/d',strtotime($estimate->updated_at)) }}</span></td>
                                    <td>
                                       <select class="form-control estimateStatus">
                                          @foreach ($leadStatus as $status)
                                             <option value="{{ $status->id }}" @if($estimate->status == $status->id) selected @endif>{{ $status->name }}</option>
                                          @endforeach
                                       </select>
                                    </td>
                                    <td>
                                       <ul class="d-flex justify-content-center">
                                          <li class="mr-3"><a href="#" class="text-info view_estimate"><i class="fa fa-eye"></i></a></li>
                                          @if(Auth::user()->permission('estimates','update') == 1)
                                          <li class="mr-3"><a href="#" class="text-primary edit-estimate"><i class="fa fa-edit"></i></a></li>
                                          @endif
                                          @if(Auth::user()->permission('estimates','delete') == 1)
                                          <form action="{{ Route('admin.estimates.destroy',['estimate'=>$estimate->id]) }}" id="delete_estimate_{{$estimate->id}}" method="post">
                                             @csrf
                                             @method('DELETE')
                                          </form>                                                      
                                          <li><a href="#" onclick="archiveFunction('delete_estimate_{{$estimate->id}}')" class="text-danger"><i class="ti-trash"></i></a></li>
                                          @endif
                                       </ul>
                                    </td>
                                    <td>{{ $estimate->id }}</td>
                                 </tr>
                              @endforeach
                           @endif
                        </tbody>
                     </table>
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
   <div class="modal contact-modal" id="estimateModal">
      <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header p-0">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="add_estimate" action="" method="post"> 
               <div class="contactInfo">
                  <h2>Add Estimate</h2>
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
                              <input class="form-control" type="text" placeholder="Customer First Name" name="first_name">
                              <span class="first_name_err alert text-danger error-form"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Customer Last Name" name="last_name">
                              <span class="last_name_err alert text-danger error-form"></span>           
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Estimate Source" name="source">
                           </div>
                        </div>
                        <div class="col-md-6">                         
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
                        <div class="col-md-12">
                           <div class="form-group mb-0">
                              <label>Markups</label>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Material" name="markups['material']">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Labor" name="markups['labor']">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Sub" name="markups['sub']">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Equipment" name="markups['equipment']">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Other" name="markups['other']">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Tax" name="markups['tax']">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Overhead" name="markups['overhead']">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Profit" name="markups['profit']">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <button type="button" class="btn cbtn btn-rounded btn-primary add-estimate-btn">Save</button>
               </div>	
            </form>	
         </div>
      </div>
    </div>
   </div>   

  <!-- The Edit Estimate -->
  <div class="modal contact-modal" id="estimateModalEdit">
   <div class="modal-dialog modal-dialog-centered modal-lg">
   <div class="modal-content">
     <div class="modal-header p-0">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
     <div class="modal-body">
         <form id="update_estimate" action="" method="post"> 
            <div class="contactInfo">
               <h2>Edit Estimate</h2>
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
                           <input class="form-control" type="text" placeholder="Customer First Name" name="first_name">
                           <span class="first_name_err alert text-danger error-form"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Customer Last Name" name="last_name">
                           <span class="last_name_err alert text-danger error-form"></span>           
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Estimate Source" name="source">
                        </div>
                     </div>
                     <div class="col-md-6">                         
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
                     <div class="col-md-12">
                        <div class="form-group mb-0">
                           <label>Markups</label>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Material" id="markups-material" name="markups['material']">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Labor" id="markups-labor" name="markups['labor']">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Sub" id="markups-sub" name="markups['sub']">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Equipment" id="markups-equipment" name="markups['equipment']">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Other" id="markups-other" name="markups['other']">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Tax" id="markups-tax" name="markups['tax']">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Overhead" id="markups-overhead" name="markups['overhead']">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Profit" id="markups-profit" name="markups['profit']">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <button type="button" class="btn cbtn btn-rounded btn-primary update-estimate-btn">Update</button>
            </div>	
         </form>	
      </div>
   </div>
 </div>
</div>   
   <!-- View Lead The Modal -->
   <div class="modal contact-modal" id="viewEstimate">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-header p-0">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body viewBox1">
               <form id="view_lead" action="" method="post">
                  <div class="contactInfo">
                     <h2 class="d-flex justify-content-between align-items-center">View Estimate <span class="v_status"><i class="fa fa-check" aria-hidden="true"></i> Active</span></h2>
                     <hr />
                     <div class="contactInfoBox mb-2">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Project Name</label>
                                 <h4 class="v_project_name">Charles</h4>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Project Type</label>
                                 <h4 class="v_project_type">Charles</h4>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>First Name</label>
                                 <h4 class="v_f_name">Charles</h4>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Last Name</label>
                                 <h4 class="v_l_name">Johnson</h4>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Estimate Source</label>
                                 <h4 class="v_estimate_source">123456789</h4>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                     <div class="contactInfoBox">
                        <h3>Project Address</h3>
                        <div class="row">
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
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Notes</label>
                                 <h4 class="v_notes">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     <div class="contactInfoBox">
                        <h3>Markups</h3>
                        <div class="row">
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>Material</label>
                                 <h4 class="v_material"></h4>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>Labor</label>
                                 <h4 class="v_labor"></h4>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>Sub</label>
                                 <h4 class="v_sub"></h4>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>Equipment</label>
                                 <h4 class="v_equipment"></h4>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>Other</label>
                                 <h4 class="v_other"></h4>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>Tax</label>
                                 <h4 class="v_tax"></h4>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>Overhead</label>
                                 <h4 class="v_overhead"></h4>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>Profit</label>
                                 <h4 class="v_profit"></h4>
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
      
      var table = $('#dataTableEstimate').DataTable({
         "order": [[ 10, "desc" ]],
        "columnDefs": [
            {
               'targets': [8,9], 
               'orderable': false, 
            },
            {
               "targets": [ 10 ],
               "visible": false,
            },
        ]
      });
      
      $(document).on('keyup','#estimate_search', function(e){
         var serVal = $(this).val().toLowerCase()
         var searchTerm = $('input[name=estimateStatusChk]:checked').val().toLowerCase()
         if(!searchTerm){
            table.search(serVal).draw();   
            return;
         }
         table.search(this.value, true, false, true ).draw();
         $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            if(serVal){
               if (data[4].toLowerCase() == searchTerm && (data[0].toLowerCase().search(serVal) != -1 || data[1].toLowerCase().search(serVal) != -1 || data[2].toLowerCase().search(serVal) != -1)) return true
            }else{
               if (data[4].toLowerCase() == searchTerm) return true
            }
            return false
         })
         table.draw();   
         $.fn.dataTable.ext.search.pop()         
      });

      $('input:radio[name="estimateStatusChk"]').change(function(){
         var serVal = $('#estimate_search').val().toLowerCase()
         var searchTerm = this.value.toLowerCase()
         if (!searchTerm) {
            table.search(serVal).draw();   
            return;
         }
         table.search(this.value, true, false, true ).draw();
         $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            if(serVal){
               if (data[4].toLowerCase() == searchTerm && (data[0].toLowerCase().search(serVal) != -1 || data[1].toLowerCase().search(serVal) != -1 || data[2].toLowerCase().search(serVal) != -1)) return true
            }else{
               if (data[4].toLowerCase() == searchTerm) return true
            }
            return false
         })
         table.draw();   
         $.fn.dataTable.ext.search.pop()
      });   

      $('#estimateModal, #estimateModalEdit').on('hidden.bs.modal', function (e) {
         $('.error-form').empty();
      })      

      $(document).on('click','.view_estimate', function(e){
         e.preventDefault();
         var estimate_id = $(this).parents('tr').attr('data-estimateId');
         var $this = $(this);
         if(estimate_id){
            var url = "{{ route('admin.estimates.show', ['estimate'=>':id']) }}";
            url = url.replace(':id', estimate_id);
            $.ajax({
               url: url,
               type:"GET",
               success:function(data){
                  openViewEstimate(data);                      
               },
            });            
         }
      });

      $(document).on('click','.edit-estimate', function(e){
         e.preventDefault();
         var lear_id = $(this).parents('tr').attr('data-estimateId');
         var $this = $(this);
         if(lear_id){
            var url = "{{ route('admin.estimates.show', ['estimate'=>':id']) }}";
            url = url.replace(':id', lear_id);
            $.ajax({
               url: url,
               type:"GET",
               success:function(data){
                  openEditEstimate(data);                  
               },
            });            
         }
      });

      $(document).on('change','.estimateStatus', function(){
         var estimate_id = $(this).parents('tr').attr('data-estimateId');
         var status_id = $(this).val();
         var $this = $(this);
         if(status_id && estimate_id){
            $.ajax({
               url: "{{ Route('admin.estimate.status.update') }}",
               type:"PUT",
               data: {
                  'estimate_id' : estimate_id,
                  'status_id' : status_id
               },
               success:function(data){
                  $this.parents('tr').css('background','rgba(173, 216, 230, 0.4)');
                  setTimeout(function(){ $this.parents('tr').css('background',''); $this.blur();  }, 1000 );
                  
               },
            });            
         }
      });

      $(document).on('click','.add-estimate-btn', function(){
         $('.error-form').empty();
         $.ajax({
            url: "{{ Route('admin.estimates.store') }}",
            type:"POST",
            data: $('#add_estimate').serialize(),
            success:function(data){
               console.log(data);
               if ($.isEmptyObject(data.error)) {
                  location.reload();
               } else {
                  printErrorMsg('#add_estimate', data.error);
               }
            },
         });
      });

      $(document).on('click','.update-estimate-btn', function(){
         $('.error-form').empty();
         var estimate_id =  $('#update_estimate .update-estimate-btn').attr('estimate-id');
         var url = "{{ route('admin.estimates.update', ['estimate'=>':id']) }}";
         url = url.replace(':id', estimate_id);
         $.ajax({
            url: url,
            type:"PUT",
            data: $('#update_estimate').serialize(),
            success:function(data){
               if ($.isEmptyObject(data.error)) {
                  location.reload();
               } else {
                  printErrorMsg('#update_estimate',data.error);
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

   function openEditEstimate(data)
   {
      console.log(data.markups);
      if(data.active == 1){
         $('#update_estimate input[name=active]').prop('checked',true);
      }else{
         $('#update_estimate input[name=active]').prop('checked',false);
      }
      $('#update_estimate input[name=project_name]').val(data.project_name);
      $('#update_estimate input[name=project_type]').val(data.project_type);
      $('#update_estimate input[name=first_name]').val(data.first_name);
      $('#update_estimate input[name=last_name]').val(data.last_name);
      $('#update_estimate input[name=source]').val(data.source);
      $('#update_estimate input[name=address]').val(data.address);
      $('#update_estimate input[name=city]').val(data.city);
      $('#update_estimate input[name=state]').val(data.state);
      $('#update_estimate input[name=zipcode]').val(data.zipcode);
      $('#update_estimate textarea[name=notes]').val(data.notes);
      $('#update_estimate .update-estimate-btn').attr('estimate-id',data.id);

      $.each(data.markups, function (key, val) {
         var inp_id = "#update_estimate #markups-"+key.replace(/["']/g, "");
         $(inp_id).val(val);
      });

      $('#estimateModalEdit').modal('show');
   }   

   function openViewEstimate(data)
   {
      console.log(data);
      if(data.active == 1){
         $('#viewEstimate .v_status').html('<i class="fa fa-check" aria-hidden="true"></i> Active');
      }else{
         $('#viewEstimate .v_status').html('<i class="fa fa-close" aria-hidden="true"></i> Inactive');
      }
      $('#viewEstimate .v_project_name').html(data.project_name);
      $('#viewEstimate .v_project_type').html(data.project_type);
      $('#viewEstimate .v_f_name').html(data.first_name);
      $('#viewEstimate .v_l_name').html(data.last_name);
      $('#viewEstimate .v_estimate_source').html(data.source);
      $('#viewEstimate .v_address').html(data.address);
      $('#viewEstimate .v_city').html(data.city);
      $('#viewEstimate .v_state').html(data.state);
      $('#viewEstimate .v_zipcode').html(data.zipcode);
      $('#viewEstimate .v_company').html(data.company);
      $('#viewEstimate .v_title').html(data.title);
      $('#viewEstimate .v_notes').html(data.notes);
      $.each(data.markups, function (key, val) {
         var inp_id = "#viewEstimate .v_"+key.replace(/["']/g, "");
         $(inp_id).text(val);
      });
      $('#viewEstimate').modal('show');
   }

</script>
@endsection