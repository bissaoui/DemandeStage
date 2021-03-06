@extends('layouts.stagiaire')
<link rel="stylesheet" href="{{ asset('assets/css/editprofile.css') }}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

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
            <div class="card  pb-2">
                <div class="header ">
                    <form action="{{route('user.update',auth()->user()->id)}}"  enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="photoUser" id="imageUpload"  accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                @if (isset(auth()->user()->photoUser))
                                <div id="imagePreview" style="  background-image: url(/storage/Pictures/Profile/{{ auth()->user()->photoUser }});">    
                                @else
                                <div id="imagePreview" style="background-image: url(/storage/Pictures/Profile/images.png);">    

                                @endif
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
                                <input type="text" class="form-control" name="prenom" value="{{old('prenom')}}" required>
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
                                            <input type="text" class="form-control date" name="ddn" value="{{date('d-m-Y', strtotime(old('ddn')))}}"  placeholder="Ex: 30/07/2016" required>
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
                                    <select name="ville_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                        <option></option>
                                        @foreach($villes as $ville)
                                        <option value="{{ $ville->id}}" @if ($ville->id==old('ville_id'))
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
                                    <option  @if ('homme'==old('civilite'))
                                        selected                                            
                                    @endif value="homme">Homme</option>
                                    <option   @if ('femme'==old('civilite'))
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
                                <input type="text" class="form-control" name="adresse" value="{{old('adresse')}}" required>
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Telephone</label>
                                <input type="tel" class="form-control" name="telephone" value="{{old('telephone')}}" required>
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