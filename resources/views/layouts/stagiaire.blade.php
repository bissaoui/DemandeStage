<!DOCTYPE html>
<html lang="en">
<head>
     
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Webpixels">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Dashboard User</title>
<link rel="stylesheet" href="{{ asset('assets/vendor/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/vendor/charts-c3/plugin.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/css/main.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/dark.css')}}" type="text/css">
</head>
<body class="theme-black full-dark">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ asset('assets/images/brand/icon_black.svg')}}" width="48" height="48" alt="ArrOw"></div>
        <p>Please wait...</p>
    </div>
</div>
<nav class="navbar custom-navbar navbar-expand-lg py-2">
    <div class="container-fluid px-0">
        <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
        <a href="{{route('user.dashboard')}}" class="navbar-brand"><img src="{{ asset('assets/images/brand/icon.svg')}}" alt="BigBucket" /> <strong>Internship </strong></a>
        <div id="navbar_main">
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="dropdown-header">User menu</h6>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-user text-primary"></i>My Profile</a>
                        <a class="dropdown-item" href="{{route('user.settings')}}"><i class="fa fa-cog text-primary"></i>Settings</a>
                        <div class="dropdown-divider" role="presentation"></div>
                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                            @csrf
                            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{route('logout')}}"><i class="fa fa-sign-out text-primary"></i> Sign out</a>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="main_content" id="main-content">
    <div class="left_sidebar">
        <nav class="sidebar">
            <div class="user-info">
                <div class="image"><a href="javascript:void(0);"><img width="120px" height="120px" src="{{ asset('storage/Pictures/Profile/'.auth()->user()->photoUser)}}" alt="User"></a></div>
                <div class="detail mt-3">
                    <h5 class="mb-0">{{auth()->user()->name}} {{auth()->user()->prenom}}</h5>
                    <small>Stagiaire</small> 
                </div>
                <div class="social">
                    </div>
            </div>
            <ul id="main-menu" class="metismenu">
                <li class="@if(isset($dash) == true) active @else  @endif"><a href="{{route('user.dashboard')}}"><i class="ti-home"></i><span>Dashboard</span></a></li>
                <li class="@if(isset($monCompte) == true) active @else  @endif">
                    <a href="javascript:void(0)" class="has-arrow"><i class="ti-user"></i><span>Mon Compte</span></a>
                    <ul>
                        <li><a class="dropdown-item"  href="{{route('user.profile')}}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('user.settings')}}">Modifier Information</a></li>
                        <li><a class="dropdown-item" href="{{route('user.password')}}">Changer mot de Passe</a></li>
                    </ul>
                </li>
                <li class="@if(isset($Cv) == true) active @else  @endif">
                    <a href="javascript:void(0)" class="has-arrow"><i class="fa fa-university"></i><span>Mon Cv</span></a>
                    <ul>
                        <li><a class="dropdown-item" href="{{route('formation.index')}}">Formations</a></li>
                        <li><a class="dropdown-item" href="{{route('experience.index')}}">Experiances</a></li>
                        <li><a class="dropdown-item" href="{{route('langue.index')}}">langues</a></li>
                        <li><a class="dropdown-item" href="{{route('competence.index')}}">Competences</a></li>
                        <li><a class="dropdown-item" href="{{route('reseau.index')}}">Reseau sociaux</a></li>
                    </ul>
                </li>
                <li class="@if(isset($Stage) == true) active @else  @endif"><a href="{{route('demande_Stage.index')}}"><i class="ti-file"></i><span>Demande De Stage</span></a></li>
                <li class="@if(isset($Projet) == true) active @else  @endif"><a href="{{route('projet_Stage.getAllProjetStagaire')}}"><i class="fa fa-th-list"></i><span>Projets</span></a></li>
                <li class="@if(isset($absence) == true) active @else  @endif"><a href="{{route('absence.index')}}"><i class="fa fa-calendar"></i><span>Absence</span></a></li>
                @if (auth()->user()->cv_Is_Complet == 1)
                <li class="@if(isset($mycv) == true ) active @else  @endif"><a href="{{route('cv.myCv')}}"><i class="fa fa-file-text"></i><span>Mon cv</span></a></li>
                @endif
                <li >
                    <a  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{route('logout')}}"><i class="fa fa-sign-out"></i><span>Deconnecter</span></a></li>

            </ul>            
        </nav>
    </div>
    <div class="page">
        @yield('content')
    </div>
</div>
@yield('style')
<!-- Core -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->

<script src="{{asset('assets/js/theme.js')}}"></script>
<script src="{{asset('assets/js/pages/index.js')}}"></script>
@yield('footer-scripts' ) 
<!-- Jquery DataTable Plugin Js --> 
<script>
</script>
</body>
</html>