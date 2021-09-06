@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

@section('content')

<div class="container-fluid">
    <h1>Détails de projet</h1>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{url('admin/projet/'.$prj->id.'/info')}}"  method="post">
                <div class="card">
                    <div class="body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Nom Projet</label>
                            <input type="text" class="form-control" value="{{$prj->nomProjet}}" name="nomProjet" required>
                            @error('nomProjet')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <p>Etat Projet</p>
                                <select name="etatProjet" class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option></option>
                                    <option value="En attende" >En attende</option>
                                    <option value="En cours" >En cours</option>
                                    <option value="Fini" >Fini</option>
                                </select>
                            </div>
                            @error('etatProjet')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
                <a class="btn btn-inline ml-auto mr-3  btn-danger" href="{{route('projet.show',$prj->id)}}"><i class="fa fa-angle-left " ></i> Retour</a>
                <button type="submit" class="btn btn-inline ml-auto mr-3  btn-warning">Modifier</button>
            </form>
        </div>
    </div>
</div>
@endsection


@section('footer-scripts')
<script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>

@endsection