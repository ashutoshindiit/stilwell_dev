<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="_token" content="{{ csrf_token() }}">
      <title>Stilwell</title>
      <!--   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}"> -->
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
      <link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet"/>
      <link href="{{ asset('assets/css/et-line.css') }}" rel="stylesheet"/>
      <link href="{{ asset('assets/css/feather.css') }}" rel="stylesheet"/>
      <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet"/>
      <link href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet"/>
      <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
      <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet"/>
      <link href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet"/>
      <link rel="stylesheet" href="{{ asset('assets/vendors/am-charts/css/am-charts.css') }}" media="all" />
      <link rel="stylesheet" href="{{ asset('assets/vendors/charts/morris-bundle/morris.css') }}">
      <link href="{{ asset('assets/vendors/j-vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" />
      <link rel="stylesheet" href="{{ asset('assets/vendors/data-table/css/jquery.dataTables.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendors/data-table/css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendors/data-table/css/responsive.bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendors/data-table/css/responsive.jqueryui.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendors/fullcalendar/dist/fullcalendar.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/css/dropzone.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/css/sweetalert2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/css/toastr.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui-timepicker.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendors/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
      <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
      </script>
   </head>
   <body>
        <div class="preloader">
         <div class="main-loader">
            <span class="loader1"></span>
            <span class="loader2"></span>
            <span class="loader3"></span>
         </div>
        </div>

      <!--=========================*
         Page Container
         *===========================-->
      <div id="page-container">
      <!--==================================*
         Header Section
         *====================================-->
      <div class="header-area">
         <!--======================*
            Logo
            *=========================-->
         <div class="header-area-left">
            <a href="{{ Route('admin.dashboard') }}" class="logo">
               <!--  <span>
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </span>
                <i>
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </i> -->
                <h2 class="logoH2">Abc</h2>
            </a>
         </div>
         <!--======================*
            End Logo
            *=========================-->
         <div class="row align-items-center header_right">
            <!--==================================*
               Navigation and Search
               *====================================-->
            <div class="col-md-6 d_none_sm d-flex align-items-center">
               <div class="nav-btn button-menu-mobile pull-left">
                  <button class="open-left waves-effect">
                  <i class="ion-android-menu"></i>
                  </button>
               </div>
               <!-- <div class="search-box pull-left">
                  <form action="#">
                     <i class="ti-search"></i>
                     <input type="text" name="search" placeholder="Search..." required="">
                  </form>
               </div> -->
            </div>
            <!--==================================*
               End Navigation and Search
               *====================================-->
            <!--==================================*
               Notification Section
               *====================================-->
               <div class="col-md-6 col-sm-12">
                <ul class="notification-area pull-right">
                    <li class="mobile_menu_btn">
                      <span class="nav-btn pull-left d_none_lg">
                      <button class="open-left waves-effect">
                      <i class="ion-android-menu"></i>
                      </button>
                      </span>
                    </li>
                      @if(Auth::check())
                     <li class="user-dropdown">
                      <div class="dropdown dropDown">
                         <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ Auth::user()->thumbnail(Auth::user()->avatar) }}" alt="" class="img-fluid">
                            <div class="username">
                               <h2>{{ Auth::user()->name }}</h2>
                               <p>{{ Auth::user()->email }}</p>
                            </div>
                         </button>
                         <div class="dropdown-menu dropdown_user" aria-labelledby="dropdownMenuButton" >
                            <div class="dropdown-header d-flex flex-column align-items-center">
                               <div class="user_img mb-3">
                                  <img src="{{ Auth::user()->thumbnail(Auth::user()->avatar) }}" alt="User Image">
                               </div>
                               <div class="user_bio text-center">
                                  <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                                  <p class="email text-muted mb-3"><a class="pl-3 pr-3">{{ Auth::user()->email }}</a></p>
                               </div>
                            </div>
                            <a class="dropdown-item" href="{{ Route('admin.profile') }}"><i class="ti-user"></i> Profile</a>
                            <span role="separator" class="divider"></span>
                            <a class="dropdown-item" href="{{ Route('logout') }}"><i class="ti-power-off"></i>Logout</a>
                         </div>
                      </div>
                     </li>
                     @endif
                </ul>
             </div>
            <!--==================================*
               End Notification Section
               *====================================-->
         </div>
      </div>
      <!--==================================*
         End Header Section
         *====================================-->

        @yield('content')

        <div class="togglesec">
            <div class="toggle mailbtn"><i class="feather ft-clock"></i></div>
            <div class="toggle1 mailbtn"><i class="feather ft-calendar"></i></div>
            <div class="toggle2 mailbtn"><i class="feather ft-list"></i></div>
            <div class="toggle3 mailbtn"><i class="feather ft-mail"></i></div>
            </div>
          <div class="dash-sidebar dashtogle">
            <div class="toggle closebtn"><i class="feather ft-x"></i></div>  
            <div class="eventsec">
                <ul class="bullet-line-list render-ajax-googleEvent">
                    <div class="loader">Loading...</div>
                </ul>
            </div>
          </div>
          <div class="dash-sidebar dashtogle1">
            <div class="toggle1 closebtn"><i class="feather ft-x"></i></div>  
            <div class="eventsec">
                <div class="loader-inner line-scale-pulse-out" id="wait">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div id="calendar"></div>
            </div>
          </div>
          <div class="dash-sidebar dashtogle2">
            <div class="toggle2 closebtn"><i class="feather ft-x"></i></div>  
            <div class="eventsec">
                <div class="todo_container">
                   <div class="todo_content mr-4">
                      <ul class="d-flex flex-column-reverse todo-list" id="todo_list">
                        @php
                            $todos = DB::table('todo_lists')->where('user_id',Auth::id())->orderBy('id')->get();
                        @endphp
                        @foreach($todos as $todo)
                         <li><label><input class="todo_check" type="checkbox" value="{{ $todo->id }}" @if($todo->is_checked == 1) checked @endif><i></i><span>{{ $todo->note }}</span><a href="#" data-id="{{ $todo->id }}" class="ti-trash"></a></label></li>
                        @endforeach
                       </ul>
                   </div>
                   <div class="list_text">
                      <input type="text" class="todo_add_item form-control" placeholder="Write new item and hit 'Enter'...">
                      <button type="button" data-url="" class="btn btn-primary submit_list_btn"><i class="fa fa-plus mr-0"></i></button>
                   </div>
                </div>
            </div>
        </div> 
        <div class="dash-sidebar dashtogle3">
            <div class="toggle3 closebtn"><i class="feather ft-x"></i></div>  
            <div class="eventsec">
                <form id="adminmail-send" action="" method="post">
                    <div class="sendBox">
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="To" name="emailTo" id="email-sendTo">
                            <span class="email-error error-emailTo alert text-danger">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Subject" name="emailSubject" id="email-subject">
                            <span class="email-error error-emailSubject alert text-danger">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Message" name="emailText" id="email-text"></textarea>
                            <span class="email-error error-emailText alert text-danger">
                        </div>
                        <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="emailFile" id="emailiFile01">
                            <label class="custom-file-label" for="emailiFile01">Choose file</label>
                            <span class="email-error error-emailiFile01">
                        </div>
                        </div>
                        <button type="submit"  data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Sending Email" class="btn cbtn btn-rounded admin-send-email btn-primary">Send</button>
                        <br/><span class="email-error alert text-success email-res"></span>
                    </div>
                </form>
            </div>
        </div> 
        <!--=================================*
           Footer Section
           *===================================-->
        <footer>
           <div class="footer-area">
              <p>&copy; Copyright 2021. All right reserved. Abc.</p>
           </div>
        </footer>
        <!---------- Event Create -------------->
        <div class="modal fade" id="add-event-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Event</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <form name="save-event" method="post">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" id="add_event_title" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Event start</label>
                                <input type="text" id="add_event_start" class="form-control col-xs-3 event-datepicker-d1" />
                            </div>
                            <div class="form-group">
                                <label>Event end</label>
                                <input type="text" id="add_event_end" class="form-control col-xs-3 event-datepicker-d2" />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="save-event" class="btn btn-primary">Add</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->        

        <!---------- Event Update ----------->
        <div class="modal fade" id="update-event-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Event</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <form name="save-event" method="post">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="hidden" id="update_event_id" value="" class="form-control" />
                                <input type="text" id="update_event_title" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Event start</label>
                                <input type="text" id="update_event_start" class="form-control col-xs-3 event-datepicker-d1" />
                            </div>
                            <div class="form-group">
                                <label>Event end</label>
                                <input type="text" id="update_event_end" class="form-control col-xs-3 event-datepicker-d2" />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="update-event" class="btn btn-primary">Update</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->     

        <!--=================================*
           End Footer Section
           *===================================-->
        </div>
        

        <!--=========================*
           End Page Container
           *===========================-->
        <!-- Jquery Js -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/charts/charts-bundle/Chart.bundle.js') }}"></script>
        <script src="{{ asset('assets/vendors/data-table/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/data-table/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/data-table/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/js/init/data-table.js') }}"></script>
        <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui-timepicker.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/moment/moment.js') }}"></script>
        <script src="{{ asset('assets/vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('assets/js/init/full-calendar.js') }}"></script>
        <script src="{{ asset('assets/js/home.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/vendors/dropzone/js/dropzone.js') }}"></script>
        <script src="{{ asset('assets/vendors/sweetalert2/js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/toastr/js/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/js/init/dropzone.js') }}"></script>
        
        <script>
          setTimeout(function() {
          $('.preloader').addClass('loaded');
          $('body').removeClass('no-scroll-y');
        
          if ($('.preloader').hasClass('loaded')) {
             $('.preloader').delay(100).queue(function() {
              $(this).remove();
             });
          }
          },100);
        </script>
        <script>
        $(document).ready(function(){

            $('.toggle').click(function(){
                $('.dashtogle').toggleClass('active')
                $('.toggle').toggleClass('active')
            })

            $('.toggle1').click(function(){
                $('.dashtogle1').toggleClass('active')
                $('.toggle1').toggleClass('active')
            })

            $('.toggle2').click(function(){
                $('.dashtogle2').toggleClass('active')
                $('.toggle2').toggleClass('active')
            })

            $('.toggle3').click(function(){
                $('.dashtogle3').toggleClass('active')
                $('.toggle3').toggleClass('active')
            })
        })
        
        </script>

        @yield('scripts_extra')
    </body>
</html>
        