@extends('layouts.auth')

@section('content')
<div class="header">
    <p class="lead">Create an account</p>
</div>
<div class="body">
    <form class="form-auth-small" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label sr-only">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>
            @error('name')
            <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="signup-email" class="control-label sr-only">Email</label>
            <input type="email" class="form-control" id="signup-email" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
            @error('email')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="signup-password" class="control-label sr-only">Password</label>
            <input type="password" class="form-control" id="signup-password" name="password" placeholder="Password" required autocomplete="new-password">
            @error('password')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="signup-password2" class="control-label sr-only">Confirmation Password</label>
            <input type="password" class="form-control" id="signup-password2" name="password_confirmation" placeholder="Confirmation password" required autocomplete="new-password">
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
        <div class="bottom">
            <span class="helper-text">Already have an account? <a href="{{ route('login') }}">Login</a></span>
        </div>
    </form>
</div>
@endsection
