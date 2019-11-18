  @extends('Admin.master')
 @section('title')
 Add User
 @endsection
 @section('Contain')
 <hr/>
 <div class="row">
     <div class="col-lg-12">
         <h3 class="text-center text-success alert alert-success">{{Session::get('message')}}</h3> 
         <hr/>
         <div class="well">
             <form role="form" class="form-horizontal" action="{{url('/user/save')}}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                 <div class="form-group">
                     <label class="col-form-label col-sm-2">UserName</label>
                     <div class="col-sm-10">
                         <input type="text" name="name" class="form-control"/>
                         <span class="text-danger font-bold">{{$errors->has('name')? $errors->first('name'):''}}</span>
                     </div>
                 </div>
                 
                 <div class="form-group">
                     <label class="col-form-label col-sm-2">Address</label>
                     <div class="col-sm-10">
                         <textarea class="form-control" name="address" rows="5"></textarea>
                         <span class="text-danger font-bold ">{{$errors->has('address')? $errors->first('address'):''}}</span>
                     </div>
                 </div>
                   <div class="form-group">
                     <label class="col-form-label col-sm-2">Email</label>
                     <div class="col-sm-10">
                         <input type="text" name="email" class="form-control"/>
                         <span class="text-danger font-bold">{{$errors->has('email')? $errors->first('email'):''}}</span>
                     </div>
                 </div>
                  <div class="form-group">
                     <label class="col-form-label col-sm-2">password</label>
                     <div class="col-sm-10">
                         <input type="password" name="password" class="form-control"/>
                         <span class="text-danger font-bold">{{$errors->has('password')? $errors->first('password'):''}}</span>
                     </div>
                 </div>
                 
                 <div class="form-group">
                      
                     <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" name="btn" class="btn btn-success btn-block" >Save User Info</button>
                     </div>
                 </div>
                 
             </form>
         </div>
     </div>
 </div>
 @endsection
 

 
 
 
 
 
 
 
