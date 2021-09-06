@extends('layouts.stagiaire')

@section('content')    


<div class="container-fluid">            
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card pb-2">
                <div class="header">
                    <h2>  Complete information  Profile </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card pb-2">
                <div class="header">
                    <form action="" method="post">
                        @csrf
                        <div>
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="name" required>
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Prenom</label>
                                <input type="text" class="form-control" name="prenom" required>
                                @error('prenom')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="demo-masked-input">
                                <div class="form-group row clearfix">
                                    <div class="col-lg-12">
                                        <b>Date debut de projet </b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
                                            </div>
                                            <input type="text" class="form-control date" name="dateDebutPr"  placeholder="Ex: 30/07/2016" required>
                                            @error('dateDebutPr')
                                               <strong class="col-lg-12">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="name" required>
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="name" required>
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection