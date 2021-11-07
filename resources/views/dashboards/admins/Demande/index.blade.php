@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">



@section('content')   
<div class="container-fluid">            

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            
            <div class="header">
                <h2><strong>List des</strong> Demandes </h2>
              
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th >Stagiaire</th>
                                <th >Ecole</th>
                                <th >Type de stage</th>
                                <th >duree</th>
                                <th >Statut</th>
                                <th class="w-25">Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th >Stagiaire</th>
                                <th >Ecole</th>
                                <th >Type de stage</th>
                                <th >duree</th>
                                <th >Statut</th>
                                <th class="w-25">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($dmds as $dmd)
                                
                           
                            <tr>
                                <td> @if (isset($dmd->photoUser)) 
                                    <img class="avatar w40" src="{{asset('storage/Pictures/Profile/' .$dmd->photoUser)}}" alt="">
                                    @else
                                    <img class="avatar w40" src="{{asset('storage/Pictures/Profile/images.png')}}" alt="">
                                    @endif{{$dmd->name}} {{$dmd->prenom}}
                                </td>
                                <td>{{$dmd->nomEcole}}</td>
                                <td>{{$dmd->type}}</td>
                                <td>{{$dmd->duree}}</td>
                                <td>
                                  @if ($dmd->statut==0)
                                      en attende
                                  @else @if ($dmd->statut==1)
                                      
                                      <img width="40" height="40" src="{{asset('assets/icons/check.png')}}" alt=""> 
                                      accepte
                                  @else
                                  
                                  <img width="40" height="40" src="{{asset('assets/icons/remove.png')}}" alt=""> 
                                  refuse
                                  @endif  
                                  @endif
                                </td>
                                <td>
                                    @if ($dmd->statut==0)
                                        
                                <form class="d-inline" action="{{route('demande.refuse',$dmd->id)}}" method="GET"> 
                                    @csrf()
                                    <button  type="submit" class="btn btn-danger inline">Refuse</button>
                                </form> 
                                <form  class="d-inline"  action="{{route('demande.accepte',$dmd->id)}}" method="GET"> 
                                    @csrf()
                                    <button  type="submit" class="btn btn-success inline" >Accepte</button>
                                </form>
                               
                                @else @if ($dmd->statut==1)
                                    
                                     
                                <form class="d-inline" action="{{route('demande.refuse',$dmd->id)}}" method="GET"> 
                                    @csrf()
                                    <button  type="submit" class="btn btn-danger inline">Refuse</button>
                                </form> 
            
                                @else
                                <form  class="d-inline"  action="{{route('demande.accepte',$dmd->id)}}" method="GET"> 
                                    @csrf()
                                    <button  type="submit" class="btn btn-success inline" >Accepte</button>
                                </form>
                                @endif  
                                @endif
                                <form  class="d-inline"  action="{{route('cv.index',$dmd->user_id)}}" method="GET"> 
                                    @csrf()
                                    <button  type="submit" class="btn btn-warning inline">Afficher Stagiaire</button>
                                </form>
                                </td>
                                    
                        

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
</div>

@endsection

@section('footer-scripts')
    
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>

@endsection