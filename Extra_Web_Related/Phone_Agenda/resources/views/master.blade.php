<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

	@include('parts.head')
	
    <body id="body">
	
		<!-- preloader -->
		<div id="preloader">
			<img src="img/preloader.gif" alt="Preloader">
		</div>
		<!-- end preloader -->

        <!-- 
        Fixed Navigation
        ==================================== -->
        @include('parts.header')
        <!--
        End Fixed Navigation
        ==================================== -->
		
		
		
        <!--
        Home Slider
        ==================================== -->
		
        @include('home')
		
        <!--
        End Home SliderEnd
        ==================================== -->
		
        <!--
        Persoane
        ==================================== -->        
        
        @include('persoane')
        
        <!--
        End Persoane
        ==================================== -->

		
        <!--
        Grupuri
        ==================================== -->
		
        @include('grupuri')
		
        <!--
        End Grupuri
        ==================================== -->
		
        <!-- Cautare -->
        @include('cautare')
        <!-- End Cautare -->


        <!-- Footer -->
        @include('parts.footer')
        <!-- End Footer -->
		
		<!-- Back To Top Button -->
		<a href="javascript:void(0);" id="back-top"><i class="fa fa-angle-up fa-3x"></i></a>
		<!-- End Of Back To Top Button -->

		<!-- Essential jQuery Plugins
		================================================== -->

		@include('parts.scripts')
    </body>
</html>
