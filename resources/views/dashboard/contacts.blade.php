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
      <div class="row mb-3">
         <!-- data table -->
         <div class="col-md-12 grid-margin tabdash ">
            <!--ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item mr-2">
                  <a class="active show btn bg-white" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Contacts</a>
               </li>
               <li class="nav-item">
                  <a class="btn bg-white" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Contact Info</a>
               </li>
            </ul-->
            <!--  <div class="d-flex justify-content-between flex-wrap tabdash">
               <div class="d-flex">
                  <button class="btn bg-primary mr-3"> <i class="feather ft-phone"></i> Contacts</button>
                  <button class="btn bg-white "><i class="feather ft-user"></i> Contact Info</button>
               </div>
               </div> -->
         </div>

      </div>
      <div class="row">
         <!-- data table -->
         <div class="col-12">
            <div class="card">
               <div class="card-body ">
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row align-items-center">
                           <div class="col-3">
                              <div class="form-group">
                                 <select class="form-control statusFrom">
                                    <option>Contact Type</option>
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
                                 <tr>
                                    <td>James</td>
                                    <td>Andrew</td>
                                    <td>Company One</td>
                                    <td>Newyork</td>
                                    <td>9874654120</td>
                                    <td><span class="label label-primary">2021/06/21</span></td>
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
                                           <li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                                       </ul>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>Philip</td>
                                    <td>Jones</td>
                                    <td>Company Two</td>
                                    <td>Washington DC</td>
                                    <td>9874654120</td>
                                    <td><span class="label label-primary">2021/06/18</span></td>
                                    <td><span class="label label-primary">2021/06/11</span></td>
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
                                           <li class="mr-3"><a href="#" class="text-info"><i class="fa fa-eye"></i></a></li>
                                           <li class="mr-3"><a href="#" class="text-primary"><i class="fa fa-edit"></i></a></li>
                                           <li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                                       </ul>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>Charles</td>
                                    <td>Johnson</td>
                                    <td>Company Three</td>
                                    <td>California</td>
                                    <td>9874654120</td>
                                    <td><span class="label label-primary">2021/06/15</span></td>
                                    <td><span class="label label-primary">2021/06/10</span></td>
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
                                           <li class="mr-3"><a href="#" class="text-info"><i class="fa fa-eye"></i></a></li>
                                           <li class="mr-3"><a href="#" class="text-primary"><i class="fa fa-edit"></i></a></li>
                                           <li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                                       </ul>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>Smith</td>
                                    <td>John</td>
                                    <td>Company Four</td>
                                    <td>Vancouver</td>
                                    <td>9874654120</td>
                                    <td><span class="label label-primary">2021/06/12</span></td>
                                    <td><span class="label label-primary">2021/06/06</span></td>
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
                                           <li class="mr-3"><a href="#" class="text-info"><i class="fa fa-eye"></i></a></li>
                                           <li class="mr-3"><a href="#" class="text-primary"><i class="fa fa-edit"></i></a></li>
                                           <li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                                       </ul>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>Johnson</td>
                                    <td>Monica</td>
                                    <td>Company Five</td>
                                    <td>British Columbia</td>
                                    <td>9874654120</td>
                                    <td><span class="label label-primary">2021/06/12</span></td>
                                    <td><span class="label label-primary">2021/06/10</span></td>
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
                                           <li class="mr-3"><a href="#" class="text-info"><i class="fa fa-eye"></i></a></li>
                                           <li class="mr-3"><a href="#" class="text-primary"><i class="fa fa-edit"></i></a></li>
                                           <li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                                       </ul>
                                   </td>
                                 </tr>
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
      <!-- Widget Bottom -->
      <!--div class="row accordContainer">
         <div class="col-lg-6 stretched_card mt-4">
            <div class="card pd0">
               <div class="card-body pd0">
                 <div class="accordion accordion-style-2 accBox">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#accordion-1">Events For 21st July</a>
                        </div>
                        <div id="accordion-1" class="collapse" data-parent="#accordion1">
                            <div class="card-body">
                              <ul class="bullet-line-list">
                                 <li>
                                    <p class="text-muted mb-2">24 Jan 2021</p>
                                    <p class="mb-2">User Logged in Successfully</p>
                                 </li>
                                 <li>
                                    <p class="text-muted mb-2">25 Mar 2021</p>
                                    <p class="mb-2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                                 </li>
                                 <li>
                                    <p class="text-muted mb-2">26 June 2021</p>
                                    <p class="mb-2">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit</p>
                                 </li>
                                 <li>
                                    <p class="text-muted mb-2">27 July 2021</p>
                                    <p class="mb-0">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                 </li>
                                 <li>
                                    <p class="text-muted mb-2">21 July 2021</p>
                                    <p class="mb-0">Ut enim ad minima veniam, quis nostrum exercitationem ullam</p>
                                 </li>
                              </ul>
                            </div>
                        </div>
                    </div>
                 </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 stretched_card mt-4">
            <div class="card pd0">
               <div class="card-body pd0">
                 <div class="accordion accordion-style-2 accBox">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#accordion-4">Calendar</a>
                        </div>
                        <div id="accordion-4" class="collapse" data-parent="#accordion4">
                            <div class="card-body">
                              <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                 </div>
               </div>
            </div>
            
         </div>
      </div-->

      <!--div class="row accordContainer">
         <div class="col-lg-6 col-md-12 stretched_card mt-4">
            <div class="card pd0">
               <div class="card-body pd0">
                 <div class="accordion accordion-style-2 accBox">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#accordion-2">TO DO LIST</a>
                        </div>
                        <div id="accordion-2" class="collapse" data-parent="#accordion2">
                           <div class="card-body">
                              <div class="todo_container">
                                 <div class="todo_content mr-4">
                                    <ul class="d-flex flex-column-reverse todo-list" id="todo_list">
                                       <li><label><input type="checkbox"><i></i><span>The secrets to success in every stilwell project are clear</span><a href="#" class="ti-trash"></a></label></li>
                                       <li><label><input type="checkbox"><i></i><span>Complete home remodeling project successfully.</span><a href="#" class="ti-trash"></a></label></li>
                                       <li><label><input type="checkbox"><i></i><span>We are the designer and the builder, working directly with you.</span><a href="#" class="ti-trash"></a></label></li>
                                       <li><label><input type="checkbox"><i></i><span>Best In Designing & Remodeling</span><a href="#" class="ti-trash"></a></label></li>
                                       <li><label><input type="checkbox"><i></i><span>Complete  design Offers given by customers</span><a href="#" class="ti-trash"></a></label></li>
                                       <li><label><input type="checkbox"><i></i><span>We are company with more and more ongoign projects</span><a href="#" class="ti-trash"></a></label></li>
                                    </ul>
                                 </div>
                                 <div class="list_text">
                                    <input type="text" class="todo_add_item form-control" placeholder="Write new item and hit 'Enter'...">
                                    <button type="button" class="btn btn-primary submit_list_btn"><i class="fa fa-plus mr-0"></i></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                    </div>
                 </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 stretched_card mt-4">
            <div class="card pd0">
               <div class="card-body pd0">
                 <div class="accordion accordion-style-2 accBox">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#accordion-3">Send Email</a>
                        </div>
                        <div id="accordion-3" class="collapse" data-parent="#accordion3">
                           <div class="card-body">
                             <div class="sendBox">
                                 <div class="form-group">
                                    <input class="form-control" type="text" placeholder="To">
                                 </div>
                                 <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Subject">
                                 </div>
                                 <div class="form-group">
                                    <textarea class="form-control" rows="7" placeholder="Message"></textarea>
                                 </div>
                                 <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                 </div>
                                 <button type="button" class="btn cbtn btn-rounded btn-primary">Send</button>
                              </div>
                            </div>
                        </div>
                    </div>
                 </div>
               </div>
            </div>
         </div>
      </div-->
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
            <div class="contactInfo">
               <h2>Add Contact</h2>
               <div class="switchBox">
                  <span class="ac">Active</span>
                  <label class="switch">
                     <input type="checkbox">
                     <span class="slider round"></span>
                  </label>
               </div>
               <hr />
               <div class="form-group w-25">
                  <select class="form-control statusFrom">
                     <option>Client</option>
                     <option>Subcontractor</option>
                     <option>Personal</option>
                  </select>
               </div>

               <div class="contactInfoBox mb-2">
                  <h3>Primary Information</h3>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="First Name">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Last Name">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Phone 1">
                        </div>
                     </div>
                      <div class="col-md-6">
                        <div class="form-group">
                           <select class="form-control statusFrom">
                              <option>Select Status</option>
                              <option>xyz</option>
                              <option>xyz 1</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Phone 2">
                        </div>
                     </div>
                    
                     <div class="col-md-6">
                        <div class="form-group">
                           <select class="form-control statusFrom">
                              <option>Select Drop List 2</option>
                              <option>xyz</option>
                              <option>xyz 1</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Email">
                        </div>
                     </div>
                     
                  </div>
               </div>
               <div class="contactInfoBox">
                  <h3>Secondary Information</h3>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Relationship">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="First Name">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Last Name">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Phone 1">
                        </div>
                     </div>
                      <div class="col-md-6">
                        <div class="form-group">
                           <select class="form-control statusFrom">
                              <option>Select Status</option>
                              <option>xyz</option>
                              <option>xyz 1</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Phone 2">
                        </div>
                     </div>
                    
                     <div class="col-md-6">
                        <div class="form-group">
                           <select class="form-control statusFrom">
                              <option>Select Drop List 2</option>
                              <option>xyz</option>
                              <option>xyz 1</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Email">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Address">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="City">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="State">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Zip Code">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Company">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Title">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <textarea class="form-control" rows="5" placeholder="Notes"></textarea>
                        </div>
                     </div>
                     <!-- <div class="col-md-4">
                        <div class="form-group">
                           <label>Send Email</label>
                           <select class="form-control statusFrom">
                              <option>Send Email</option>
                              <option>xyz</option>
                              <option>xyz 1</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>To Do List Item</label>
                           <select class="form-control statusFrom">
                              <option>Add To Do Item</option>
                              <option>xyz</option>
                              <option>xyz 1</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Schedule Event</label>
                           <select class="form-control statusFrom">
                              <option>Schedule Event</option>
                              <option>xyz</option>
                              <option>xyz 1</option>
                           </select>
                        </div>
                     </div> -->
                  </div>
               </div>

               <button type="button" class="btn cbtn btn-rounded btn-primary" data-dismiss="modal">Save</button>
            </div>
        </div>
       
        
      </div>
    </div>
  </div>   
@endsection 