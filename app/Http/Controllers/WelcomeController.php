<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Customer;
use App\Slide;

class WelcomeController extends Controller
{
    public function index(){
        $publishedProducts = Product::where('publicationStatus',1)->get();
        $sliderImages = Slide::where('publicationStatus',1)->get();
        return view('fontEnd.home.homeContain',['publishedProducts'=>$publishedProducts,'sliderImages'=>$sliderImages]);
    }
    public function catagory($id){
        $publishedCategoryProducts =Product::where('categoryId',$id)
                                    ->where('publicationStatus',1)
                                     ->get();
        return view('fontEnd.category.category',['publishedCategoryProducts'=>$publishedCategoryProducts]);
    }
    public function contact(){
        return view('fontEnd.contact.contactContain');
    }

    public function storeCustomer(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->message = $request->message;
        $customer->save();
        return redirect('/contact')->with('message','Message Sent Successfully');
    }
    public function manageCustomer(){
        $customers = Customer::paginate(10);
        return view('Admin.customer.manageCustomer',['customers'=>$customers]);
    }

    public function productDetails($id){
        $productById = Product::where('id',$id)->first();
        return view('fontEnd.productDetails.productDetails',['productById'=>$productById]);
    }


}

