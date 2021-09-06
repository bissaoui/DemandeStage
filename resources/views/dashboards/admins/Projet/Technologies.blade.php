@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

@section('content')

<div class="container-fluid">
    <div class="row">        

    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <h3>Liste Technologie :</h3> 
            </div>
        </div>
    </div>
    </div>
    <div class="row">        
        @foreach ($usedTechs as $i)
            <div class="col-lg-6">
                <div class="card">
                    <div class="body">
                        <div class="body col-lg-11 col-md-11 col-sm-11 col-11   d-inline-flex justify-content-between align-items-center p-1  ml-5">
                            <div>
                                <img class="rounded-circle mr-4" width="50" height="50" src="{{asset('storage/Pictures/Technologie/'.$i->photoTechnologie)}}" alt="">
                                <p class="displayblock mb-0">{{$i->nomTechnologie}}</p>
                            </div>
                            <form class="" action="{{route('projet.techs.delete',[$id,$i->id])}}" method="POST"> 
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
                    <form action="{{route('projet.storeTech',$id)}}" method="post">
                        @csrf
                        <p>Technologies </p>
                        <select class="form-control show-tick ms select2"  name="Technologies[]"  multiple data-placeholder="Select">
                            <option></option>
                            @foreach ($notUsedTechs as $tech)
                                <option value="{{$tech->id}}">{{$tech->nomTechnologie}}</option>
                            @endforeach
                        </select>
                        @error('Technologies')
                            <strong>{{ $message }}</strong>
                        @enderror
                </div>
                <button type="submit" class="btn btn-inline ml-auto mr-3  btn-primary" href="">Ajouter</button>
            </form>
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