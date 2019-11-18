  @extends('Admin.master')
 @section('title')
 Manage User
 @endsection
 @section('Contain')
 <hr/>
  <h3 class="  text-danger">Total Users: {{$customers->total()}}</h3> 
   <h3 class="  text-danger"> {{$customers->count()}} in this page</h3> 
 <hr/>
 <table class="table table-bordered table-hover table-striped">
     <thead>
     <th width="5%">ID</th>
     <th width="15%">Name</th>
     <th width="20%">Email</th>
     <th width="40%">Message</th>
     <th width="25%">Action</th>
 </thead>
 <tbody>
     @foreach($customers as $customer )
     <tr>
         <td>{{ $customer->id}}</td>
         <td>{{ $customer->name}}</td>
         <td>{{ $customer->email}}</td>
         <td>{{ $customer->message}}</td>
         <td>
             <a href="" class="btn btn-danger" title="Delete User">
                 <span class="glyphicon glyphicon-trash"></span>
             </a>
         </td>
     </tr>
         @endforeach
     </tbody>
 </table>
 {{$customers->links()}}
 @endsection
 
 
 
 
 
