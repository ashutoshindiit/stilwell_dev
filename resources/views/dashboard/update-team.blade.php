@extends('layouts.app')

@section('content')
@include('includes/sidebar')
<!--==================================*
   Main Content Section
   *====================================-->
<div class="main-content page-content conBox">
   <div class="topheader">
      <div class="card">
         <div class="card-body d-flex align-items-center">
            <a href="team.php" class="ml-auto btn btn-rounded  btn-info">Back to Team</a>
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
            <div class="card mt-3">
               <div class="card-body">
                  <form action="{{ Route('admin.teams.update', ['team'=> $user->id ]) }}" method="post">
                     @csrf
                     @method('PUT')
                     <div class="contactInfo">
                        <h2 class="mb-3">Edit Team</h2>
                        @if(session()->has('successMessage'))
                           <div class="alert alert-success">
                              {{ session()->get('successMessage') }}
                           </div>
                        @endif                    
                        <div class="contactInfoBox">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Name" value="{{ old( 'name', $user->name) }}" name="name">
                                 </div>
                                 @error('name')
                                    <div class="alert alert-danger" role="alert">
                                          {{ $message }}
                                    </div>
                                 @enderror                                   
                              </div>                   
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email" value="{{ old( 'email', $user->email) }}" name="email">
                                 </div>
                                 @error('email')
                                    <div class="alert alert-danger" role="alert">
                                          {{ $message }}
                                    </div>
                                 @enderror  
                              </div>           
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <select class="form-control" name="role">
                                       <option>Select Team Role</option>
                                       @if($roles)
                                       @foreach($roles as $role)
                                          <option @if($user->role_id == $role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                       @endforeach
                                    @endif 
                                    </select>
                                 </div>
                                 @error('role')
                                    <div class="alert alert-danger" role="alert">
                                          {{ $message }}
                                    </div>
                                 @enderror                                 
                              </div>
                        
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <select class="form-control" name="status">
                                       <option>Select Status</option>
                                       <option value="1" @if($user->status == "1") selected @endif>Active</option>
                                       <option value="0" @if($user->status == "0") selected @endif>Inactive</option>
                                    </select>
                                 </div>
                                 @error('status')
                                    <div class="alert alert-danger" role="alert">
                                          {{ $message }}
                                    </div>
                                 @enderror                                  
                              </div>
                           </div>
                        </div>
                        <button type="submit" name="update_profile" class="btn cbtn btn-rounded btn-primary">Update Profile</button>
                     </div>
                  </form>                  
               </div>
            </div>
         </div>

         <div class="col-12">
            <div class="card mt-3">
               <div class="card-body">
                  <form action="{{ Route('admin.teams.update', ['team'=> $user->id ]) }}" method="post">
                     @csrf
                     @method('PUT')
                     <div class="contactInfo">
                        <h2 class="mb-3">Edit Password</h2>
                        @if(session()->has('successMessagePass'))
                           <div class="alert alert-success">
                              {{ session()->get('successMessagePass') }}
                           </div>
                        @endif                    
                        <div class="contactInfoBox">
                           <div class="row"> 
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                 </div>
                                 @error('password')
                                    <div class="alert alert-danger" role="alert">
                                          {{ $message }}
                                    </div>
                                 @enderror                                 
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
                                 </div>
                                 @error('password_confirmation')
                                    <div class="alert alert-danger" role="alert">
                                          {{ $message }}
                                    </div>
                                 @enderror                                   
                              </div>
                           </div>
                        </div>
                        <button type="submit" name="update_password" class="btn cbtn btn-rounded btn-primary">Update Password</button>
                     </div>
                  </form>                  
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