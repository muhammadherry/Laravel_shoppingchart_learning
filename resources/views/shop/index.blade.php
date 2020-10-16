@extends('layouts.master')

@section('title')
    SHOPHEER
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                <div id="charge-error"class="alert alert-success">
                    {{Session::get('success')}}
                </div>                    
            </div>
        </div>
    @endif
    <div class="row">
        @foreach($products as $prd)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{$prd->imagepath}}" alt=""class="img-responsive">
                    <div class="caption">
                        <h3>{{$prd->title}}</h3>  
                        <p>{{$prd->description}}</p>  
                        <div class="clearfix">
                            <div class="pull-left price">${{$prd->price}}</div>
                            <a href="{{route('product.addtocart',['id' => $prd->id])}}" class="btn btn-success pull-right" role="button">Add to </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection