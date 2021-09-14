@extends('layouts.stagiaire')
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

@section('content')   

<div class="container-fluid">            

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>  Ajouter </strong> Reseau </h2>
                </div>
                <div class="body">
                    <form  action="{{route('reseau.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <p>Reseau </p>
                            <select class="form-control show-tick ms select2" id="Reseau"  data-placeholder="Select" name="reseausoc_id"   data-placeholder="Select">
                                @foreach ($langs as $tech)
                                <option value="{{$tech->id}}">{{$tech->nomReseau}}</option>

                                @endforeach
                              
                            </select>
                            @error('langue')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nom d'utilisateur , ID , Email , Numero  </label>
                            <input type="text" class="form-control" name="username" required>
                            @error('username')
                                <strong>{{ $message }}</strong>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-warning float-right">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer-scripts')
<script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>
@endsection