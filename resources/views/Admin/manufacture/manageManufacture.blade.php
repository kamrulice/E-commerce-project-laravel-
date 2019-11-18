 @extends('Admin.master')
 @section('title')
 Manage Manufacture
 @endsection
 @section('Contain')
 <hr/>
 <div class="row">
     <div class="col-lg-12">
         <h3 class="text-center text-success alert alert-success">{{Session::get('message')}}</h3>
         <hr/>
         <table class="table table-bordered table-hover table-responsive">
             <thead>
                 <tr>
                     <th width="10%">ID</th>
                     <th width="20%">Manufacture Name</th>
                     <th width="20%">Manufacture Description</th>
                     <th width="20%">Publication Status</th>
                     <th width="15%">Action</th>
                 </tr>
             </thead>

             <tbody>
                 @foreach($manufactures as $manufacture)
                 <tr>
                     <td>{{$manufacture->id}}</td>
                      <td>{{$manufacture->manufactureName}}</td>
                       <td>{{$manufacture->manufactureDescription}}</td>
                        <td>{{$manufacture->publicationStatus==1?'Published':'Unpublished'}}</td>
                        <td>
                            <a href="{{url('/edit/manufacture/'.$manufacture->id)}}" class="btn btn-success" title="Edit Manufacture">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{url('/delete/manufacture/'.$manufacture->id)}}" class="btn btn-danger" title="Delete manufacture"
                               onclick="return confirm('Are sure want to delete?')">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
 </div>
 @endsection
 
 
 
 
 
 
 