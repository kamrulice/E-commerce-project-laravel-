@extends('Admin.master')
@section('title')
Manage Category
@endsection
@section('Contain')
<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
          <th>ID</th>
           <th>Category Name</th>
            <th>Category Description</th>
             <th>Publication Status</th>
             <th>Action</th>
        </tr>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->categoryName}}</td>
             <td>{{$category->categoryDescrition}}</td>
              <td>{{$category->publicationStatus==1?'Published':'Unpublished'}}</td>
              <td>
                  <a href="{{url('/category/edit/'.$category->id)}}" class="btn btn-success" title="Edit Category">
                      <span class="glyphicon glyphicon-edit"></span>
                  </a>
                  <a href="{{url('/category/delete/'.$category->id)}}" class="btn btn-danger" title="Delete Category"
                     onclick ="return confirm('Are Sure want to delete ?')">
                      <span class="glyphicon glyphicon-trash"></span>
                  </a>
              </td>
              
        </tr>
        @endforeach
    </tbody>
    </thead>
</table>
@endsection
 
