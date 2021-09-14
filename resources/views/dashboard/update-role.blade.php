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
            <a href="{{ Route('admin.roles') }}" class="ml-auto btn btn-rounded  btn-info">Back to Roles</a>
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
               <form action="{{ Route('admin.role.update', ['id' => $role->id]) }}" method="POST">
                  @csrf
                  {{ method_field('PUT') }}
                  <div class="card-body">
                     <div class="contactInfo">
                        <h2 class="mb-3">Edit Role </h2>
                        <div class="contactInfoBox">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input class="form-control" name="name" type="text" placeholder="Name" value="{{ $role->name }}" autofocus>
                                 </div>
                                 @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <h2 class="mb-3">Edit Permission</h2>
                                 <div class="table-responsive">
                                    <table class="table text-left">
                                       <thead class="text-uppercase">
                                       <tr>
                                          <th scope="col">Name</th>
                                          <th scope="col">Read</th>
                                          <th scope="col">Update</th>
                                          <th scope="col">Create</th>
                                          <th scope="col">Delete</th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                          @if(count($user_permissions) > 0)
                                             @php 
                                                $read = "r";
                                                $update = "u";
                                                $create = "c";
                                                $delete = "d";
                                             @endphp
                                             @foreach($user_permissions as $permission)
                                                @php 
                                                   $permission_id = $permission->permision->id;
                                                   $permission_slug = $permission->permision->slug;
                                                   $is_read = '';
                                                   $is_update = '';
                                                   $is_create = '';
                                                   $is_delete = '';
                                                   $old_permis = array();
                                                   $old_permis =  $permission;
                                                   if(@$old_permis->read == 1) $is_read="checked";
                                                   if(@$old_permis->update == 1) $is_update="checked";
                                                   if(@$old_permis->create == 1) $is_create="checked";
                                                   if(@$old_permis->delete == 1) $is_delete="checked";
                                                @endphp
                                                <tr>
                                                   <th scope="row">{{ $permission->permision->name }}</th>
                                                   <td>
                                                      <div class="custom-control custom-checkbox primary-checkbox">
                                                         <input type="hidden" class="custom-control-input"  name="permision[{{$permission_id}}][{{$read}}]"  value="0" >
                                                         <input type="checkbox" class="custom-control-input" id="{{$permission_slug}}-r" name="permision[{{$permission_id}}][{{$read}}]"  value="1" {{$is_read}}>
                                                         <label class="custom-control-label" for="{{$permission_slug}}-r"></label>
                                                   </div>
                                                   </td>
                                                   <td>
                                                      <div class="custom-control custom-checkbox primary-checkbox">
                                                         <input type="checkbox" class="custom-control-input" id="{{$permission_slug}}-u" name="permision[{{$permission_id}}][{{$update}}]" value="1" {{$is_update}}>
                                                         <label class="custom-control-label" for="{{$permission_slug}}-u"></label>
                                                   </div>
                                                   </td>
                                                   <td>
                                                      <div class="custom-control custom-checkbox primary-checkbox">
                                                         <input type="checkbox" class="custom-control-input" id="{{$permission_slug}}-c" name="permision[{{$permission_id}}][{{$create}}]" value="1" {{$is_create}}>
                                                         <label class="custom-control-label" for="{{$permission_slug}}-c"></label>
                                                   </div>
                                                   </td>
                                                   <td>
                                                      <div class="custom-control custom-checkbox primary-checkbox">
                                                         <input type="checkbox" class="custom-control-input" id="{{$permission_slug}}-d" name="permision[{{$permission_id}}][{{$delete}}]" value="1" {{ $is_delete }}>
                                                         <label class="custom-control-label" for="{{$permission_slug}}-d"></label>
                                                   </div>
                                                   </td>
                                                </tr>                                               
                                             @endforeach
                                          @endif
                                       </tbody>
                                    </table>
                              </div>
                              </div>
                           </div>
                           <button type="submit" class="btn cbtn btn-rounded btn-primary">Update</button>
                        </div>
                     </div>
                  </div>
               </form>
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