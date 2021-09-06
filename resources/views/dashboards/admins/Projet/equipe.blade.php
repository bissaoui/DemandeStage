@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

@section('content')

<div class="container-fluid">
    <div class="row">        

    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <h3>Equipe :</h3> 
            </div>
        </div>
    </div>
    </div>
    <div class="row">        
        @foreach ($equipe as $i)
            <div class="col-lg-6">
                <div class="card">
                    <div class="body">
                        <div class=" col-lg-11 col-md-11 col-sm-11 col-11   d-inline-flex justify-content-between align-items-center p-1  ml-3">
                            <div class="row">
                            <div class=" col-12 col-lg-5 col-md-5 col-sm-5">
                                <img class="rounded-circle" width="70" height="70" src="{{asset('storage/Pictures/Profile/'.$i->photoUser)}}" alt="">
                            </div>
                            <div class="mt-3 col-12 col-lg-7 col-md-7 col-sm-7">                           
                                <h5 class="d-inline">{{$i->prenom}} {{$i->name}}</h5>
                            </div>
                        </div>
                            <form class="" action="{{route('projet.equipe.delete',[$id,$i->id])}}" method="POST"> 
                                @method('DELETE')
                                @csrf()
                                <button  type="submit" class="btn btn-inline btn-danger mr-2 ">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-lg-6">
            <div class="card pb-4">
                <div class="body">
                    <form action="{{route('projet.storeUser',$id)}}" method="post">
                        @csrf
                    <div class="row">   
                        <p class="col-lg-3 col-md-2 col-sm-3 col-3 mt-2" >Stagiaire </p>
                        <select class="col-lg-5 col-md-6 col-sm-8 col-8 mt-1 ml-2 form-control show-tick ms select2"  name="Users[]"  multiple data-placeholder="Select">
                            <option></option>
                            @foreach ($users as $tech)
                                <option value="{{$tech->id}}">{{$tech->name}} {{$tech->prenom}}</option>
                            @endforeach
                        </select>
                        @error('Users')
                            <strong>{{ $message }}</strong>
                        @enderror
                
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <button type="submit" class="btn btn-inline mt-1 float-right btn-primary">Ajouter</button>
                </div>
            </div> 

            </form>
            </div>
        </div>  
   
    </div>

</div>
<a class="btn btn-inline ml-auto mr-3  btn-danger" href="{{route('projet.show',$id)}}">Retour</a>
</div>

@endsection

@section('footer-scripts')
<script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>
@endsection