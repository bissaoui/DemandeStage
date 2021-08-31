@extends('layouts.admin')

<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
@section('content')   

<div class="container-fluid">            

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>  Ajouter </strong> Projet </h2>
                </div>
                <div class="body">
                    <form action="{{route('projet.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nom Projet</label>
                            <input type="text" class="form-control" value="{{old('nomProjet')}}" name="nomProjet" required>
                            @error('nomProjet')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Date debut</label>
                            <input type="date" class="form-control"value="{{old('dateDebut')}}"  name="dateDebut" required>
                            @error('dateDebut')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Date fin</label>
                            <input type="date" class="form-control" value="{{old('dateFin')}}" name="dateFin" required>
                            @error('dateFin')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <p>Technologies </p>
                            <select class="form-control show-tick ms select2"  name="Technologies[]"  multiple data-placeholder="Select">
                                @foreach ($techs as $tech)
                                <option value="{{$tech->id}}">{{$tech->nomTechnologie}}</option>

                                @endforeach
                              
                            </select>
                            @error('Technologies')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p>Users </p>
                            <select class="form-control show-tick ms select2" name="users[]" multiple data-placeholder="Select">
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}} {{$user->prenom}} </option>
                                @endforeach
                            </select>
                            @error('users')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning">Ajouter</button>
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
@endsection