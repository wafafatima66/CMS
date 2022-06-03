<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<!-- Meta data -->
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="description" content="">
		
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title>{{ config('app.name') }}</title>

        <!--CSS Files -->
        <link href="{{URL::asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	    <link href="{{URL::asset('plugins/awselect/awselect.min.css')}}" rel="stylesheet" />

		@include('layouts.header')

	</head>

	<body class="app sidebar-mini">

        <!-- LOADER -->
		<div id="global-loader" >
			<img src="{{URL::asset('img/svgs/loader-2.gif')}}" alt="loader">           
		</div>
		<!-- END LOADER -->

		@if (config('frontend.maintenance') == 'on')
			
			<div class="container h-100vh">
				<div class="row text-center h-100vh align-items-center">
					<div class="col-md-12">
						<img src="{{ URL::asset('img/files/maintenance.png') }}" alt="Maintenance Image">
						<h2 class="mt-4 font-weight-bold">We are just tuning up a few things.</h2>
						<h5>We apologize for the inconvenience but <span class="font-weight-bold text-info">{{ config('app.name') }}</span> is currenlty undergoing planned maintenance.</h5>
					</div>
				</div>
			</div>
			
		@else

			<!-- Page -->
			<div class="page">
				<div class="page-main">
					
					<!-- App-Content -->			
					<div class="main-content">
						<div class="side-app">

							@yield('content')

						</div>                   
					</div>
			
			</div><!-- End Page -->
		
		@endif

		@include('layouts.footer-scripts-guest')
            
	</body>
</html>


