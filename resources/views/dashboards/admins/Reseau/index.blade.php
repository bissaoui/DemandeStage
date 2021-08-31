@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">

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
                    <table class="table table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th >Icon</th>
                                <th >Nom </th>
                                <th class="w-25">Action </th>



                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Icon</th>
                                <th>Nom</th>
                                <th >Action </th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($reseaux as $res)
                                
                           
                            <tr>
                                <td>{{$res->id}}</td>
                                <td> @if (isset($res->photoReseau)) 
                                    <img width="40" height="40" src="{{asset('storage/Pictures/Reseau/' .$res->photoReseau)}}" alt="">
                                    @else
                                    <img width="40" height="40" src="{{asset('storage/Pictures/Technologie/technology.png')}}" alt="">

                                    @endif
                                 </td>
                                <td>{{$res->nomReseau}}</td>

                                <td>
                                    <form  class="d-inline"  action="{{url ('admin/reseau/'.$res->id.'/edit')}}" method="get"> 
                                        <button  type="submit" class="btn btn-warning inline">Modifier</button>
                                    </form>
                                     <form class="d-inline" action="{{url ('admin/reseau/'. $res->id)}}" method="POST"> 
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