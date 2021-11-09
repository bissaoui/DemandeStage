@extends('layouts.auth')

@section('content')
<div class="header">
    <p class="lead">Reset Password</p>
</div>
<div class="body">
    <form class="form-auth-small" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="signup-email" class="control-label ">E-Mail Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">

                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="signup-password" class="control-label ">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password-confirm" class="control-label ">Confirmation Password</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
      
        <button type="submit" class="btn btn-primary btn-lg btn-block">Reset Password</button>
        
    </form>
</div>
@endsection
