<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
	<title>@yield('title','') | SAJIDA Foundation</title>
	<!-- initiate head with meta tags, css and script -->
	@include('frontend.include.head')

</head>
<body id="app" >
    	<!-- initiate header-->
    	@include('frontend.include.header')

	    	<div>
	    		<!-- yeild contents here -->
	    		@yield('content')
				
	    	</div>


	    	<!-- initiate footer section-->
	    	@include('frontend.include.footer')
	<!-- initiate scripts-->
	@include('frontend.include.script')	
</body>
</html>