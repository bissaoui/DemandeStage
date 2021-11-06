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
  <form action="{{route('demande_Stage.update',$dmd->id)}}" method="post">
    @csrf()
    @method('put')
        <div class="form-group">
            <label for="type">Type de stage</label>
            <select class="form-control show-tick ms select2 " id="type"   data-placeholder="Select" name="type"   data-placeholder="Select">
            
              <option value="Stage d’observation ou d’initiation"@if ($dmd->type=="Stage d’observation ou d’initiation") selected @endif >Stage d’observation ou d’initiation</option>
              <option value="Stage d’application" @if ($dmd->type=="Stage d’application")selected @endif>Stage d’application</option>
              <option value="Stage de fin d’études" @if ($dmd->type=="Stage de fin d’études") selected @endif>Stage de fin d’études</option>
             
            </select>                       
         </div>
         <div class="form-group">
          <label for="type">Ecole</label>
          <select class="form-control show-tick ms select2 " id="Ecole"  data-placeholder="Select" name="ecole_id"   data-placeholder="Select">
              @foreach ($ecoles as $ecole)
              @if($ecole->id== $dmd->ecole_id)
                <option value="{{$ecole->id}} "selected >{{$ecole->nomEcole}}</option>
        
              @else
                <option value="{{$ecole->id}} "  >{{$ecole->nomEcole}}</option>
                  
              @endif

              @endforeach
          </select>
      </div>
         <div class="form-group">
          <label for="dd">Date de debut</label>
          <div class="input-group">
          <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
          </div>
            <input type="text" class="form-control date"  name="dateDebutDemande" value="{{$dmd->dateDebutDemande}}"  placeholder="Ex: 2020-12-22" required>
            @error('dateDebutDemande')
            <strong>la date n'est pas valide </strong>
        @enderror
          </div>
        </div>
    
        <div class="form-group">
          <label for="">Duree de stage</label>
          <input type="text" name="duree" id=""  value="{{$dmd->duree}}" class="form-control" required>
          @error('duree')
          <strong>{{ $message }}</strong>
      @enderror
        </div>
    
        <div class="form-group">
          <label for="dmd">Lettre de motivation</label>                       
          <textarea class="form-control" rows="10"  name="demande" aria-label="With textarea" required>{{$dmd->demande}}</textarea>
          @error('demande')
          <strong>{{ $message }}</strong>
      @enderror             
          </div>
        
        <div class="form-group">
          <button class="btn btn-outline-warning">Modifier</button>

        </div>
      </div>
    </form>
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
