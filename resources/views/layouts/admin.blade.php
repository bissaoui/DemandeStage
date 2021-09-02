<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Webpixels">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Dashboard Admin</title>

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
        <a href="index.html" class="navbar-brand"><img src="{{ asset('assets/images/brand/icon.svg')}}" alt="BigBucket" /> <strong>Big</strong> Bucket</a>
        <div id="navbar_main">
            <ul class="navbar-nav mr-auto hidden-xs">
                <li class="nav-item page-header">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="dropdown-header">User menu</h6>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-user text-primary"></i>My Profile</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-cog text-primary"></i>Settings</a>
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
                <div class="image"><a href="javascript:void(0);"><img src="{{ asset('assets/images/user.png')}}" alt="User"></a></div>
                <div class="detail mt-3">
                    <h5 class="mb-0">Mike Thomas</h5>
                    <small>Admin</small>
                </div>
                <div class="social">
                    <a href="javascript:void(0);" title="facebook"><i class="ti-twitter-alt"></i></a>
                    <a href="javascript:void(0);" title="twitter"><i class="ti-linkedin"></i></a>
                    <a href="javascript:void(0);" title="instagram"><i class="ti-facebook"></i></a>
                </div>
            </div>
            <ul id="main-menu" class="metismenu">
                <li class="@if(isset($dash) == true) active @else  @endif"><a href="{{route('admin.dashboard')}}"><i class="ti-home"></i><span>Dashboard</span></a></li>
                <li class="@if(isset($utilisateur) == true) active @else  @endif"><a href="{{route('admin.users')}}"><i class="fa fa-user"></i><span>Utilisateurs</span></a></li>
                <li class="@if(isset($stagiaire) == true) active @else  @endif"><a href="{{route('admin.stagiaire')}}"><i class="fa fa-users"></i><span>Stagiaires</span></a></li>
                <li class="@if(isset($ecole) == true) active @else  @endif"><a href="{{route('ecole.index')}}"><i class="fa fa-mortar-board"></i><span>Ecoles</span></a></li>
                <li class="@if(isset($ville) == true) active @else  @endif"><a href="{{route('ville.index')}}"><i class="fa fa-university"></i><span>Villes</span></a></li>
                <li class="@if(isset($reseau) == true) active @else  @endif"><a href="{{route('reseau.index')}}"><i class="fa fa-rss-square"></i><span>Reseau sociaux</span></a></li>
                <li class="@if(isset($technologie) == true) active @else  @endif"><a href="{{route('technologie.index')}}"><i class="fa fa-desktop"></i><span>Technologies</span></a></li>
                <li class="@if(isset($projet) == true) active @else  @endif"><a href="{{route('projet.index')}}"><i class="fa  fa-tasks"></i><span>Projets</span></a></li>
                <li class="@if(isset($langue) == true) active @else  @endif"><a href="{{route('langue.index')}}"><i class="fa fa-bookmark-o"></i><span>Langues</span></a></li>
                <li class="@if(isset($demande) == true) active @else  @endif"><a href=""><i class="fa fa-book"></i><span>Demandes</span></a></li>
                <li class="@if(isset($absence) == true) active @else  @endif"><a href=""><i class="fa fa-calendar"></i><span>Absence</span></a></li>
            </ul>            
        </nav>
    </div>
    <div class="page">
        @yield('content')
    </div>
</div>

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