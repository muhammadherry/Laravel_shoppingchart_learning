@extends('layouts.master')
@section('title')
    SHOPPHERR
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $prd)
                        <li class="list-group-item">
                            <span class="badge">{{ $prd['qty']}}</span>
                            <strong>{{ $prd['item']['title']}}</strong>
                            <span class="label label-success">{{$prd['price']}}</span>
                            <div class="btn-group">
                                <button type="button"class="btn btn-primary btn-xs dropdown-toogle" 
                                    data-toogle="dropdown">Action<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="">Reduc</a></li>
                                    <li><a href="">Reduc</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total:${{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{route('checkout')}}"type="button"class="btn btn-success">Checkout</a>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-sm-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                <h3>haaah kosong</h3>
            </div>
        </div>
    @endif
@endsection

 