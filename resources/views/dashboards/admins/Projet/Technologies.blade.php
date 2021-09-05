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
                        <div class="body d-inline-flex justify-content-start align-items-center p-1  ml-5">
                            <img class="rounded-circle mr-4" width="50" height="50" src="{{asset('storage/Pictures/Technologie/'.$i->photoTechnologie)}}" alt="">
                            <p class="displayblock mb-0">{{$i->nomTechnologie}}</p>
                            <form class="" action="{{route('projet.techs.delete',[$id,$i->id])}}" method="POST"> 
                                @method('DELETE')
                                @csrf()
                                <button  type="submit" class="btn btn-inline  ml-5  btn-danger ">Supprimer</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-lg-6">
            <div class="card pb-4">
                <div class="body">
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
                <a class="btn btn-inline ml-auto mr-3  btn-primary" href="">Ajouter</a>
            </div>
        </div>     
    </div>

    <a class="btn btn-inline ml-auto mr-3  btn-danger" href="{{route('projet.show',$id)}}">Annuler</a>

</div>
@endsection

@section('footer-scripts')
<script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>
@endsection