<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/font-awesome.min.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/dark.css')}}" type="text/css">
</head>
<body class="theme-black full-dark">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{asset('assets/images/brand/icon_black.svg')}}" width="48" height="48" alt="ArrOw"></div>
            <p>Please wait...</p>
        </div>
    </div>
    <div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <img src="../assets/images/brand/icon.svg" alt="Lucid">
                        <strong>Big</strong> <span>Bucket</span>
                    </div>
					<div class="card">
                            @yield('content')
                    </div>
				</div>
			</div>
		</div>
	</div> 

     
    
    <script src="{{ asset('assets/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
    <script src="{{ asset('assets/js/theme.js')}}"></script>    
</body>
</html>
