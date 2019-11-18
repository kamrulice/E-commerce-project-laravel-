<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class categoryController extends Controller
{
    public function createCategory(){
        return view('Admin.category.categoryContain');
    }  
    public function storeCategory(Request $request){
        $this->validate($request,[
            'categoryName' => 'required',
            'categoryDescrition' => 'required',
        ]);
        //return $request->all();
//        $category = new Category();
//        $category->categoryName = $request->categoryNaame;
//        $category->categoryDescrition = $request->categoryDescrition;
//        $category->publicationStatus = $request->publicationStatus;
//        $category->save();
        
//        Category::create($request->all());
//        return 'Info save successfully';
        DB::table('Categories')->insert([
            'categoryName' => $request->categoryName,
            'categoryDescrition' => $request->categoryDescrition,
            'publicationStatus' => $request->publicationStatus
        ]);
//        return  redirect()->back();
        return redirect('/addCategory')->with('message','Category info save successfully');
        
    }
    public function manageCategory(){
        $categories = Category::all();
        return view('Admin.category.manageCategory',['categories'=>$categories]);
    }
    public function editCategory($id){
        $categoryById = Category::where('id',$id)->first();
        return view('Admin.category.editCategory',['categoryById'=>$categoryById]);
    }
    public function updateCategory(Request $request){
       // dd($request->all());
        $category = Category::find($request->id);
        $category->categoryName = $request->categoryName;
          $category->categoryDescrition = $request->categoryDescrition;
            $category->publicationStatus = $request->publicationStatus;
            $category->save();
            return redirect('/category/manage')->with('message','Category info update successfully');
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/manage')->with('message','Category Delete successfully');
    }
}





