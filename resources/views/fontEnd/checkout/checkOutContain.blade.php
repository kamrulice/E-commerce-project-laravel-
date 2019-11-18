@extends('fontEnd.master')
@section('title')
    Checkout
@endsection
@section('homeContain')
    <hr/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="well lead text-center text-success">You have to login to complete your valuable order. If your are not registered then please sign up first</div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-lg-6">
            @if(Session::has('message'))
            <h3 class="text-center text-success alert alert-success">{{Session::get('message')}}</h3>
            @endif
                <h3 class="text-center">Please Register Here</h3>
                <hr/>
            <div class="well box box-primary">
                <form role="form" class="form-horizontal" action="{{url('/checkout/sign-up')}}" method="POST"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-form-label">First Name</label>
                            <input type="text" name="firstName" class="form-control" placeholder="First Name"/>
                            <span class="text-danger font-bold">{{$errors->has('firstName')? $errors->first('firstName'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Last Name</label>
                            <input type="text" name="lastName" class="form-control" placeholder="Last Name"/>
                            <span class="text-danger font-bold">{{$errors->has('lastName')? $errors->first('lastName'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">E-mail Address</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail address"/>
                            <span class="text-danger font-bold">{{$errors->has('email')? $errors->first('email'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <textarea name="address" class="form-control" rows="5" placeholder="Address"></textarea>
                        <span class="text-danger font-bold">{{$errors->has('address')? $errors->first('address'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                            <span class="text-danger font-bold">{{$errors->has('password')? $errors->first('password'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Phone Number</label>
                            <input type="number" name="phone" class="form-control" placeholder="Phone Number"/>
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
                            <button type="submit" name="btn" class="btn btn-success btn-block">Save customer Info
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <h3 class="text-center">Login Here</h3>
            <hr/>
            <div class="well box box-primary">
                <form>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter E-mail Address ">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="assword" name="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                         <button type="submit" class="btn btn-success btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
