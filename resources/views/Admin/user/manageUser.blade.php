 @extends('Admin.master')
 @section('title')
 Manage User
 @endsection
 @section('Contain')
 <hr/>
  <h3 class="  text-danger">Total Users: {{$users->total()}}</h3> 
   <h3 class="  text-danger"> {{$users->count()}} in this page</h3> 
 <hr/>
 <table class="table table-bordered table-hover table-striped">
     <thead>
     <th width="5%">ID</th>
     <th width="15%">Name</th>
     <th width="40%">Address</th>
     <th width="20%">Email</th>
     <th width="25%">Action</th>
     </thead>
     <tbody>
         @foreach($users as $user )
         <tr>
             <td>{{ $user->id}}</td>
              <td>{{ $user->name}}</td>
               <td>{{ $user->address}}</td>
                <td>{{ $user->email}}</td>
                 <td>
                     <a href="" class="btn btn-success" title="Edit User">
                         <span class="glyphicon glyphicon-edit"></span>
                     </a>
                     <a href="" class="btn btn-danger" title="Delete User">
                         <span class="glyphicon glyphicon-trash"></span>
                     </a>
                 </td>
         </tr>
         @endforeach
     </tbody>
 </table>
 {{$users->links()}}
 @endsection
 
 
 
 
 
