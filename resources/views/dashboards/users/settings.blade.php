@extends('layouts.stagiaire')
<link rel="stylesheet" href="{{ asset('assets/css/editprofile.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

@section('content')    


<div class="container-fluid">            
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card pb-2">
                <div class="header">
                    <h2>  Modifier Information Personnel </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card  pb-2">
                <div class="header ">
                    <form action="{{route('user.update',auth()->user()->id)}}"  enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file'  name="photoUser" id="imageUpload"  accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
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
                                <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}" required>
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-2" > </div>
                            <div class="form-group col-lg-5">
                                <label>Prenom</label>
                                <input type="text" class="form-control" name="prenom" value="{{auth()->user()->prenom}}" required>
                                @error('prenom')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="demo-masked-input col-lg-5" >
                                <div class="form-group row clearfix">
                                    <div class="col-lg-12">
                                        <label>Date de naissance </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
                                            </div>
                                            <input type="text" class="form-control date" name="ddn" value="{{date('d-m-Y', strtotime(auth()->user()->ddn))}}"  placeholder="Ex: 30/07/2016" required>
                                            @error('ddn')
                                               <strong class="col-lg-12">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-2" > </div>

                            <div class="form-group col-lg-5">
                                    <label>Ville</label>
                                    <select  name="ville_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                        <option></option>
                                        @foreach($villes as $ville)
                                        <option value="{{ $ville->id}}" @if ($ville->id==auth()->user()->ville_id)
                                            selected                                            
                                        @endif>{{$ville->nomVille}} </option>

                                        @endforeach           
                                     
                                    </select>
                                @error('ville_id')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Civilite</label>
                                <select name="civilite" class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option ></option>
                                    <option  @if ('homme'==auth()->user()->civilite)
                                        selected                                            
                                    @endif value="homme">Homme</option>
                                    <option   @if ('femme'==auth()->user()->civilite)
                                    selected                                            
                                @endif value="femme">Femme</option>
                                </select>
                                @error('civilite')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-2" > </div>

                            <div class="form-group col-lg-5">
                                <label>Adresse</label>
                                <input type="text" class="form-control" name="adresse" value="{{auth()->user()->adresse}}" required>
                                @error('adresse')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Telephone</label>
                                <input type="tel" class="form-control" name="telephone" value="{{auth()->user()->telephone}}" required>
                                @error('telephone')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="description">Biographie </label>                       
                                <textarea class="form-control" placeholder="Bio"  name="Description" style="margin-top: 0px; margin-bottom: 0px; height: 121px;" aria-label="With textarea" > {{auth()->user()->Description}} </textarea>
                                
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

@section('footer-scripts')

<script>
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview').hide();
              $('#imagePreview').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  $("#imageUpload").change(function() {
      readURL(this);
  });
  </script>
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>

<script src="{{ asset('assets/js/theme.js')}}"></script>
@endsection