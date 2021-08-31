@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">

@section('content')   
<div class="container-fluid">            

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Exportable</strong> Examples </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Date naissance</th>
                                <th>Telephone</th>
                                <th>Ville</th>
                                <th>Date d'inscription</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Date naissance</th>
                                <th>Telephone</th>
                                <th>Ville</th>
                                <th>Date d'inscription</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                               
                                <td> @if (isset($user->photoUser)) 
                                    <img class="avatar w40" src="{{asset('storage/Pictures/Profile/' .$user->photoUser)}}" alt="">
                                    @else
                                    <img class="avatar w40" src="{{asset('storage/Pictures/Profile/images.png')}}" alt="">

                                    @endif{{$user->name}} {{$user->prenom}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->ddn}}</td>
                                <td>{{$user->telephone}}</td>
                                <td>{{$user->ville->nomVille}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>

                                <td>
                                     <form action="{{url ('admin/userDelete/'. $user->id) }}" method="POST"> 
                                        @method('DELETE')
                                        @csrf()
                                        <button  type="submit" style="padding=0.35rem 2.5rem;" class="btn btn-danger btn-4x"><i class="fa fa-trash-o  fa-lg"></i></button>
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