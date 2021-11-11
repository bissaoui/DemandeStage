@extends('layouts.stagiaire')
<link rel="stylesheet" href="{{ asset('assets/css/editprofile.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

@section('content')    


<div class="container-fluid">            
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card pb-2">
                <div class="header">
                    <h2> Information Personnel </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card  pb-2">
                <div class="header ">
                    <form  >
                            <div class="avatar-upload">
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url(/storage/Pictures/Profile/{{ auth()->user()->photoUser }});">    
                                </div>
                                @error('photoUser')
                                <strong class="body">Photo  Important</strong>
                            @enderror
                            </div>
                        </div>
                        <div class="body row ml-4">
                            <div class="form-group col-lg-5">
                                <label>Nom</label>
                                <input disabled type="text" class="form-control" name="name" value="{{auth()->user()->name}}" required>
                            </div>
                            <div class="form-group col-lg-2" > </div>
                            <div class="form-group col-lg-5">
                                <label>Prenom</label>
                                <input  disabled type="text" class="form-control" name="prenom" value="{{auth()->user()->prenom}}" required>
                            </div>
                            <div class="demo-masked-input col-lg-5" >
                                <div class="form-group row clearfix">
                                    <div class="col-lg-12">
                                        <label>Date de naissance </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
                                            </div>
                                            <input type="text" disabled class="form-control date" name="ddn" value="{{date('d-m-Y', strtotime(auth()->user()->ddn))}}"  placeholder="Ex: 30/07/2016" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-2" > </div>

                            <div class="form-group col-lg-5">
                                    <label>Ville</label>
                                    <select  name="ville_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                        @foreach($villes as $ville)
                                        @if ($ville->id==auth()->user()->ville_id)                                           
                                        <option  selected value="{{ $ville->id}}" >{{$ville->nomVille}} </option>
                                        @endif
                                        @endforeach           
                                    </select>
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Civilite</label>
                                <select name="civilite" class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option ></option>
                                    <option selected value="{{auth()->user()->civilite}}">{{auth()->user()->civilite}}</option>
                                   
                                </select>
                            </div>
                            <div class="form-group col-lg-2" > </div>
                            <div class="form-group col-lg-5">
                                <label>Adresse</label>
                                <input disabled type="text" class="form-control" name="adresse" value="{{auth()->user()->adresse}}" required>
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Telephone</label>
                                <input disabled type="tel" class="form-control" name="telephone" value="{{auth()->user()->telephone}}" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="description">Biographie </label>                       
                                <textarea disabled class="form-control" placeholder="Bio"  name="Description" style="margin-top: 0px; margin-bottom: 0px; height: 121px;" aria-label="With textarea" >{{auth()->user()->Description}}</textarea>
                                
                            </div>
                            <div class="form-group col-lg-4">

                            </div>

                            <div class="form-group col-lg-2 mt-5">


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
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>

<script src="{{ asset('assets/js/theme.js')}}"></script>
@endsection