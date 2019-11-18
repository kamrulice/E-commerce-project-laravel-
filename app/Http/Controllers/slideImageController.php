<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class slideImageController extends Controller
{
    public function addImage(){
        return view('Admin.sliderImage.addImageContain');
    }
    public function storeImage(Request $request){
        $slideImage = new Slide();
        $controllImage = $request->file('controllImage');
        $controllImageName = $controllImage->getClientOriginalName();
        $imagePath = 'public/slideImage/';
        $controllImage->move($imagePath, $controllImageName);
        $controlImageUrl = $imagePath . $controllImageName;

        $shortImage = $request->file('shortImage');
        $shortImageName = $shortImage->getClientOriginalName();
        $shortImage->move($imagePath, $shortImageName);
        $shortImageUrl = $imagePath . $shortImageName;

        $largeImage = $request->file('largeImage');
        $largeImageName = $largeImage->getClientOriginalName();
        $largeImage->move($imagePath . $largeImageName);
        $largeImageUrl = $imagePath . $largeImageName;

        $slideImage->controllImage = $controlImageUrl;
        $slideImage->shortImage = $shortImageUrl;
        $slideImage->largeImage = $largeImageUrl;
        $slideImage->publicationStatus = $request->publicationStatus;
        $slideImage->save();
         return redirect()->back()->with('message','slide image uploaded successfully');
    }
    public function manageImage(){
        $slideImages = Slide::all();
        return view('Admin.sliderImage.manageSlideContain', compact('slideImages'));
    }
}
