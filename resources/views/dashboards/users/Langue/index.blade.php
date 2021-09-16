@extends('layouts.stagiaire')
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<style>
    .rating-row ul{list-style:none;display:flex; padding:0 ; margin:0;}
    .rating-row ul li{color:#ffc107;font-size:20px;margin:0px 3px;}
</style>
@section('content')   
<div class="container-fluid">            
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            
            <div class="header">
                <h2><strong>List des</strong> Reseaux sociaux </h2>
                <div class="">
                    <form class="d-inline" action="{{route('reseau.create')}}" > 
                        <button class="btn btn-primary  btn-animated btn-animated-y">
                            <span class="btn-inner--visible">Ajouter un Reseau social</span>
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
                                <th class="w-25" >Langue </th>
                                <th class="w-25" >Niveau </th>
                                <th class="w-25">Action </th>



                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Langue</th>
                                <th>Niveau</th>
                                <th >Action </th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $res)                           
                            <tr>
                                <td> 
                                    {{$res->nomLangue}}
                                </td>
                                 <td>
                                    <div class="rating-row">
                                        <ul>   
                                            @for ($i = 0; $i <$res->niveauLangue; $i++)
                                                <li class=""><i class="fa fa-star"></i></li>
                                            @endfor
                                            @for ($i = 1; $i <= 5-$res->niveauLangue; $i++)
                                            <li style="color:#9a9a9a;" class=""><i class="fa fa-star"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                 </td>
                                <td>
                                    <form  class="d-inline"  action="{{Route ('langue.update/'.$res->id.'/edit')}}" method="get"> 
                                        <button  type="submit" class="btn btn-warning inline">Modifier</button>
                                    </form>
                                     <form class="d-inline" action="{{Route ('langue.destroy', $res->id)}}" method="POST"> 
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