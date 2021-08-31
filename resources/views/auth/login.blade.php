@extends('layouts.auth')

@section('content')                        
<div class="header">
    <p class="lead">Login to your account</p>
</div>
<div class="body">
    <form class="form-auth-small"  method="POST" action="{{ route('login') }} ">
        @csrf
        <div class="form-group">
            <label for="signin-email" class="control-label sr-only">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="signin-email"  name="email" value="{{old('email')}}" placeholder="Email">
            @error('email')
            <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="signin-password" class="control-label sr-only">Password</label>
            <input type="password" class="form-control" id="signin-password" name="password" placeholder="Password">
            @error('password')
            <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group clearfix">
            <label class="fancy-checkbox element-left">
                <input type="checkbox">
                <span>Remember me</span>
            </label>								
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
        <div class="bottom">
            <span class="helper-text m-b-10"><i class="fa fa-lock"></i>
                <a href="{{ route('password.request') }}">Forgot password?</a></span>
            <span>Don't have an account? <a href="{{route('register')}}">Register</a></span>
        </div>
    </form>
</div>
@endsection
