<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use DB;
use Session;
class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id)
    {
        $productInfo = DB::table('products')
                    ->select('*')
                    ->where('id',$id)
                    ->first();
         $data = array();
         $data['id'] = $productInfo->id;
         $data['name'] = $productInfo->productName;
         $data['qty'] = 1;
         $data['price'] = $productInfo->productPrice;
         $data['weight']= 0;
         $data['options']['image'] = $productInfo->productImage;
         Cart::add($data);
         return redirect('/');
    }

    public function showCart(){
        $contents = Cart::content();
        return view('fontEnd.showCart.cartContain',compact('contents'));
    }
    public function removeCart($rowId){
        Cart::remove($rowId);
        return redirect('/showCart/');
    }
    public function updateCart(Request $request){
        $qty = $request->qty;
        $rowId = $request->rowId;
        Cart::update($rowId,$qty);
        return redirect('/showCart/');
    }
    public function emptyCart(){
        Cart::destroy();
        return redirect('/');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
