  @extends('Admin.master')
 @section('title')
 Manage Slider Image
 @endsection
 @section('Contain')
 <hr/>
 <div class="row">
     <div class="col-lg-12">
         @if(Session::has('message'))
         <div class="text-center text-success alert alert-success">{{Session::get('message')}}</div>
         @endif
         <hr/>
         <table class="table table-bordered table-hover table-responsive">
             <thead>
                 <tr>
                     <th width="5%">ID</th>
                     <th width="15%">Controller Image</th>
                      <th width="15%">Short Image</th>
                      <th width="18%">Large Image</th>
                        <th width="15%">Publication Status</th>
                         <th width="15%">Action</th>
                 </tr>
                  </thead>
             <tbody>
                 @foreach($slideImages as $slideImage)
                 <tr>
                      <td>{{$slideImage->id}}</td>
                      <td>
                         <img src="{{asset($slideImage->controllImage)}}" width="80" height="70"/>
                     </td>
                      <td>
                          <img src="{{asset($slideImage->shortImage)}}" width="80" height="70"/>
                          </td>
                      <td>
                          <img src="{{asset($slideImage->largeImage)}}" width="80" height="70"/>
                         </td>
                         <td>{{$slideImage->publicationStatus==1?'Published':'Unpublished'}}</td>
                         <td>
                             <a href="{{url('/edit/product/'.$slideImage->id)}}" class="btn btn-success" title="Product Edit">
                                 <span class="glyphicon glyphicon-edit"></span>
                             </a>
                             <a href="{{url('/delete/product/'.$slideImage->id)}}" class="btn btn-danger" title=" product Delete"
                                 on click="return confirm('Are you want delete ?')">
                                 <span class="glyphicon glyphicon-trash"></span>
                             </a>
                             <a href="{{url('/product/Details/'.$slideImage->id)}}" class="btn btn-info" title="Product Details">
                                 <span class="glyphicon glyphicon-info-sign"></span>
                             </a>
                         </td>
                 </tr>
                 @endforeach
            </tbody>
             
         </table>
     </div>
 </div>
 @endsection
 
