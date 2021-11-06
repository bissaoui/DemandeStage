@extends('layouts.stagiaire')
@section('content')

<div class="container-fluid">            

  <div class="row clearfix">
      <div class="col-lg-12">
          <div class="card">
<div class="header">
    <h2>demande de stage</h2>
</div>
<div class="body">
        <div class="form-group">
            <label for="type">Type de stage</label>
            <select class="form-control show-tick ms select2 " id="type"   data-placeholder="Select" name="type"   data-placeholder="Select">
              <option value="">{{$dmd->type}}</option>
             
            </select>                       
         </div>
         <div class="form-group">
          <label for="type">Ecole</label>
          <select class="form-control show-tick ms select2 " id="Ecole"  data-placeholder="Select" name="ecole_id"   data-placeholder="Select">
              @foreach ($ecoles as $ecole)
              @if($ecole->id== $dmd->ecole_id)
                <option value="{{$ecole->id}}">{{$ecole->nomEcole}}</option>
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
            <input type="text" class="form-control date" disabled name="dateDebutDemande" value="{{$dmd->dateDebutDemande}}"  placeholder="Ex: 2020/07/02" required>
            
          </div>
        </div>
    
        <div class="form-group">
          <label for="">Duree de stage</label>
          <input type="text" name="duree" id="" disabled value="{{$dmd->duree}}" class="form-control" required>
       </div>
    
        <div class="form-group">
          <label for="dmd">Lettre de motivation</label>                       
          <textarea class="form-control" rows="10" disabled name="demande" aria-label="With textarea" required>{{$dmd->demande}}</textarea>
                         
          </div>
        
        <div class="form-group">
          <a href="/user/demande_Stage" class="btn btn-outline-danger">Retour</a>

        </div>
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
