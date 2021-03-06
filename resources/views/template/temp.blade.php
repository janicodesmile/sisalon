<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SISALON</title>
	<link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{url('assets/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{url('assets/css/datepicker3.css')}}" rel="stylesheet">
	<link href="{{url('assets/css/styles.css')}}" rel="stylesheet">
         <!-- Custom styles for this page -->
         <link href=" {{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>siSalon</span>Admin</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Admin</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="/"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="{{url('/salon')}}"><em class="fa fa-calendar">&nbsp;</em> Data Salon</a></li>
			<li><a href="{{url('/layanan')}}"><em class="fa fa-bar-chart">&nbsp;</em> Data Layanan</a></li>
			<li><a href="{{url('/pelanggan')}}"><em class="fa fa-toggle-off">&nbsp;</em> Data Pelanggan </a></li>
			<li><a href="{{url('/paket')}}"><em class="fa fa-clone">&nbsp;</em> Paket Perawatan </a></li>
			<li><a href="/"><em class="fa fa-power-off">&nbsp;</em>...</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    @yield('header')	
		
		<div class="row">
			<div class="col-lg-12">
            @yield('konten')
				
			</div><!-- /.col-->
			<div class="col-sm-12">
				<p class="back-link">Fitriani </p>
			</div>
		</div><!-- /.row -->
	</div><!--/.main-->

	@yield('modal')
	
	<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('assets/js/chart.min.js') }}"></script>
	<script src="{{ url('assets/js/chart-data.js') }}"></script>
	<script src="{{ url('assets/js/easypiechart.js') }}"></script>
	<script src="{{ url('assets/js/easypiechart-data.js') }}"></script>
	<script src="{{ url('assets/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ url('assets/js/custom.js') }}"></script>
    <script src=" {{ url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src=" {{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

    </script>
    <script type="text/javascript">
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
            });
          });

    </script>

@yield('js')
	
</body>
</html>
