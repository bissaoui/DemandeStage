@extends('layouts.stagiaire')
@section('content')

<div class="container-fluid">            

  <div class="row clearfix">
      <div class="col-lg-12">
          <div class="card">
<div class="header">
    <h2>Ajouter une demande de stage</h2>
</div>
<div class="body">
    <form action="{{route('demande_Stage.store')}}" method="post">
        @csrf()
        <div class="form-group">
            <label for="type">Type de stage</label>
            <select class="form-control show-tick ms select2 " id="type"  data-placeholder="Select" name="type"   data-placeholder="Select">
              <option value="Stage d’observation ou d’initiation">Stage d’observation ou d’initiation</option>
              <option value="Stage d’application">Stage d’application</option>
              <option value="Stage de fin d’études">Stage de fin d’études</option>
            </select>                       
         </div>
         <div class="form-group">
          <label for="type">Ecole</label>
          <select class="form-control show-tick ms select2 " id="Ecole"  data-placeholder="Select" name="ecole_id"   data-placeholder="Select">
              @foreach ($ecoles as $ecole)
              <option value="{{$ecole->id}}">{{$ecole->nomEcole}}</option>
              @endforeach
          </select>
      </div>
         <div class="form-group">
          <label for="dd">Date de debut</label>
          <div class="input-group">
          <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
          </div>
            <input type="text" class="form-control date" name="dateDebutDemande" value="{{old('dateDebutDemande')}}"   placeholder="Ex: 2020/07/02" required>
           
          </div>
          @error('dateDebutDemande')
          <strong> la date n'est pas valide</strong>
      @enderror
        </div>
    
        <div class="form-group">
          <label for="">Duree de stage</label>
          <input type="text" name="duree" id="" value="{{old('duree')}}"  class="form-control" required>
          @error('duree')
          <strong>{{ $message }}</strong>
      @enderror
       </div>
    
        <div class="form-group">
          <label for="dmd">Lettre de motivation</label>                       
          <textarea class="form-control" value="{{old('demande')}}"  rows="10" name="demande" aria-label="With textarea" required></textarea>
          @error('demande')
          <strong>{{ $message }}</strong>
      @enderror                     
          </div>
        
        <div class="form-group">
          <button class="btn btn-outline-primary">Envoyer</button>
        </div>
    </form>
</div>
          </div>
      </div>
  </div>
</div>
@endsection


@section('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endsection

@section('scripts')

<script src="../assets/js/theme.js"></script><!-- Custom Js -->
<script src="../assets/js/pages/tables/jquery-datatable.js"></script>
@endsection
