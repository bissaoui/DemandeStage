@extends('layouts.admin') 

<link rel="stylesheet" href="{{ asset('assets/css/editprofile.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
<style>
    .infoPersonnel{
        background-color: #3e3f43;
        padding-bottom: 30px; 
    }

    .black{
        color:#525252;
    }

    .white{
        color: white !important;
    }
    
    .infoPersonnel .name{
        
        color: white;
        width: 200px;
        font-size: 21px;
        padding-left: 10px;
    
    }

    .imagePreview{
        
        height: 130px;
        background-size: cover;
        width: 130px;
        border-radius: 100px;
    
    }
    .center {

        margin: auto;
        width: 170px;
        padding: 10px;

    }
    .font-w1{

        font-weight: 700;
    }
    .font-w5{
        font-weight: 100;
    }
    .school{
        font-size: unset;
        font-weight: 700;
    }
</style>
@section('content')    


<div class="container-fluid">            
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class=" pb-2">
               
                <div class="row">
                    <div class=" col-lg-1">
                    </div>
                <div class="infoPersonnel col-lg-3">
                    <div class="name m-auto pt-3"> {{$infoUser[0]->name}}  {{$infoUser[0]->prenom}} </div>

                    <div class="center">
                        <div class="imagePreview" style="background-image: url(/storage/Pictures/Profile/{{ $infoUser[0]->photoUser }});">    </div>
                    </div>
                    <div class="white font-w1 pt-1"> <span> <i class="fa fa-phone"></i></span> Telephone :</div>
                    <div class="white font-w5"> {{$infoUser[0]->telephone}} </div>
                    <div class="white font-w1 pt-1"><span> <i class="fa fa-map-marker"></i></span> Adresse :  </div>
                    <div class="white font-w5"> {{$infoUser[0]->adresse}}  </div>
                    <div class="white font-w1 pt-1"><span> <i class="ti-email"></i></span> Email :  </div>
                    <div class="white font-w5"> {{$infoUser[0]->email}} </div>
                    <div class="white font-w1 pt-1"><span> <i class="fa fa-calendar"></i></span> Date de naissance : </div>
                    <div class="white font-w5"> {{$infoUser[0]->ddn}} </div>
                    <div class="white mt-3 ">
                        <h4 class="white" style="border-bottom: solid;" >Description</h4>
                    </div>
                    <div class="white font-w5"> 
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Rem ea totam dolorem beatae corrupti magni repudiandae saepe quam velit placeat quod dignissimos quae, 
                        ab ad sed voluptates, aperiam commodi aliquam. 
                    </div>
                    <div class="white mt-3 ">
                        <h4 class="white" style="border-bottom: solid;" >Langues</h4>
                    </div>
                    @foreach ($langUser as $item)
                        
                  
                    <div class="white font-w5 pt-1">
                         <div style="width: 80px !important; display: inline-block;"> {{$item->nomLangue}} : </div>

                         @for ($i = 0; $i < $item->niveauLangue; $i++)
                         <img src="{{asset('assets/icons/etoile.png')}}" class="ml-2" width="15" alt="">
                         @endfor
                         @for ($i = $item->niveauLangue; $i < 5; $i++)
                         <img src="{{asset('assets/icons/star.png')}}" class="ml-2" width="15" alt="">
                         @endfor
                          
                    </div>
                    @endforeach

                    <div class="white mt-3 ">
                        <h4 class="white" style="border-bottom: solid;" >Social Media</h4>
                    </div>
                    @foreach ($resUser as $item)

                    <div class="white font-w5 pt-1"> <img src="{{asset('storage/Pictures/Reseau/' . $item->photoReseau)}}" class="ml-2" width="15" alt=""> : {{ $item->username}}</div>

                    @endforeach

                </div>
                <div class="col-lg-6 bg-white">
                    <div class="mt-3 ">
                        <h2 style=" color: #525252; border-bottom: solid; font-size: x-large;" >Education</h2>
                    </div>

                    @foreach ($formUsers as $item)
                        
                    
                    <div class="black school pt-1 ml-4"> <li>  {{$item->nomEcoleComplet}} | {{ date('Y',strtotime($item->dateDebut))}} - {{ date('Y',strtotime($item->dateFin)) }}</li></div>
                    <div class="black font-w5 ml-5"> {{$item->abreviation}} , {{$item->filiere}}   </div>
                    @endforeach
                    
                    <div class="mt-3 ">
                        <h2 style=" color: #525252; border-bottom: solid; font-size: x-large;" >Experience</h2>
                    </div>

                    @foreach ($expeUser as $item)
                        
                        <div class="black school pt-1 ml-4">  {{$item->entreprise}}  {{$item->dateDebutEx}} | {{$item->dateFinEx}} </div>
                        <div class="black font-w5 ml-5"> Poste : {{$item->fonction}} </div>
                        <div class="black font-w5 ml-5"> Mission : {{$item->tache}}  </div>

                    @endforeach

                    <div class="mt-3 mb-5">
                        <h2 style=" color: #525252; border-bottom: solid; font-size: x-large;" >Competence</h2>
                    </div>
                <div class="w-50 m-auto">
                    @foreach ($Competence as $item)
                    <div class="black school pt-2  m-auto ">
                       
                        <div style="width: 140px !important; display: inline-block;"><img src="{{asset('storage/Pictures/Technologie/' . $item->photoTechnologie)}}" class="ml-2" width="35" alt="">  {{$item->nomTechnologie}} : </div>
                        @for ($i = 0; $i < $item->niveauCompetence; $i++)
                         <img src="{{asset('assets/icons/etoile.png')}}" class="ml-2" width="15" alt="">
                         @endfor
                         @for ($i = $item->niveauCompetence; $i < 5; $i++)
                         <img src="{{asset('assets/icons/star.png')}}" class="ml-2" width="15" alt="">
                         @endfor
                       
                        @endforeach
                    </div>
                </div>
                </div>
               
            </div>
            </div>
            
        </div>
    </div>
    
</div>

@endsection

@section('footer-scripts')
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>

<script src="{{ asset('assets/js/theme.js')}}"></script>
@endsection
