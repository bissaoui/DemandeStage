@extends('layouts.stagiaire')

@section('content')    


<div class="container-fluid">            
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card pb-2">
                <div class="header">
                    <h2>  Changer le mot de passe </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card  pb-2">  
                <div class="header mx-auto ">
                  
                    <form action="{{route('user.update',auth()->user()->id)}}"  method="post">
                        @csrf
                        @method('put')
                        
                        <div class="body  row   " >
                            <div class="form-group  col-lg-12">
                                <label>Actuel</label>
                                <input type="password" class="form-control" name="name" required>
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Nouveau</label>
                                <input type="password" class="form-control" name="prenom"  required>
                                @error('prenom')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                           
                            <div class="form-group col-lg-12">
                                <label>Confirmer</label>
                                <input type="password" class="form-control" name="adresse"  required>
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                           

                            <div class="form-group col-lg-12 ">

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