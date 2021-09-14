<!--=========================*
   Side Bar Menu
   *===========================-->
<div class="sidebar_menu">
   <div class="menu-inner">
      <div id="sidebar-menu">
         <!--=========================*
            Main Menu
            *===========================-->
         <ul class="metismenu" id="sidebar_menu">
            <li class="menu-title">Navigation</li>
            <li class="">
               <a href="{{ Route('admin.dashboard') }}">
               <i class="feather ft-home"></i>
               <span>Dashboard</span>
               </a>
            </li>
            <li>
               <a href="{{ Route('admin.contacts.index') }}">
               <i class="feather ft-phone"></i>
               <span>Contacts</span>
               </a>
            </li>
            <li>
               <a href="leads.php">
               <i class="feather ft-bar-chart"></i>
               <span>Leads</span>
               </a>
            </li>
            <li>
               <a href="estimate.php">
               <i class="feather ft-calendar"></i>
               <span>Estimate</span>
               </a>
            </li>
            <li>
               <a href="#">
               <i class="feather ft-file-text"></i>
               <span>Project</span>
               </a>
            </li>
           
            <li>
               <a href="#">
               <i class="feather ft-pie-chart"></i>
               <span>Reports</span>
               </a>
            </li>
            <li>
               <a href="#">
               <i class="feather ft-shopping-cart"></i>
               <span>Product</span>
               </a>
            </li>
            @if(Auth::user()->role->name == "Admin")
             <li>
               <a href="{{ Route('admin.roles') }}">
               <i class="feather ft-lock"></i>
               <span>Roles</span>
               </a>
            </li>
            <li>
               <a href="{{ Route('admin.teams.index') }}">
               <i class="feather ft-users"></i>
               <span>Team</span>
               </a>
            </li>
            @endif
            <li class="menu-title d-none">Apps</li>
            <li class=" d-none">
               <a href="full-calendar.html">
               <i class="feather ft-calendar"></i>
               <span>Calendar</span>
               </a>
            </li>
            <!--=========================*
               Gallery
               *===========================-->
            <li class=" d-none">
               <a href="gallery.html">
               <i class="feather ft-image"></i>
               <span>Gallery</span>
               </a>
            </li>
            <!--=========================*
               Email
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-mail"></i>
               <span>Email</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li><a href="inbox.html"><i class="ion-ios-folder-outline"></i><span>Inbox</span></a></li>
                  <li><a href="compose.html"><i class="ti-pencil-alt"></i><span>Compose Email</span></a></li>
                  <li><a href="read-mail.html"><i class="ti-bookmark-alt"></i><span>Read Email</span></a></li>
               </ul>
            </li>
            <li class="d-none menu-title">Components</li>
            <!--=========================*
               UI Features
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-gitlab"></i>
               <span>UI Features</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li><a href="alert.html"><i class="ti-alert"></i><span>Alert</span></a></li>
                  <li><a href="accordion.html"><i class="ti-layout-accordion-separated"></i><span>Accordion</span></a></li>
                  <li><a href="buttons.html"><i class="icon-focus"></i><span>Buttons</span></a></li>
                  <li><a href="badges.html"><i class="icon-ribbon"></i><span>Badges</span></a></li>
                  <li><a href="cards.html"><i class="ti-id-badge"></i><span>Cards</span></a></li>
                  <li><a href="carousel.html"><i class="ti-layout-slider"></i><span>Carousels</span></a></li>
                  <li><a href="dropdown.html"><i class="icon-layers"></i><span>Dropdown</span></a></li>
                  <li><a href="list-group.html"><i class="ti-list"></i><span>List Group</span></a></li>
                  <li><a href="modals.html"><i class="ti-layers-alt"></i><span>Modals</span></a></li>
                  <li><a href="pagination.html"><i class="ion-android-more-horizontal"></i><span>Pagination</span></a></li>
                  <li><a href="popover.html"><i class="ion-ios-photos"></i><span>Popover</span></a></li>
                  <li><a href="progressbar.html"><i class="ion-ios-settings-strong"></i><span>Progressbar</span></a></li>
                  <li><a href="tabs.html"><i class="ti-layout-tab"></i><span>Tabs</span></a></li>
                  <li><a href="typography.html"><i class="ti-smallcap"></i><span>Typography</span></a></li>
                  <li><a href="grid.html"><i class="ti-layout-grid4"></i><span>Grid</span></a></li>
               </ul>
            </li>
            <!--=========================*
               Advance Kit
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-briefcase"></i>
               <span>Advance Kit</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li><a href="toastr.html"><i class="ti-layout-cta-left"></i> <span>Toastr</span></a></li>
                  <li><a href="sweet-alert.html"><i class="ti-layout-media-overlay-alt-2"></i> <span>Sweet Alert</span></a></li>
                  <li><a href="cropper.html"><i class="ion-crop"></i> <span>Image Cropper</span></a></li>
                  <li><a href="loaders.html"><i class="ion-load-a"></i> <span>Css Loaders</span></a></li>
                  <li><a href="app-tour.html"><i class="ti-flag-alt"></i> <span>App Tour</span></a></li>
                  <li><a href="ladda-button.html"><i class="ion-load-b"></i> <span>Ladda Button</span></a></li>
                  <li><a href="dropzone.html"><i class="ti-layout-placeholder"></i> <span>Dropzone</span></a></li>
               </ul>
            </li>
            <!--=========================*
               Icons
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-award"></i>
               <span>Icons</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li><a href="font-awesome.html"><i class="ti-flag-alt"></i> <span>Font Awesome</span></a></li>
                  <li><a href="themify.html"><i class="ti-themify-favicon"></i><span>Themify</span></a></li>
                  <li><a href="ionicons.html"><i class="ion-ionic"></i><span>Ionicons V2</span></a></li>
                  <li><a href="et-line.html"><i class="icon-basket"></i><span>ET Line Icons</span></a></li>
               </ul>
            </li>
            <!--=========================*
               Maps
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-map-pin"></i>
               <span>Maps</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li><a href="google-maps.html"><i class="icon-map"></i><span>Google Maps</span></a></li>
                  <li><a href="am-maps.html"><i class="icon-map-pin"></i><span>AM Chart Maps</span></a></li>
               </ul>
            </li>
            <!--=========================*
               Tables
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-credit-card"></i>
               <span>Tables</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li><a href="basic-table.html"><i class="ion-ios-grid-view"></i><span>Basic Tables</span></a></li>
                  <li><a href="datatable.html"><i class="ti-layout-slider-alt"></i><span>Datatable</span></a></li>
                  <li><a href="js-grid.html"><i class="ti-view-list-alt"></i><span>Js Grid Table</span></a></li>
               </ul>
            </li>
            <!--=========================*
               Forms
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-clipboard"></i>
               <span>Forms</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li><a href="form-basic.html"><i class="ion-edit"></i><span>Basic ELements</span></a></li>
                  <li><a href="form-layouts.html"><i class="ti-layout-grid2-thumb"></i><span>Form Layouts</span></a></li>
                  <li><a href="form-groups.html"><i class="ion-ios-paper"></i><span>Input Groups</span></a></li>
                  <li><a href="form-validation.html"><i class="ion-android-cancel"></i><span>Form Validation</span></a></li>
               </ul>
            </li>
            <!--=========================*
               Editors
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-edit"></i>
               <span>Editors</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li><a href="text-editor.html"><i class="ti-uppercase"></i><span>Text Editor</span></a></li>
                  <li><a href="code-editor.html"><i class="ion-code"></i><span>Code Editor</span></a></li>
               </ul>
            </li>
            <li class="d-none menu-title">Charts</li>
            <!--=========================*
               Charts
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-pie-chart"></i>
               <span>Charts</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li><a href="chart-js.html"><i class="feather ft-bar-chart"></i><span>Chart Js</span></a></li>
                  <li><a href="morris-charts.html"><i class="feather ft-bar-chart-2"></i><span>Morris Chart Js</span></a></li>
                  <li><a href="c3-chart.html"><i class="feather ft-bar-chart-line"></i><span>C3 Chart Js</span></a></li>
                  <li><a href="chartist.html"><i class="feather ft-bar-chart-line-"></i><span>Chartist Js</span></a></li>
               </ul>
            </li>
            <li class="d-none menu-title">Pages</li>
            <!--=========================*
               Session
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-users"></i>
               <span>Session</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li>
                     <a href="login.html">
                     <i class="feather ft-log-in"></i>
                     <span>Login</span>
                     </a>
                  </li>
                  <li><a href="register.html"><i class="ion-person-add"></i><span>Register</span></a></li>
                  <li><a href="lock.html"><i class="ti-lock"></i><span>Lock Screen</span></a></li>
                  <li>
                     <a href="reset-password.html">
                     <i class="feather ft-lock"></i>
                     <span>Reset Password</span>
                     </a>
                  </li>
                  <li><a href="forgot-password.html"><i class="ti-bookmark-alt"></i><span>Forgot Password</span></a></li>
               </ul>
            </li>
            <!--=========================*
               Error Pages
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-anchor"></i>
               <span>Error Pages</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li><a href="404.html"><i class="ti-unlink"></i><span>404</span></a></li>
                  <li><a href="500.html"><i class="ti-close"></i><span>500</span></a></li>
                  <li><a href="505.html"><i class="ti-na"></i><span>505</span></a></li>
               </ul>
            </li>
            <!--=========================*
               Other Pages
               *===========================-->
            <li class=" d-none">
               <a href="javascript:void(0)" aria-expanded="true">
               <i class="feather ft-file-plus"></i>
               <span>Other Pages</span>
               <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
               </a>
               <ul class="submenu">
                  <li>
                     <a href="blank.html">
                     <i class="feather ft-file"></i>
                     <span>Blank Page</span>
                     </a>
                  </li>
                  <li>
                     <a href="invoice.html">
                     <i class="feather ft-paperclip"></i>
                     <span>Invoice</span>
                     </a>
                  </li>
                  <li>
                     <a href="pricing.html">
                     <i class="feather ft-dollar-sign"></i>
                     <span>Pricing</span>
                     </a>
                  </li>
                  <li>
                     <a href="profile.html"><i class="feather ft-user-check"></i><span>Profile</span></a>
                  </li>
                  <li><a href="timeline.html"><i class="feather ft-clock"></i><span>Timeline</span></a></li>
               </ul>
            </li>
         </ul>
         <!--=========================*
            End Main Menu
            *===========================-->
      </div>
      <div class="clearfix"></div>
   </div>
</div>
<!--=========================*
   End Side Bar Menu
   *===========================-->