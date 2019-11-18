<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\Product;
use DB;

class productController extends Controller
{
    public function createProduct(){
        $categories = Category::where('publicationStatus',1)->get();
        $manufactures = Manufacture::where('publicationStatus',1)->get(); 
        
        return view('Admin.product.productContain',['categories'=>$categories,'manufactures'=>$manufactures]);
    }
    public function storeProduct(Request $request){
        $this->validate($request,[
            'productName' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productShortDescrition' => 'required',
            'productLongDescrition' => 'required',
            'productImage' => 'required',
        ]);
        
        $productImage = $request->file('productImage');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        $this->saveProductInfo($request,$imageUrl);
        return redirect('/add/product')->with('message', 'Product Info Save Successfully');
    }
    protected function saveProductInfo($request,$imageUrl){
         $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufactureId = $request->manufactureId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescrition = $request->productShortDescrition;
        $product->productLongDescrition = $request->productLongDescrition;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }
    public function manageProduct(){
        $products = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufactures', 'products.manufactureId', '=', 'manufactures.id')
                ->select('products.id', 'products.productName', 'products.productPrice', 'products.productQuantity', 'products.publicationStatus', 'categories.categoryName', 'manufactures.manufactureName')
                ->get();

        return view('Admin.product.manageContain', ['products' => $products]);
    }
    public function viewProduct($id){
        $productView = DB::table('products')
                    ->join('categories','products.categoryId','=','categories.id')
                    ->join('manufactures','products.manufactureId','=','manufactures.id')
                    ->select('products.*','categories.categoryName','manufactures.manufactureName')
                    ->where('products.id',$id)
                    ->first();
        return view('Admin.product.productView',['productView'=>$productView]);
    }
    public function editProduct($id){
         $categories = Category::where('publicationStatus',1)->get();
        $manufactures = Manufacture::where('publicationStatus',1)->get(); 
        $products = Product::where('id',$id)->first();
        return view('Admin.product.editProduct',['categories'=>$categories,'manufactures'=>$manufactures,'products'=>$products]);
    }
    public function updateProduct(Request $request){
         $imageUrl = $this->imageExistStatus($request);
        $productById = Product::where('id',$request->productId)->first();
        $productById->productName = $request->productName;
        $productById->categoryId = $request->categoryId;
        $productById->manufactureId = $request->manufactureId;
        $productById->productPrice = $request->productPrice;
        $productById->productQuantity = $request->productQuantity;
        $productById->productShortDescrition = $request->productShortDescrition;
        $productById->productLongDescrition = $request->productLongDescrition;
        $productById->productImage = $imageUrl;
        $productById->publicationStatus = $request->publicationStatus;
        $productById->save();
        return redirect('/product/manage')->with('message','Product Update Successfull');
    }
    private function imageExistStatus($request){
        $productById = Product::where('id',$request->productId)->first();
        $productImage = $request->file('productImage');
        
        if($productImage){
            
           $name = $productImage->getClientOriginalName();
           $uploadPath =  'public/productImage/';
           $productImage->move($uploadPath,$name);
           $imageUrl = $uploadPath.$name;
        }
        else{
            $imageUrl = $productById->productImage;
        }
        return $imageUrl;
    }
    public function deleteProduct($id){
        $productDeleteById = Product::find($id);
        $productDeleteById->delete();
        return redirect('/product/manage')->with('message',' Product Delete Successfully');
    }
}
