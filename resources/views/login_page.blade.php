@extends('layout')
@section('body_class')
    id="LoginForm"
@endsection
@section('content')
<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Admin Login</h2>
                @if (\Session::has('massage'))
                    <p> {!! \Session::get('massage') !!}</p>
                    @else
                    <p>Please enter your email and password</p>
                @endif

            </div>
            <form method="post" action="{{url('/login')}}" id="Login">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
                <button type="submit" form="Login" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection

