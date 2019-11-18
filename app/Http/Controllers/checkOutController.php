<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Byer;
use App\shipping;
use App\Order;
use App\Payment;
use App\OrderDetail;
use Cart;
use Illuminate\Support\Facades\Hash;

class checkOutController extends Controller
{
    public function index()
    {
        return view('fontEnd.checkout.checkOutContain');
    }

    public function signUp(Request $request)
    {
        $customer = new Byer();
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->password = Hash::make($request->password);
        $customer->phone = $request->phone;
        $customer->district = $request->district;
        $customer->save();
        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        return redirect('/checkOut/shipping');
    }

    public function showShippingForm()
    {
        $customerId = Session::get('customerId');
        $customerById = Byer::find($customerId);
        return view('fontEnd.checkout.shippingContain', compact('customerById'));
    }

    public function storeShipping(Request $request)
    {
        $shipping = new shipping();
        $shipping->fullName = $request->fullName;
        $shipping->email = $request->email;
        $shipping->address = $request->address;
        $shipping->phone = $request->phone;
        $shipping->district = $request->district;
        $shipping->save();
        $shippingId = $shipping->id;
        Session::put('shippingId', $shippingId);
        return redirect('/checkOut/payment');
    }

    public function showPaymentForm()
    {
        return view('fontEnd.checkout.paymentContain');
    }

    public function saveOrder(Request $request)
    {
        $paymentType = $request->paymentType;
        if ($paymentType == 'cashOnDelivery') {
            $order = new Order();
            $order->customerId = Session::get('customerId');
            $order->shippingId = Session::get('shippingId');
            $order->totalOrder = Session::get('totalOrder');
            $order->save();
            $orderId = $order->id;
            Session::put('orderId', $orderId);
            $payment = new Payment();
            $payment->orderId = Session::get('orderId');
            $payment->paymentType = $paymentType;
            $payment->save();
            $orderDetail = new OrderDetail();
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail->orderId = Session::get('orderId');
                $orderDetail->productId = $cartProduct->id;
                $orderDetail->productName = $cartProduct->name;
                $orderDetail->productPrice = $cartProduct->price;
                $orderDetail->productQuantity = $cartProduct->qty;
                $orderDetail->save();
               Cart::remove($cartProduct->rowId);
            }
            return redirect('/customer/home');
        }
        else if ($paymentType == 'bekash') {
            return 'Under construction bekash payment type. please cash on delivery';
        }
      else if ($paymentType=='paypal'){
        return 'Under construction bekash payment type. please cash on delivery';
}
}
public function customerHome(){
        return view('fontEnd.checkout.customerHome');
}
}
