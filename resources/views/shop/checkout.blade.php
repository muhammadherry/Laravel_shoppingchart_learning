@extends('layouts.master')

@section('title')
    SHOPHEER
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
        <h2>Checkout<h2>
        <h2>Your Total:${{$total}}<h2>
        <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ?
            'hidden' : '' }}">
                {{ Session::get('error') }}
        </div>
            <form class="form-inline"action="{{route('checkout')}}"method="post"id="form_checkout">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="address" class="sr-only">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="card_name" class="sr-only">Card Holder Name</label>
                    <input type="text" class="form-control" id="card_name" placeholder="Card Holder Name">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="card_number" class="sr-only">Credit Card Number</label>
                    <input type="text" class="form-control" id="card_number" placeholder="Credit Card Number">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="card_expiry_mont" class="sr-only">Expiration Month</label>
                    <input type="text" class="form-control" id="card_expiry_mont" placeholder="Expiration Month">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="card_expiry_year" class="sr-only">Expiration Year</label>
                    <input type="text" class="form-control" id="card_expiry_year" placeholder="Expiration Year">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input  for="card_cvc" type="text" class="form-control" id="card_expiry_year" placeholder="Credit Card Number"aria-describedby="emailHelp">
                </div>
                
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript"src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript"src="{{URL::to('src/js/checkout.js')}}"></script>
@endsection