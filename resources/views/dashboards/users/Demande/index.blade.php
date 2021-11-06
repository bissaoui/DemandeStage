@extends('layouts.stagiaire')
@section('content')
<div class="container-fluid">            

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Mes demandes</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Demande</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dmds as $dmd)
                                    <tr>
                                        <td>{{$dmd->type}}</td>
                                        @if($dmd->statut==2)
                                        <td>refusee</td>
                                        @elseif($dmd->statut==1)
                                        <td>acceptee</td>
                                        @else
                                        <td>En attente</td>
                                        @endif
                                        <td>
                                            <a  href="{{route('demande_Stage.show',$dmd->id)}}" class="btn btn-outline-success float-left" style="margin-left:4px"><i  class="fa fa-info-circle"></i></a>
                                            @if($dmd->statut==0)
                                            <a href="{{route('demande_Stage.edit',$dmd->id)}}" class="btn btn-outline-warning float-left" style="margin-left:4px"><i  class="fa fa-edit"></i></a>
                                            <form action="{{route('demande_Stage.destroy',$dmd->id)}}" method="post" class="float-left">
                                                @method('DELETE')
                                                @csrf()
                                                <button class="btn btn-outline-danger" style="margin-left:4px"><i  class="fa fa-trash"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                     </table>
                    </div>
                    <a href="{{route('demande_Stage.create')}}" class="btn btn-primary" >Ajouter</a>

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
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>

@endsection
