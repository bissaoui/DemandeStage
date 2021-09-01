@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1>Détails de projet</h1>
    <div class="row clearfix">
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body ml-5">
                        <div class="row">
                        <h5>Nom de projet :</h5><p class="ml-2">Fill Rouge</p>
                        </div>
                        <div class="row">
                        <h5>Etat de projet :</h5><p class="ml-2">Fini</p>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-lg-4 col-md-6 col-sm-12 text-center ">
            <div class="card tasks_report pb-4">
                <div class="header">
                    <h5>Technologies</h5>
                </div>
                <div class="body d-lg-inline-flex justify-content-start align-items-center p-1  ml-5">
                    <img class=" border border-primary rounded-circle mr-4 p-1" width="50" height="50" src="{{asset('storage/Pictures/Technologie/js.png')}}" alt="">
                    <p class="displayblock m-b-0">Java Script </p>
                </div>
                <div class="body d-lg-inline-flex justify-content-start align-items-center p-1  ml-5">
                    <img class=" border border-primary rounded-circle mr-4 p-1" width="50" height="50" src="{{asset('storage/Pictures/Technologie/html.png')}}" alt="">
                    <p class="displayblock m-b-0">HTML 5 </p>
                </div>
                <div class="body d-lg-inline-flex justify-content-start align-items-center p-1  ml-5">
                    <img class=" border border-primary rounded-circle mr-4 p-1" width="50" height="50" src="{{asset('storage/Pictures/Technologie/css.png')}}" alt="">
                    <p class="displayblock m-b-0">CSS 3 </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 text-center ">
            <div class="card tasks_report pb-4">
                <div class="header">
                    <h5>Equipe</h5>
                </div>
                <div class="body d-lg-inline-flex justify-content-start align-items-center p-1  ml-5">
                    <img class=" border border-success rounded-circle mr-4 p-1" width="50" height="50" src="{{asset('storage/Pictures/Profile/12.jpg')}}" alt="">
                    <p class="displayblock m-b-0">Bissaoui Yassine </p>
                </div>
                <div class="body d-lg-inline-flex justify-content-start align-items-center p-1  ml-5">
                    <img class=" border border-success rounded-circle mr-4 p-1" width="50" height="50" src="{{asset('storage/Pictures/Profile/13.jpg')}}" alt="">
                    <p class="displayblock m-b-0">Moussatef Othman </p>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center">
            <div class="card tasks_report">
                <div class="body">
                    <input type="text" class="knob" value="66" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#26dad2" readonly>                        
                    <h6 class="m-t-20">Satisfaction Rate</h6>
                    <p class="displayblock m-b-0">47% Average <i class="fa fa-trending-up"></i></p>                        
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <div class="card tasks_report">
                <div class="body">
                    <h6 class="m-t-20">Satisfaction Rate</h6>
                    <p class="displayblock m-b-0">47% Average <i class="fa fa-trending-up"></i></p>
                </div>
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