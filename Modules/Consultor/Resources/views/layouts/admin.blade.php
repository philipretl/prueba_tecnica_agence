<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Agence</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('/img/icon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
  <script src="{{asset('/js/plugin/webfont/webfont.min.js')}}"></script>

  <script src="{{asset('js/eliminarAlert.js')}}"></script>


	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset('/css/fonts.min.css')}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
  <link rel="stylesheet"  href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet"  href="{{asset('/css/atlantis.css')}}">
	<!-- Chosen Files -->
  <link rel="stylesheet"  href="{{asset('/select/css/select2.min.css')}}">

</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			@include('consultor::layouts.header')
			<!-- End Logo Header -->

			<!-- Navbar Header -->
		  @include('consultor::layouts.navbar')
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		@include('consultor::layouts.sidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">

	      					@yield('content')

			</div>

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="{{route('/')}}">
									Prueba Técnica para Agence
								</a>
							</li>
					</nav>
					<div class="copyright ml-auto">
						2020, Aplicación web construida por: Andres Felipe Vega - web: <a href="https://www.venoudev.com">Venou Dev</a>
					</div>
				</div>
			</footer>
		</div>
	</div>


	<!--   Core JS Files   -->
	<script src="{{asset('/jsAtlantis/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('/jsAtlantis/core/jquery.3.2.1.min.js')}}"></script>

	<script src="{{asset('/jsAtlantis/core/popper.min.js')}}"></script>
	<script src="{{asset('/jsAtlantis/core/bootstrap.min.js')}}"></script>

	<!-- jQuery UI -->
	<script src="{{asset('/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


	<!-- Chart JS -->
	<script src="{{asset('/js/plugin/chart.js/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{asset('/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{asset('/js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Datatables -->
	<script src="{{asset('/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{asset('/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{asset('/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{asset('/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

	<!-- Sweet Alert -->
	<script src="{{asset('/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<!-- Atlantis JS -->
	<script src="{{asset('/js/atlantis.min.js')}}"></script>

	<script src="{{ asset('/select/js/select2.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('/select/js/es.js')}}" type="text/javascript"></script>


	<script>
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>
	@yield('js')
	@yield('js2')
</body>
</html>
