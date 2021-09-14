@extends('layouts.app')

@section('content')
@include('includes/sidebar')
<!--==================================*
   Main Content Section
   *====================================-->
<div class="main-content page-content conBox">

   <!--==================================*
      Main Section
      *====================================-->
   <div class="main-content-inner mt-5 mb-3">
      <div class="row">
         <!-- data table -->
         <div class="col-12">
            <div class="card mt-3">
               <div class="card-body">
                  <div class="contactInfo">
                     <h2 class="mb-3">Profile</h2>
                     <div class="contactInfoBox">
                        <div class="row">
                           <div class="col-md-4">
                              <div class=" profile_user mb-2">
                                 <div class="card">
                                    <div class="text-center card-body">
                                       <div class="user-image">
                                          <img class="rounded-circle admin-img-thumbnail" src="{{ $user->thumbnail($user->avatar) }}">
                                          <label for="admin-avatar">Upload Image</label>
                                          <input id="admin-avatar" name="user-img" style="display:none" type="file">
                                          <br>
                                          <div class="admin-img-progress hidden">
                                              <div class="progress-bar" 
                                                   role="progressbar" aria-valuemin="0"
                                                   aria-valuemax="100">
                                              </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class=" profile_user">
                                 <div class="card">
                                    <div class="text-center card-body">
                                       <div class="user-image ">
                                          <img class="rounded-circle img-thumbnail" src="{{ asset('assets/images/bus.jpg') }}">
                                          <label for="user-img">Upload Logo</label>
                                          <input id="upload-logo" name="user-img" style="display:none" type="file">
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class=" profile_user">
                                 <div class="card">
                                    <div class="text-center card-body">
                                       <div class="user-image ">
                                          <img class="rounded-circle img-thumbnail" src="{{ asset('assets/images/bus.jpg') }}">
                                          <label for="user-img">Upload Favicon</label>
                                          <input id="favicon" name="user-img" style="display:none" type="file">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-8 profile_form">
                              <form action="{{ Route('admin.profile.update') }}" method="post">
                                 <h4 class="mt-0 mb-3">Basic Info</h4>
                                 @if(session()->has('profileSuccess'))
                                    <div class="alert alert-success">
                                       {{ session()->get('profileSuccess') }}
                                    </div>
                                 @endif
                                 <div class="row grp_form">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="frm_label">Name</label>
                                          <div class="input-group"><input class="form-control" placeholder="" name="name" value="{{ old('name',$user->name) }}"></div>
                                       </div>
                                       @error('name')
                                          <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                          </div>
                                       @enderror                                       
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="frm_label">Email Address</label>
                                          <div class="input-group"><input class="form-control" placeholder=""  name="email" value="{{ old('email',$user->email) }}"></div>
                                       </div>
                                       @error('email')
                                          <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                          </div>
                                       @enderror                                         
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="mt-3 frm_label">Company Name</label>
                                          <div class="input-group"><input class="form-control" placeholder=""  name="company" value="{{ $user->company }}"></div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="mt-3  frm_label">Phone No.</label>
                                          <div class="input-group"><input class="form-control" placeholder=""  name="phone" value="{{ $user->phone }}"></div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="mt-3 frm_label">Address</label>
                                          <div class="input-group"><input class="form-control" placeholder=""  name="address" value="{{ $user->address }}"></div>
                                       </div>
                                    </div>
                                    <div class="mt-1 col-md-12">
                                       <button type="submit" name="profile_update" class="btn cbtn btn-rounded btn-primary mt-3">Update Profile</button>
                                    </div>
                                 </div>
                              </form>
                              <form action="{{ Route('admin.profile.update') }}" method="post">
                                 @csrf
                                 @method('PUT')
                                 <h4 class="mt-4 mb-2">Change Password </h4>
                                 @if(session()->has('passwordsuccess'))
                                    <div class="alert alert-success">
                                       {{ session()->get('passwordsuccess') }}
                                    </div>
                                 @endif    
                            
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="mt-3 frm_label">Old Password</label>
                                          <div class="input-group"><input class="form-control" placeholder="" type="password" name="old_password" value="{{ old('old_password')}}"></div>
                                       </div>
                                       @error('old_password')
                                          <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                          </div>
                                       @enderror   
                                       @if(session()->has('old_passworderr'))
                                       <div class="alert alert-danger">
                                          {{ session()->get('old_passworderr') }}
                                       </div>
                                    @endif                                     
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="mt-3 frm_label">New Password</label>
                                          <div class="input-group"><input class="form-control" placeholder="" type="password" name="new_password" value="{{ old('new_password')}}"></div>
                                       </div>
                                       @error('new_password')
                                          <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                          </div>
                                       @enderror                                        
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="mt-3 frm_label">Confirm Password</label>
                                          <div class="input-group"><input class="form-control" placeholder="" type="password" name="password_confirmation" value=""></div>
                                       </div>
                                       @error('password_confirmation')
                                          <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                          </div>
                                       @enderror    
                                    </div>
                                    <div class="mt-1 col-md-12">
                                       <button type="submit" name="password_update" class="btn cbtn btn-rounded btn-primary mt-3">Update Password</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     
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
@endsection 