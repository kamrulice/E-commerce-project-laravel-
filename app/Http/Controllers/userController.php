<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    public function addUser(){
         return view('Admin.user.addUserContain'); 
    }
    public function storeUser(Request $request){
        $user = new User();
        $user->name = $request->name;
         $user->address = $request->address;
          $user->email = $request->email;
          $user->password =$request->password;
          $user->save();
          return redirect('/addUser')->with('message','User Info Save Successfully');
    }
    public function manageUser(){
        $users = User::paginate(10);
        return view('Admin.user.manageUser',['users'=>$users]);
    }
}
