 @extends('Admin.master')
 @section('title')
 Product Details View
 @endsection
 @section('Contain')
 <hr/>
 <table class="table table-bordered table-hover">
     <tr>
         <th>ID</th>
         <td>{!!$productView->id!!}</td>
     </tr>
     <tr>
         <th>Product Name</th>
         <td>{!!$productView->productName!!}</td>
     </tr>
     <tr>
         <th>Category Name</th>
         <td>{{$productView->categoryName}}</td>
     </tr>
     <tr>
         <th>Manufacture Name</th>
         <td>{{$productView->manufactureName}}</td>
     </tr>
     <tr>
         <th>Product Price</th>
         <td>{{$productView->productPrice}}</td>
     </tr>
     <tr>
         <th>Product Quantity</th>
         <td>{{$productView->productQuantity}}</td>
     </tr>
    
     <tr>
         <th>product Short Description</th>
         <td>{!!$productView->productShortDescrition!!}</td>
     </tr>
     <tr>
         <th>product Long Description</th>
         <td>{!!$productView->productLongDescrition!!}</td>
     </tr>
      <tr>
         <th>Product Image</th>
         <td><img src="{{asset($productView->productImage)}}" height="200" width="200"/></td>
     </tr>
      <tr>
         <th>Publication Status</th>
         <td>{{$productView->publicationStatus==1?'published':'Unpublished'}}</td>
     </tr>
 </table>
 @endsection