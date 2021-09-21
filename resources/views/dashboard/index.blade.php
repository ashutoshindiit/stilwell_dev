@extends('layouts.app')

@section('content')
@include('includes/sidebar')
<!--==================================*
   Main Content Section
   *====================================-->
<div class="main-content page-content">
   <!--==================================*
      Main Section
      *====================================-->
   <div class="main-content-inner" style="background: #f6f8fd;border-radius: 8px;    margin-top: 50px;">
      <div class="row mb-4">
         <div class="col-md-12 grid-margin p-0">
            <div class="d-flex justify-content-between flex-wrap tabdash">
               <!--div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                  <h5 class="mr-4 mb-0 font-weight-bold">Dashboard</h5>
                  <div class="d-flex align-items-baseline dashboard-breadcrumb">
                      <p class="text-muted mb-0 mr-1 hover-cursor">App</p>
                      <i class="mdi mdi-chevron-right mr-1 text-muted"></i>
                      <p class="text-muted mb-0 mr-1 hover-cursor">Dashboard</p>
                      <i class="mdi mdi-chevron-right mr-1 text-muted"></i>
                      <p class="text-muted mb-0 hover-cursor">Analytics</p>
                  </div>
                  </div-->
               <div class="d-flex">
                  <!--div class="btn-group mr-3">
                     <button type="button" class="btn btn-primary">02 Aug 2021</button>
                     <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="sr-only">Toggle Dropdown</span>
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                         <a class="dropdown-item" href="#">Sept 2021</a>
                         <a class="dropdown-item" href="#">Oct 2021</a>
                         <a class="dropdown-item" href="#">Nov 2021</a>
                     </div>
                     </div-->
                  <button class="btn bg-primary mr-3"> <i class="feather ft-bar-chart"></i> Lead Status</button>
                  <button class="btn bg-white "><i class="feather ft-file-text"></i> Project Status</button>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-3 col-md-6 col-lg-12 stretched_card" style="    margin-bottom: 30px;">
            <div class="card mb-mob-4 icon_card primary_card_bg">
               <!-- Card body -->
               <div class="card-body"  style="padding-top: 38px;">
                  <p class="card-title mb-0 text-white">Preliminary</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                     <h3 class="mb-0 text-white">{{ $contactstatus['Preliminary']['contacts_count'] }}</h3>
                     <div class="arrow_icon"><img src="{{ asset('assets/images/icon1.png') }}" alt="" width="30" /></div>
                  </div>
                  <!--p class="mb-0 text-white">1.92% <span class="text-white ml-1"><small>(Since last month)</small></span></p-->
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 col-lg-12 stretched_card" style="    margin-bottom: 30px;">
            <div class="card mb-mob-4 icon_card success_card_bg">
               <!-- Card body -->
               <div class="card-body" style="padding-top: 38px;">
                  <p class="card-title mb-0 text-white">Design Offered</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                     <h3 class="mb-0 text-white">{{ $contactstatus['Design Offered']['contacts_count'] }}</h3>
                     <div class="arrow_icon"><img src="{{ asset('assets/images/icon2.png') }}" alt="" width="30" /></div>
                  </div>
                  <!--p class="mb-0 text-white">1.92% <span class="text-white ml-1"><small>(Since last month)</small></span></p-->
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 col-lg-12 stretched_card" style="    margin-bottom: 30px;">
            <div class="card mb-mob-4 icon_card warning_card_bg">
               <!-- Card body -->
               <div class="card-body"  style="padding-top: 38px;">
                  <p class="card-title mb-0 text-white">Design</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                     <h3 class="mb-0 text-white">{{ $contactstatus['Design']['contacts_count'] }}</h3>
                     <div class="arrow_icon"><img src="{{ asset('assets/images/icon3.png') }}" alt="" width="30" /></div>
                  </div>
                  <!--p class="mb-0 text-white">1.27% <span class="text-white ml-1"><small>(Since last month)</small></span></p-->
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 col-lg-12 stretched_card" style="    margin-bottom: 30px;">
            <div class="card mb-mob-4 icon_card lightblue_card_bg">
               <!-- Card body -->
               <div class="card-body"  style="padding-top: 38px;">
                  <p class="card-title mb-0 text-white">Estimating</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                     <h3 class="mb-0 text-white">{{ $contactstatus['Estimating']['contacts_count'] }}</h3>
                     <div class="arrow_icon"><img src="{{ asset('assets/images/icon4.png') }}" alt="" width="30" /></div>
                  </div>
                  <!--p class="mb-0 text-white">9.12% <span class="text-white ml-1"><small>(Since last day)</small></span></p-->
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
            <div class="card mb-mob-4 icon_card red_card_bg">
               <!-- Card body -->
               <div class="card-body" style="padding-top: 38px;">
                  <p class="card-title mb-0 text-white">Pending</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                     <h3 class="mb-0 text-white">{{ $contactstatus['Pending']['contacts_count'] }}</h3>
                     <div class="arrow_icon"><img src="{{ asset('assets/images/icon5.png') }}" alt="" width="30" /></div>
                  </div>
                  <!--p class="mb-0 text-white">1.92% <span class="text-white ml-1"><small>(Since last month)</small></span></p-->
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
            <div class="card mb-mob-4 icon_card blue_card_bg">
               <!-- Card body -->
               <div class="card-body"  style="padding-top: 38px;">
                  <p class="card-title mb-0 text-white">Active Project</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                     <h3 class="mb-0 text-white">{{ $contactstatus['Active Project']['contacts_count'] }}</h3>
                     <div class="arrow_icon"><img src="{{ asset('assets/images/icon6.png') }}" alt="" width="30" /></div>
                  </div>
                  <!--p class="mb-0 text-white">1.27% <span class="text-white ml-1"><small>(Since last month)</small></span></p-->
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
            <div class="card mb-mob-4 icon_card green_card_bg">
               <!-- Card body -->
               <div class="card-body"  style="padding-top: 38px;">
                  <p class="card-title mb-0 text-white">Warranty</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                     <h3 class="mb-0 text-white">{{ $contactstatus['Warranty']['contacts_count'] }}</h3>
                     <div class="arrow_icon"><img src="{{ asset('assets/images/icon7.png') }}" alt="" width="30" /></div>
                  </div>
                  <!--p class="mb-0 text-white">9.12% <span class="text-white ml-1"><small>(Since last day)</small></span></p-->
               </div>
            </div>
         </div>
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
   
@endsection 