@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Sign In<h1>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{route('user.signin')}}" method="post">
    
                <div class="form-group mx-sm-3 mb-2">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email"name="email">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password"name="password">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <button type="submit" class="btn btn-primary mb-2">Sign In</button>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection
