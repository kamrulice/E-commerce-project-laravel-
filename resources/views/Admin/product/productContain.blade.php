@extends('Admin.master')
@section('title')
Add Product
@endsection

@section('Contain')
<hr/>
<div class="row">
    <div class="col-lg-12">
<h3 class="text-center text-success alert alert-success">{{Session::get('message')}}</h3>
        <div class="well">
            <form role="form" class="form-horizontal" action="{{url('/Product/save')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-form-label col-sm-2">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="productName" class="form-control"/>
                        <span class="text-danger font-bold">{{$errors->has('productName')? $errors->first('productName'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-sm-2">Category Name</label>
                    <div class="col-sm-10">
                        <select name="categoryId" class="form-control" >
                            <option>Select Category Name</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-form-label col-sm-2">Manufacture Name</label>
                    <div class="col-sm-10">
                        <select name="manufactureId" class="form-control" >
                            <option>Select Manufacture Name</option>
                            @foreach($manufactures as $manufacture)
                            <option value="{{$manufacture->id}}">{{$manufacture->manufactureName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-sm-2">Product Price</label>
                    <div class="col-sm-10">
                        <input type="number" name="productPrice" class="form-control"/>
                        <span class="text-danger font-bold">{{$errors->has('productPrice')? $errors->first('productPrice'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-sm-2">Product Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" name="productQuantity" class="form-control"/>
                        <span class="text-danger font-bold">{{$errors->has('productQuantity')? $errors->first('productQuantity'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-sm-2">Product Short Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="productShortDescrition" rows="5"></textarea>
                        <span class="text-danger font-bold ">{{$errors->has('productShortDescrition')? $errors->first('productShortDescrition'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-sm-2">Product Long Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="productLongDescrition" rows="8"></textarea>
                        <span class="text-danger font-bold ">{{$errors->has('productLongDescrition')? $errors->first('productLongDescrition'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-sm-2">Product Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="productImage" class="form-control-file"/>
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


