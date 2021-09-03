@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

@section('content')

<div class="container-fluid">
    <h1>Détails de projet</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <form   enctype="multipart/form-data"  action="{{url('admin/projet/'.$prj->id)}}"  method="post">
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
                                <p>Basic</p>
                                <select class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option></option>
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                            @error('nomProjet')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </form>
                <div class="body ml-5 ">
                    <div class="col-lg-12 text-right  "> <span class=" mr-2 float-end  fa fa-gear "></span></div>
                    <div class="row">
                    <h5>Nom de projet :</h5>
                    
                    
                        <p class="ml-2">{{$prj->nomProjet}}</p>
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


@section('footer-scripts')
<script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>

@endsection