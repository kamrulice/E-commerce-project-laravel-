@extends('Admin.master')
@section('title')
Edit Manufacture
@endsection
@section('Contain')
<hr/>
<hr/>
<div class="row">
    <div class="col-lg-12">
        
        <hr/>
        <div class="well">
            <form class="form-horizontal" role="form" method="post" action="{{url('/update/manufacture')}}" enctype="multipart/form-data" name="editmanufacture" >
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-form-label col-sm-2">Manufacture Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="manufactureName" value="{{$manufactureById->manufactureName}}" class="form-control"/>
                        <input type="hidden" name="id" class="form-control" value="{{$manufactureById->id}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-sm-2">Manufacture Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="manufactureDescription" rows="8">{{$manufactureById->manufactureDescription}}</textarea> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-sm-2">Publication Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="publicationStatus">
                            <option>Select publication status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10  ">
                        <button  type="submit" class="btn btn-success btn-block" name="btn">Update Manufacture Info</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.forms['editmanufacture'].elements['publicationStatus'].value = {{$manufactureById->publicationStatus}}
</script>
@endsection




