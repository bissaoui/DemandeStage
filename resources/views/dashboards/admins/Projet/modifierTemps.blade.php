@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1>Détails de projet</h1>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{url('admin/projet/'.$prj->id.'/Date')}}"  method="post">
                <div class="card">
                    <div class="body ">
                        @csrf
                        @method('put')
                        <div class="demo-masked-input">
                            <div class="form-group row clearfix">
                                <div class="col-lg-12">
                                    <b>Date debut de projet </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
                                        </div>
                                        <input type="text" class="form-control date" name="dateDebutPr" value="{{date('d-m-Y', strtotime($prj->dateDebutPr))}}" placeholder="Ex: 30/07/2016" required>
                                        @error('dateDebutPr')
                                           <strong class="col-lg-12">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="demo-masked-input">
                            <div class="form-group row clearfix">
                                <div class="col-lg-12">
                                    <b>Date Fin de projet </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
                                        </div>
                                        <input type="text" class="form-control date" name="dateFinPr" value="{{date('d-m-Y', strtotime($prj->dateFinPr))}}" placeholder="Ex: 30/07/2016" required>
                                        @error('dateFinPr')
                                           <strong class="col-lg-12" >{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-inline ml-auto mr-3  btn-danger" href="{{route('projet.show',$prj->id)}}"> <i class="fa fa-angle-left " ></i> Retour</a>

                <button type="submit" class="btn btn-inline ml-auto mr-3  btn-warning">Modifier</button>
            </form>
        </div>
    </div>
</div>
@endsection


@section('footer-scripts')
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>

@endsection