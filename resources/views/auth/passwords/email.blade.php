@extends('layouts.auth')

@section('content')
                     
<div class="header">
    <p class="lead">Réinitialiser le mot de passe</p>
</div>
<div class="body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <form class="form-auth-small"  method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <label for="signin-email" class="control-label   ">E-Mail Address</label>
            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
       
        <button type="submit" class="btn btn-primary btn-lg btn-block">Envoyer le lien de réinitialisation </button>
        <div class="bottom">
            <span class="helper-text m-b-10">
                avez vous un compte ?
                <a href="{{ route('login') }}">Login</a></span>
            <span>Vous n'avez pas de compte ? <a href="{{route('register')}}">S'inscrire</a></span>
        </div>
    </form>
</div>
@endsection
