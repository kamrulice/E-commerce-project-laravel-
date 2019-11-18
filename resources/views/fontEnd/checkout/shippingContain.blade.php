@extends('fontEnd.master')
@section('title')
    Checkout
@endsection
@section('homeContain')
    <hr/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="well lead text-center text-success">You have to give product shipping information
                    to complete your valuable order. If your product billing information & shipping information same then just press on save shipping info button  </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('message'))
                    <h3 class="text-center text-success alert alert-success">{{Session::get('message')}}</h3>
                @endif
                <h3 class="text-center">Shipping Address</h3>
                <hr/>
                <div class="well box box-primary">
                    <form role="form" class="form-horizontal" action="{{url('/checkOut/save/shipping')}}" method="POST"
                          enctype="multipart/form-data" name="shippingForm">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-form-label">Full Name</label>
                            <input type="text" name="fullName" class="form-control" value="{{$customerById->firstName}}&nbsp;{{$customerById->lastName}}"/>
                            <span class="text-danger font-bold">{{$errors->has('fullName')? $errors->first('fullName'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">E-mail Address</label>
                            <input type="email" name="email" class="form-control" value="{{$customerById->email}}"/>
                            <span class="text-danger font-bold">{{$errors->has('email')? $errors->first('email'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Address</label>
                            <textarea name="address" class="form-control" rows="5"> {{$customerById->address}}</textarea>
                            <span class="text-danger font-bold">{{$errors->has('address')? $errors->first('address'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Phone Number</label>
                            <input type="number" name="phone" class="form-control" value="{{$customerById->phone}}"/>
                            <span class="text-danger font-bold">{{$errors->has('phone')? $errors->first('phone'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">District</label>
                            <select name="district" class="form-control">
                                <option>Select district Name</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Gazipur">Gazipur</option>
                                <option value="Cumilla">Cumilla</option>
                                <option value="Noakhali">Noakhali</option>
                                <option value="Barisal">Barisal</option>
                                <option value="chattigoan">chattigoan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save Shipping Info</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    <script>
        document.forms['shippingForm'].elements['district'].value = '{{$customerById->district}}';
    </script>
@endsection
