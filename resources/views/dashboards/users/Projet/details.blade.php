@extends('layouts.stagiaire')

@section('content')

<div class="container-fluid">
    <h1>Détails de projet</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body ml-5 ">
                    <div class="col-lg-12 text-right  "> <a href="{{route('projet.info',$prj->id)}}"><i class="body p-0 mr-3 float-end  fa fa-gear " ></i></a></div>
                    <div class="row">
                    <h5>Nom de projet :</h5><p class="ml-2">{{$prj->nomProjet}}</p>
                    </div>
                    <div class="row">
                    <h5>Etat de projet :</h5><p class="ml-2">{{$prj->etatProjet}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 ">
            <div class="card tasks_report pb-4">
                    <div class="header">
                        <h5>Technologies</h5><a href="{{route('projet.techno',$prj->id)}}"><i class="body p-0 mr-3 float-end  fa fa-gear " ></i></a>
                    </div>               
                    @foreach ($techs as $i)
                        <div class="body d-inline-flex justify-content-start align-items-center p-1  ml-5">
                            <img class="rounded-circle mr-4" width="50" height="50" src="{{asset('storage/Pictures/Technologie/'.$i->photoTechnologie)}}" alt="">
                            <p class="displayblock mb-0">{{$i->nomTechnologie}}</p>
                        </div>
                    @endforeach
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <div class="card tasks_report">
                <div class="header">
                    <h5>Temps</h5><a href="{{route('projet.Date',$prj->id)}}"><i class="body p-0 mr-3 float-end  fa fa-gear  fa-spin" ></i></a>
                </div>
                <div class="body">
                    <div class="row">
                        <h5 class=" ml-5">Date Debut :</h5><p class="ml-2">{{$prj->dateDebutPr}}</p>
                        </div>
                        <div class="row">
                        <h5 class=" ml-5">Date Fin :</h5><p class="ml-2">{{$prj->dateFinPr}}</p>
                        </div>
                        @if (((strtotime($prj->dateFinPr) - strtotime(now()))/3600/24)>0)
                        <input type="text" class="knob" value="{{floor(100-(((floor(abs(strtotime($prj->dateFinPr) - strtotime(now()))/3600/24))*100)/(floor (abs(strtotime($prj->dateFinPr) - strtotime($prj->dateDebutPr))/3600/24))))}}" data-width="50" data-height="50" data-thickness="0.1" data-fgColor="#26dad2" readonly>
                        <p class="displayblock m-b-0"> {{floor(100-(((floor(abs(strtotime($prj->dateFinPr) - strtotime(now()))/3600/24))*100)/(floor (abs(strtotime($prj->dateFinPr) - strtotime($prj->dateDebutPr))/3600/24))))}} % Avancement <i class="fa fa-trending-up"></i></p>    
                        @else
                        <input type="text" class="knob" value="100" data-width="50" data-height="50" data-thickness="0.1" data-fgColor="#26dad2" readonly>
                        <p class="displayblock m-b-0"> 100 % Avancement <i class="fa fa-trending-up"></i></p>
                   
                        @endif
                    </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 text-center ">
            <div class="card tasks_report pb-4">
                <div class="header">
                    <h5>Equipe</h5><a href="{{route('projet.equipe',$prj->id)}}"><i class="body p-0 mr-3 float-end  fa fa-gear " ></i></a>
                </div>
                @foreach ($users as $u)

                <div class="body d-inline-flex justify-content-start align-items-center p-1  ml-5">
                    <img class=" border border-success rounded-circle mr-4 " width="50" height="50" src="{{asset('storage/Pictures/Profile/'.$u->photoUser )}}" alt="">
                    <p class="displayblock m-b-0">{{$u->name}} {{$u->prenom}} </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer-scripts')
<script src="{{ asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>
<script src="{{ asset('assets/js/pages/widgets.js')}}"></script>
@endsection
