@extends('layouts.stagiaire')
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">

@section('content')   
<div class="container-fluid">            

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            
            <div class="header">
                <h2><strong>List des</strong> experiences </h2>
                <div class="">
                    <form class="d-inline" action="{{route('experience.create')}}" > 
                        <button class="btn btn-primary  btn-animated btn-animated-y">
                            <span class="btn-inner--visible">Ajouter une experience</span>
                            <span class="btn-inner--hidden"><i class="fa fa-plus"></i></span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover js-basic-example dataTable ">
                        <thead>
                            <tr>
                                <th>Entreprise </th>
                                <th>Fonction </th>
                                <th>Date Debut </th>
                                <th>Date Fin </th>
                                <th class="w-25">Action </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Entreprise</th>
                                <th>Fonction</th>
                                <th>Date Debut </th>  
                                <th>Date Fin </th>
                                <th>Action </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $res)
                            <tr>
                                <td> <img width="40" height="40" src="{{asset('storage/Pictures/Entreprise/' .$res->logoEntreprise)}}" alt=""> 
                                    {{$res->entreprise}}
                                </td>
                                <td> 
                                    {{$res->fonction}}
                                 </td>
                                 <td> 
                                    {{$res->dateDebutEx}}

                                 </td>
                                 <td> 
                                    {{$res->dateFinEx}}

                                 </td>
                                <td>
                                    <form  class="d-inline"  action="{{Route ('experience.edit',$res->id )}}" method="get"> 
                                        <button  type="submit" class="btn btn-warning inline">Modifier</button>
                                    </form>
                                     <form class="d-inline" action="{{Route ('experience.destroy', $res->id)}}" method="POST"> 
                                        @method('DELETE')
                                        @csrf()
                                        <button  type="submit" class="btn btn-danger inline">Supprimer</button>
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