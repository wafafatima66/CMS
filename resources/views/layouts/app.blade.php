<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   
    @include('layouts.header')
</head>

	<body class="app sidebar-mini">

		<!-- LOADER -->
		<div id="global-loader" >
			<img src="{{URL::asset('img/svgs/loader-2.gif')}}" alt="loader">           
		</div>
		<!-- END LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div class="page-main">

				@include('layouts.nav-aside')

				<!-- APP CONTENT -->			
				<div class="app-content main-content pb-0">

					<div class="side-app h-100 ">

						{{-- toggle for responsive --}}

						<div class="app-sidebar__toggle nav-link icon p-0 m-0" data-toggle="sidebar">
							<a class="open-toggle" href="{{url('#')}}">
								<span class="fa fa-align-left  black-hover pt-2"></span>
							</a>
						</div>

						@include('layouts.nav-top')

                        @include('layouts.flash')

						{{-- @yield('page-header') --}}

						@yield('content')						

                    </div>                   
                </div>
                <!-- END APP CONTENT -->

                {{-- @include('layouts.footer')                 --}}

            </div>		
        </div><!-- END PAGE -->
        
		@include('layouts.footer-scripts')        

	</body>
</html>


