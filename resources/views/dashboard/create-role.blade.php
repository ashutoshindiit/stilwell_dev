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
               <form action="{{ Route('admin.role.store') }}" method="POST">
                  @csrf
                  <div class="card-body">
                     <div class="contactInfo">
                        <h2 class="mb-3">Add Role </h2>
                        <div class="contactInfoBox">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input class="form-control" name="name" type="text" placeholder="Name" value="{{ old('name') }}" autofocus>
                                 </div>
                                 @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <h2 class="mb-3">Add Permission</h2>
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
                                          @if(count($permissions) > 0)
                                             @php 
                                                $read = "r";
                                                $update = "u";
                                                $create = "c";
                                                $delete = "d";
                                             @endphp
                                             @foreach($permissions as $permission)
                                                @php 
                                                   $is_read = '';
                                                   $is_update = '';
                                                   $is_create = '';
                                                   $is_delete = '';
                                                   $old_permis = array();
                                                   $old_permis = old('permision.'.$permission->id);
                                                   if(@$old_permis['r'] == 1) $is_read="checked";
                                                   if(@$old_permis['u'] == 1) $is_update="checked";
                                                   if(@$old_permis['c'] == 1) $is_create="checked";
                                                   if(@$old_permis['d'] == 1) $is_delete="checked";
                                                @endphp
                                                <tr>
                                                   <th scope="row">{{ $permission->name }}</th>
                                                   <td>
                                                      <div class="custom-control custom-checkbox primary-checkbox">
                                                         <input type="hidden" class="custom-control-input"  name="permision[{{$permission->id}}][{{$read}}]"  value="0" >
                                                         <input type="checkbox" class="custom-control-input" id="{{$permission->slug}}-r" name="permision[{{$permission->id}}][{{$read}}]"  value="1" {{$is_read}}>
                                                         <label class="custom-control-label" for="{{$permission->slug}}-r"></label>
                                                   </div>
                                                   </td>
                                                   <td>
                                                      <div class="custom-control custom-checkbox primary-checkbox">
                                                         <input type="checkbox" class="custom-control-input" id="{{$permission->slug}}-u" name="permision[{{$permission->id}}][{{$update}}]" value="1" {{$is_update}}>
                                                         <label class="custom-control-label" for="{{$permission->slug}}-u"></label>
                                                   </div>
                                                   </td>
                                                   <td>
                                                      <div class="custom-control custom-checkbox primary-checkbox">
                                                         <input type="checkbox" class="custom-control-input" id="{{$permission->slug}}-c" name="permision[{{$permission->id}}][{{$create}}]" value="1" {{$is_create}}>
                                                         <label class="custom-control-label" for="{{$permission->slug}}-c"></label>
                                                   </div>
                                                   </td>
                                                   <td>
                                                      <div class="custom-control custom-checkbox primary-checkbox">
                                                         <input type="checkbox" class="custom-control-input" id="{{$permission->slug}}-d" name="permision[{{$permission->id}}][{{$delete}}]" value="1" {{ $is_delete }}>
                                                         <label class="custom-control-label" for="{{$permission->slug}}-d"></label>
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
                           <button type="submit" class="btn cbtn btn-rounded btn-primary">Save</button>
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