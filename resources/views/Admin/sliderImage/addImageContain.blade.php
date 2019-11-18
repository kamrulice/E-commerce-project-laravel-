
@extends('Admin.master')
@section('title')
Add slide Image
@endsection

@section('Contain')
<hr/>
<div class="row">
    <div class="col-lg-12">
        @if(Session::has('message'))
           <div class="text-center text-success alert alert-success">{{Session::get('message')}}</div>
   @endif
        <div class="well">
            <form role="form" class="form-horizontal" action="{{url('/slideImage/save')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                 
                 <div class="form-group">
                    <label class="col-form-label col-sm-2">Controller Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="controllImage" class="form-control-file"/>
                        <span class="text-danger font-bold">{{$errors->has('productImage')? $errors->first('productImage'):''}}</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-form-label col-sm-2">Short Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="shortImage" class="form-control-file"/>
                        <span class="text-danger font-bold">{{$errors->has('productImage')? $errors->first('productImage'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-sm-2">Large Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="largeImage" class="form-control-file"/>
                        <span class="text-danger font-bold">{{$errors->has('productImage')? $errors->first('productImage'):''}}</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-form-label col-sm-2">Publication Status</label>
                    <div class="col-sm-10">
                        <select name="publicationStatus" class="form-control" >
                            <option>Select Publication Status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="btn" class="btn btn-primary btn-block" >Save Product Info</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


