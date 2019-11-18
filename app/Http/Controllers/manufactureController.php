<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;

class manufactureController extends Controller
{
    public function addManufacture(){
        return view('Admin.manufacture.manufactureContain');
    }
    public function storeManufacture(Request $request){
        $this->validate($request,[
            'manufactureName'=>'required',
          'manufactureDescription' => 'required',
        ]);
      // return $request->all();
         $manufacture = new Manufacture();
        $manufacture->manufactureName = $request->manufactureName;
        $manufacture->manufactureDescription = $request->manufactureDescription;
         $manufacture->publicationStatus = $request->publicationStatus;
         $manufacture->save();
         return redirect('/add/Manufacture')->with('message','Manufacture Save sucessfully');
         
    }
    public function manageManufacture(){
        $manufactures = Manufacture::all();
        return view('Admin.manufacture.manageManufacture',['manufactures'=>$manufactures]);
    }
    public function editManufacture($id){
        $manufactureById = Manufacture::find($id)->first();
        return view('Admin.manufacture.editManufacture',['manufactureById'=>$manufactureById]);
        
    }
    public function updateManufacture(Request $request){
        $manufacture = Manufacture::find($request->id);
        $manufacture->manufactureName = $request->manufactureName;
          $manufacture->manufactureDescription = $request->manufactureDescription;
            $manufacture->publicationStatus = $request->publicationStatus;
        $manufacture->save();
        return redirect('/Manufacture/manage')->with('message','Manufacture Update Successfully');
    }
    
    public function deleteManufacture($id){
        $manufacture = Manufacture::find($id);
        $manufacture->delete();
        return redirect('/Manufacture/manage')->with('message','Manufacture Delete Successfully');
    }
}

