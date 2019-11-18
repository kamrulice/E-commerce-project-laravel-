 @extends('Admin.master')
 @section('title')
 Manage product
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
                     <th width="5%">ID</th>
                     <th width="15%">Product Name</th>
                      <th width="15%">Category Name</th>
                       <th width="18%">Manufacture Name</th>
                        <th width="7%">Price</th>
                         <th width="10%">Quantity</th>
                        <th width="15%">Publication Status</th>
                         <th width="15%">Action</th>
                 </tr>
             <tbody>
                 @foreach($products as $product)
                 <tr>
                      <td>{{$product->id}}</td>
                     <td>{{$product->productName}}</td>
                      <td>{{$product->categoryName}}</td>
                       <td>{{$product->manufactureName}}</td>
                        <td>{{$product->productPrice}}</td>
                        <td>{{$product->productQuantity}}</td>
                         <td>{{$product->publicationStatus==1?'Published':'Unpublished'}}</td>
                         <td>
                             <a href="{{url('/edit/product/'.$product->id)}}" class="btn btn-success" title="Product Edit">
                                 <span class="glyphicon glyphicon-edit"></span>
                             </a>
                             <a href="{{url('/delete/product/'.$product->id)}}" class="btn btn-danger" title=" product Delete"
                                 on click="return confirm('Are you want delete ?')">
                                 <span class="glyphicon glyphicon-trash"></span>
                             </a>
                             <a href="{{url('/product/Details/'.$product->id)}}" class="btn btn-info" title="Product Details">
                                 <span class="glyphicon glyphicon-info-sign"></span>
                             </a>
                         </td>
                 </tr>
                 @endforeach
             </tbody>
             </thead>
         </table>
     </div>
 </div>
 @endsection
 
