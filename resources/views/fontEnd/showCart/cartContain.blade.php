@extends('fontEnd.master')
@section('title')
Check outage
@endsection
@section('homeContain')
<div class="page-head">
    <div class="container">
        <h3>Check Out</h3>
    </div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
    <div class="container">
        <h3>My Shopping Bag</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Product Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
               <?php $total=0; $itemTotal=0; ?>
                @foreach($contents as $v_content)
                <tr class="rem1">
                    <td class="invert-closeb">
                        <div class="rem">
                            <a href="{{URL::to('remove/to-cart'.$v_content->rowId)}}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </div>
                    </td>
                    <td>{{$v_content->name}}</td>
                    <td class="invert">
                        <div class="quantity">
                        <form action="{{url('cart/update')}}" method="post">
                            @csrf
                            <div class="input-group">
                        <input type="number" class="form-control" name="qty" value="{{$v_content->qty}}"/>
                        <input type="hidden" class="form-control" name="rowId" value="{{$v_content->rowId}}"/>
                        <span class="input-group-btn">
                        <button   class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-upload"></span></button>
                        </span>
                            </div>
                        </form>
                         </div>

                    </td>
                    <td class="invert">TK:&nbsp;{{$v_content->price}}</td>
                   <td class="invert">TK:&nbsp;{{$itemTotal=$v_content->price*$v_content->qty}}</td>

                </tr>
                <?php
                $total = $total + $itemTotal ;

                ?>
            @endforeach
                <?php
                Session::put('totalOrder',$total );
                 
                ?>
                <!--quantity-->

                <!--quantity-->
            </table>
        </div>
        <div class="checkout-left">

            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                <?php 
                    $customerId = Session::get('customerId');
                    $shippingId = Session::get('shippingId');
                    if($customerId != null && $shippingId != null ){
                ?>
                <a href="{{url('/checkOut/payment')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                    <?php } else if($customerId != null) { ?>
                   <a href="{{url('/checkOut/shipping')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                    <?php } else{ ?>
                      <a href="{{url('/checkout')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                    </div><?php }?>
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>Shopping basket</h4>
                <ul>
                    <li>SubTotal <i>-</i> <span>BDT:{{Cart::subtotal()}}</span></li>
                    <li>Tax <i>-</i> <span>{{Cart::tax()}}</span></li>
                    <li>Shopping Charge <i>-</i> <span>Free</span></li>
                    <li>Total<i>-</i> <span>{{$total=Cart::total()}}</span></li>
<!--                --><?php //Session::put('totalOrder',$total);?>
                </ul>
            </div>
            <div class="clearfix"> </div>

        </div>
    </div>
</div>
@endsection
