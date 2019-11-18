  @extends('Admin.master')
 @section('title')
Edit Category
 @endsection
 @section('Contain')
 <hr/>
 <div class="row">
     <div class="col-lg-12">
         <h3 class="text-center text-success alert alert-success">{{Session::get('message')}}</h3> 
         <hr/>
         <div class="well">
             <form role="form" class="form-horizontal" action="{{url('/Category/update')}}" method="POST" enctype="multipart/form-data" name="editCategoryForm">
                  {{csrf_field()}}
                 <div class="form-group">
                     <label class="col-form-label col-sm-2">Category Name</label>
                     <div class="col-sm-10">
                         <input type="text" name="categoryName"  value="{{$categoryById->categoryName}}" class="form-control"/>
                         <input type="hidden" name="id" value="{{$categoryById->id}}" class="form-control"/>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="col-form-label col-sm-2">Category Description</label>
                     <div class="col-sm-10">
                         <textarea class="form-control" name="categoryDescrition" rows="8">{{$categoryById->categoryDescrition}}</textarea>
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
                         <button type="submit" name="btn" class="btn btn-success btn-block" >Update Category info</button>
                     </div>
                 </div>
                 
             </form>
         </div>
     </div>
 </div>
 <script>
  document.forms['editCategoryForm'].elements['publicationStatus'].value={{$categoryById->publicationStatus}}
 </script>
 @endsection
 

 
 
 
 