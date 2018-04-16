<!--
author: Boostraptheme
author URL: https://boostraptheme.com
License: Creative Commons Attribution 4.0 Unported
License URL: https://creativecommons.org/licenses/by/4.0/
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="SpamDetector - Tugas Besar III Strategi Algoritma">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Spam Detector</title>
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-icon-style.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">

	<!-- Core stylesheets -->
	<link rel="stylesheet" href="{{asset('css/profile.css')}}">
	<link rel="stylesheet" href="{{asset('css/ui-elements/button.css')}}">
	@yield('style')
</head>

<body>        
	<header class="header">
		<nav class="navbar navbar-expand-lg ">
			<div class="container-fluid ">
				<div class="navbar-holder d-flex align-items-center justify-content-between">
					<div class="navbar-header">
						<a href="{{ url()->current() }}" class="navbar-brand">
							<div class="brand-text brand-big hidden-lg-down"><img src="img/logo-white.png" alt="Logo" class="img-fluid"></div>
							<div class="brand-text brand-small"><img src="img/logo-icon.png" alt="Logo" class="img-fluid"></div>
						</a>
					</div>
				</div>
			</div>
		</nav>
	</header>

	@yield('content')

	<!--Global Javascript -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/popper/popper.min.js')}}"></script>
	<script src="{{asset('js/tether.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jquery.cookie.js')}}"></script>
	<script src="{{asset('js/jquery.validate.min.js')}}"></script> 
	<script src="{{asset('js/chart.min.js')}}"></script> 
	<script src="{{asset('js/front.js')}}"></script>
	@yield('script')
</body>

</html>