@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1>Détails de projet</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body ml-5 ">
                    <div class="col-lg-12 text-right  "> <span class=" mr-2 float-end  fa fa-gear "></span></div>
                    <div class="row">
                    <h5>Nom de projet :</h5><p class="ml-2">{{$prj->nomProjet}}</p>
                    </div>
                    <div class="row">
                    <h5>Etat de projet :</h5><p class="ml-2">{{$prj->etatProjet}}</p>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-inline ml-auto mr-3  btn-warning">Modifier</button>
    </div>
</div>

@endsection
