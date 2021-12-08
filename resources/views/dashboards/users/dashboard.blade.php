@extends('layouts.stagiaire')
<style>
    .row {
    display: flex;
    flex-wrap: wrap;
    margin-right: 0px !important; 
     margin-left: 0px !important;
}
</style>

@section('content')    
<div class="row clearfix " style="    margin-right: 0 px !important;">
    <div class="col-lg-12">
        <div class="card pb-2 mt-3">
            <div class="header">
                <h2>  Dashboard User  </h2>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="body">
                <h3 class="mt-0 mb-0">Information Personnel</h3>
                <p class="text-muted">Progression de profile </p>
                <div class="progress">
                    <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                </div>
                <small> Profil : Parfait </small>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="body">
                <h3 class="mt-0 mb-0"> Formations</h3>
                <p class="text-muted">Nombre des formations : 2 </p>
                <div class="progress">
                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="3" style="width: 66%;">66%</div>
                </div>
                <small>Force des Formations : Intermédiaire </small>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="body">
                <h3 class="mt-0 mb-0">Competences</h3>
                <p class="text-muted">Nombre des formations : 6 </p>
                <div class="progress">
                    <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="6" style="width: 100%;">100%</div>
                </div>
                <small>Force des Competences : Avancée </small>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="body">
                <h3 class="mt-0 mb-0"> Experiences </h3>
                <p class="text-muted">nombre des Experiances : 1  </p>
                <div class="progress">
                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="3" style="width: 33%;">33%</div>
                </div>
                <small> Force des Experiences : Faible </small>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
        <div class="card tasks_report">
            <div class="body">
                <div style="display:inline;width:90px;height:90px;"><input type="text" class="knob" value="26" data-width="90" data-height="90" data-thickness="0.1" data-fgcolor="#7b69ec" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(123, 105, 236); padding: 0px; appearance: none;"></div>
                <h6 class="m-t-20">Project Panding</h6>
                <p class="displayblock m-b-0">13% Average <i class="fa fa-trending-down"></i></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
        <div class="card tasks_report">
            <div class="body">
                <div style="display:inline;width:90px;height:90px;"><input type="text" class="knob" value="26" data-width="90" data-height="90" data-thickness="0.1" data-fgcolor="-#38bb56" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font: bold 18px Arial; text-align: center; color: rgb(123, 105, 236); padding: 0px; appearance: none;"></div>
                <h6 class="m-t-20">Project Panding</h6>
                <p class="displayblock m-b-0">13% Average <i class="fa fa-trending-down"></i></p>
            </div>
        </div>
    </div>
    
</div>
@endsection

@section('footer-scripts')
{{-- <script src="{{ asset('assets/bundles/libscripts.bundle.js')}}"></script> --}}

<script src="{{ asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>
<script src="{{ asset('assets/js/pages/widgets.js')}}"></script>
@endsection
