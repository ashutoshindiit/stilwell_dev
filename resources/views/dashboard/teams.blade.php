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
                  <input type="text" id="team_search" name="search" placeholder="Search Team..." required="">
               </form>
            </div>
<!--             <button type="button" class="ml-3 btn btn-rounded btn-primary">Open Estimate</button> -->
            <a href="{{ Route('admin.teams.create') }}" class="ml-auto btn btn-rounded  btn-info">Create New Team</a>
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
                     <table id="dataTableTeam"  class="table">
                        <thead class="bg-light text-capitalize">
                           <tr>
                              <th>Sr. No.</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Date created</th>
                              <th>Status</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if($teams)
                              @foreach ($teams as $key=>$team)
                                 <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->email }}</td>
                                    <td>{{ $team->role->name }}</td>
                                    <td><span class="label label-primary">{{ $team->created_at->format('d M Y') }}</span></td>
                                    <td>
                                       @if($team->status == 0)
                                          <span class="badge badge-danger">Inactive</span>
                                       @elseif($team->status == 1)
                                       <span class="badge badge-success">Active</span>
                                       @endif   
                                    </td>
                                    <td>
                                       <ul class="d-flex justify-content-center">
                                          <li class="mr-3"><a href="{{ Route('admin.teams.edit',['team'=>$team->id]) }}" class="text-primary"><i class="fa fa-edit"></i></a></li>
                                          <form action="{{ Route('admin.teams.destroy',['team'=>$team->id]) }}" id="delete_team_{{$team->id}}" method="post">
                                             @csrf
                                             @method('DELETE')
                                          </form>
                                          <li><a href="#" onclick="archiveFunction('delete_team_{{$team->id}}')" class="text-danger"><i class="ti-trash"></i></a></li>
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
         var table = $('#dataTableTeam').DataTable();
   
         $(document).on('keyup','#team_search', function(e){
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