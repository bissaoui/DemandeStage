@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
<div class="header">
    <h2>Liste des absences de {{$date}}</h2>
</div>
<div class="body">
    <div class="table-responsive">
        <table class="table table-striped table-hover js-basic-example dataTable">
           <thead>
                <tr>
                   
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Nom et prenom</th>
                    
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                   
                    <th>ID</th>
                    <th>Profile</th>

                    <th>Nom et prenom</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            
            <tbody>
                
                <tr>
                    @foreach($abss as $abs)
                    <td>{{$abs->user_id}}</td>
                    <td><img class="avatar w40" src="{{asset('storage/Pictures/Profile/' .$abs->photoUser)}}" alt="">

                    <td>{{$abs->name}} {{$abs->prenom}}</td>
                    @if($abs->statut == 0)
                    <td>Absence non justifié</td>
                    @else
                    <td>Absence justifié</td>
                    @endif
                    
                    <td>

                        <form action="{{route('admin.absence.destroy',[$date,$abs->user_id])}}" method="post" class="float-left">
                        @method('DELETE')
                        @csrf()
                        <button class="btn btn-outline-danger" style="margin-left:4px"><i  class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach  
            </tbody>
            
        </table>

    </div>
    <a href="{{route('admin.absence')}}" class="btn btn-primary">Retour</a>
</div>
@endsection


@section('style')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endsection

@section('footer-scripts')

<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
@endsection
