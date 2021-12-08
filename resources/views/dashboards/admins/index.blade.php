@extends('layouts.admin')

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
<div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Line Chart</h2>
                </div>
                <div class="body">
                    <div id="line-chart" class="ct-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Bar Chart</h2>
                </div>
                <div class="body">
                    <div id="bar-chart" class="ct-chart"></div>
                </div>
            </div>
        </div>
       
    </div> 
</div>
@endsection

@section('style')
    
<link rel="stylesheet" href="{{asset('assets/vendor/fontawesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}">   
@endsection
@section('footer-scripts')
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/bundles/chartist.bundle.js')}}"></script>

<script src="{{ asset('assets/js/theme.js')}}"></script>
<script src="{{ asset('assets/js/pages/charts/chartjs.js')}}"></script>
@endsection
