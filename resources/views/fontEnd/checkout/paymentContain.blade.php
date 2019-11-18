@extends('fontEnd.master')
@section('title')
    Checkout
@endsection
@section('homeContain')
    <hr/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="well lead text-center text-success">You have to give us product payment information
                    to complete your valuable order.</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('message'))
                    <h3 class="text-center text-success alert alert-success">{{Session::get('message')}}</h3>
                @endif
                <h3 class="text-center">Payment Form </h3>
                <hr/>
                <div class="well box box-primary">
                    <form role="form" class="form-horizontal" action="{{url('/checkOut/save/order')}}" method="POST" enctype="multipart/form-data" name="shippingForm">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label><input type="radio" name="paymentType" value="cashOnDelivery">Cash On Delevery</label>
                        </div>
                        <div class="form-group">
                            <label><input type="radio" name="paymentType" value="bekash">Bekash</label>
                        </div>
                        <div class="form-group">
                            <label><input type="radio" name="paymentType" value="paypal">Paypal</label>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info btn-block">Submit Order</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
