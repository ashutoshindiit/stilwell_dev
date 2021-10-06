@extends('layouts.app')

@section('content')
@include('includes/sidebar')
<!--==================================*
   Main Content Section
   *====================================-->
<div class="main-content page-content conBox">
   <div class="topheader">
      <div class="card">
         <div class="card-body d-flex w-100 align-items-center">
            <div class="search-box">
               <form action="#" >
                  <i style="" class="ti-search"></i>
                  <input type="text" id="role_search" name="search" placeholder="Search Roles..." required="">
               </form>
            </div>
<!--             <button type="button" class="ml-3 btn btn-rounded btn-primary">Open Estimate</button> -->
            <a href="{{ Route('admin.role.create') }}" class="ml-auto btn btn-rounded  btn-info">Create New Role</a>
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
                  @if ($message = Session::get('success'))
                     <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ $message }}
                     </div>
                  @endif
                  <div class="table-responsive">
                     <table id="dataTableRole"  class="table">
                        <thead class="bg-light text-capitalize">
                           <tr>
                              <th>Sr. No.</th>
                              <th>Role name</th>
                              <th>Users</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(count($roles) > 0)
                              @foreach($roles as $key=>$role)
                                 <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->users_count }}</td>
                                    <td>
                                       <ul class="d-flex justify-content-center">
                                          <li class="mr-3"><a href="{{ Route('admin.role.edit', ['id'=>$role->id]) }}" class="text-primary"><i class="fa fa-edit"></i></a></li>
                                          <form id="role_delete_{{$role->id}}" method="post" action="{{ Route('admin.role.destroy',['id' => $role->id]) }}">
                                             @csrf
                                             {{ method_field('DELETE') }}
                                          </form>
                                          <li><a href="#" onclick="archiveFunction('role_delete_{{$role->id}}')" class="text-danger"><i class="ti-trash"></i></a></li>
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
@section('scripts_extra')
   <script>
      $(document).ready(function () {
   
         var table = $('#dataTableRole').DataTable({
            "columnDefs": [
               {
                  'targets': [3],  
                  'orderable': false, 
               },
            ]
         });
   
         $(document).on('keyup','#role_search', function(e){
            table.search(this.value).draw();
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
   </script>
@endsection 