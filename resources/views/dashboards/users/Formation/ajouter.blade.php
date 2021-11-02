@extends('layouts.stagiaire')
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

@section('content')   

<div class="container-fluid">            

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>  Ajouter </strong> Formation </h2>
                </div>
                <div class="body">
                    <form  action="{{route('formation.store')}}" method="post">
                        @csrf
                        <div class="row">
                            
                        
                        <div class=" col-lg-6">
                            <p>Ecoles </p>
                            <select class="form-control show-tick ms select2 " id="Ecole"  data-placeholder="Select" name="ecole_id"   data-placeholder="Select">
                                @foreach ($ecoles as $ecole)
                                <option value="{{$ecole->id}}">{{$ecole->nomEcole}}</option>
                                @endforeach
                            </select>
                            @error('ecole_id')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <p>Nom Complet d'Ecole ou Ville  </p>
                            <input type="text" class="form-control" name="nomEcoleComplet" required>
                            @error('nomEcoleComplet')
                                <strong>{{ $message }}</strong>
                            @enderror

                        </div>
                        <div class="col-lg-6">
                            <p>Formation </p>
                            <select class="form-control show-tick ms select2" id="Ecole"  data-placeholder="Select" name="formation_id"   data-placeholder="Select">
                                @foreach ($formations as $formation)
                                <option value="{{$formation->id}}">{{$formation->abreviation}}</option>
                                @endforeach
                            </select>
                            @error('formation_id')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <p>Filiere  </p>
                            <input type="text" class="form-control" name="filiere" required>
                            @error('filiere')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group  col-lg-6">
                            <label>Date debut</label>
                            <input type="date" class="form-control"   name="dateDebut" required>
                            @error('dateDebut')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group  col-lg-6">
                            <label>Date fin</label>
                            <input type="date" class="form-control"  name="dateFin" required>
                            @error('dateFin')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="my-2 col-lg-12">
                        <button type="submit" class="btn btn-warning float-right">Ajouter</button>
                    </div>
                    </div>
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