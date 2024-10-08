@extends('layouts.stagiaire')
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

<style>
    #previewImg{
        width: 150px;
        height: 150px;
    }    
    </style>
@section('content')   

<div class="container-fluid">            

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>  Modifier </strong> experience </h2>
                </div>
                <div class="body">
                    <form    action="{{route('experience.update',$id)}}" method="post"  enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Entreprise</label>
                                <input  type="text" class="form-control" name="entreprise"  value="{{$exp->entreprise}}"   required>
                                @error('entreprise')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Fonction</label>
                                <input  type="text" class="form-control" name="fonction" value="{{$exp->fonction}}"  required>
                                @error('fonction')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group  col-lg-6">
                                <label>Date debut</label>
                                <input type="date" class="form-control"  id="date1" value="{{$exp->dateDebutEx}}"  onchange="setTime()"  name="dateDebutEx" required>
                                @error('dateDebutEx')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group  col-lg-6">
                                <label>Date fin</label>
                                <input type="date" class="form-control" id="date2" value="{{$exp->dateFinEx}}"  onfocusout="myFunction()" name="dateFinEx" required>
                                @error('dateFinEx')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Tâches effectuées</label>
                                <textarea  type="text" class="form-control"name="tache" style="margin-top: 0px; margin-bottom: 0px; height: 188px;"  > {{$exp->tache}}</textarea>
                                @error('tache')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Logo  d'Entreprise</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="logoEntreprise" m accept=".png, .jpg, .jpeg" class="custom-file-input" id="inputGroupFile02" onchange="previewFile(this);" >
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                </div>
                                <div>
                                    <img id="previewImg" src="{{asset('storage/Pictures/Entreprise/'.$exp->logoEntreprise)}}" alt="Reseau">
                                </div>
    
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning float-right">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer-scripts')
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>
<script src="{{ asset('assets/js/main.js')}}"></script>

<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
