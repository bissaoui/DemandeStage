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
                        <div class="body row ml-4">
                            <div class="form-group col-lg-5">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="name" required>
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-2" > </div>
                            <div class="form-group col-lg-5">
                                <label>Prenom</label>
                                <input type="text" class="form-control" name="prenom" required>
                                @error('prenom')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="demo-masked-input col-lg-5" >
                                <div class="form-group row clearfix">
                                    <div class="col-lg-12">
                                        <label>Date debut de projet </label>
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
                            <div class="form-group col-lg-2" > </div>

                            <div class="form-group col-lg-5">
                                <div class="mb-3">
                                    <label>Etat Projet</label>
                                    <select name="etatProjet" class="form-control show-tick ms select2" data-placeholder="Select">
                                        <option></option>
                                        
                                    </select>
                                </div>
                                @error('etatProjet')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Civilite</label>
                                <input type="text" class="form-control" name="name" required>
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-2" > </div>

                            <div class="form-group col-lg-5">
                                <label>Adresse</label>
                                <input type="text" class="form-control" name="name" required>
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Telephone</label>
                                <input type="tel" class="form-control" name="name" required>
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">


                            </div>

                            <div class="form-group col-lg-2 mt-5">

                                <button type="submit" class="btn btn-block btn-primary">Enregistrer </button>

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection