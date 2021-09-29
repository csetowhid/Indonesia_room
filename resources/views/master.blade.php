<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>COVID-19 Isolation Facility</title>
	<meta name="description" content="Business Process of COVID-19 Isolation Facility"/>
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>

	<!-- Favicon -->
	{{-- <link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon"> --}}

	<!-- Morris Charts CSS -->
    <link href="{{asset('backend/vendors/bower_components/morris.js/morris.css" rel="stylesheet')}}" type="text/css"/>

	<!-- Data table CSS -->
	<link href="{{asset('backend/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

	{{-- <link href="{{asset('backend/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css"> --}}
	{{-- <link href="{{asset('backend/vendors/bower_components/switchery/dist/switchery.min.css')}}" rel="stylesheet" type="text/css"/> --}}

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" /> --}}
	<link href="{{asset('backend/vendors/bower_components/sweetalert/dist/sweetalert.css')}}"  rel="stylesheet" type="text/css">
	<!-- Custom CSS -->
	<link href="{{asset('backend/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active box-layout pimary-color-red">
		{{-- @extends('navbar') --}}
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left" style="width: 70px;">
					<span style="font-weight: bold;font-size: 16px;">{{auth()->user()->name}}</span>

					<div class="logo-wrap">
						<a href="index-2.html">
{{-- 							<img class="brand-img" src="{{asset('backend/img/logo.png')}}" alt="brand"/>
							<span class="brand-text">doodle</span> --}}
						</a>
					</div>
				</div>
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>

			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">


							<img src="../../../public/{{Auth::user()->image}}" 


							alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>


								<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<!-- /Top Menu Items -->


		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">

				<li>
					<a href="{{route('home')}}"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
					<hr class="light-grey-hr ma-0"/>
				</li>

				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="icon-user mr-20"></i><span class="right-nav-text">Admin / Staff</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
						<li><a href="{{route('user.view')}}">Admin List</a></li>
						<li><a href="{{URL::to('/user/register')}}">Admin Add</a></li>
					</ul>
				</li>

				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_drr"><div class="pull-left"><i class="icon-home mr-20"></i><span class="right-nav-text">Rooms</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="ui_drr" class="collapse collapse-level-1 two-col-list">
						<li><a href="{{route('room.index')}}">Create Room</a></li>
						<li><a href="{{route('all.room')}}">All Room</a></li>
					</ul>
				</li>

				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#customer"><div class="pull-left"><i class="icon-people mr-20"></i><span class="right-nav-text">Patients</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="customer" class="collapse collapse-level-1 two-col-list">
					<li><a href="{{route('patient.index')}}">Add New Patient</a></li>
					<li><a href="{{route('all.patients')}}">All Patients</a></li>
					</ul>
				</li>

				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#checkin"><div class="pull-left"><i class="icon-location-pin mr-20"></i><span class="right-nav-text">Check In</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="checkin" class="collapse collapse-level-1 two-col-list">
					<li><a href="{{route('checkin.index')}}">New Check In</a></li>
					<li><a href="{{route('all.checkin')}}">All List</a></li>
					</ul>
				</li>

				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#medicine"><div class="pull-left"><i class="icon-share-alt mr-20"></i><span class="right-nav-text">Medicine</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="medicine" class="collapse collapse-level-1 two-col-list">
					<li><a href="{{route('medicine.index')}}">Add New Medicine</a></li>
					<li><a href="{{route('all.medicine')}}">All Medicine List</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#medicine_report"><div class="pull-left"><i class="icon-share-alt mr-20"></i><span class="right-nav-text">Medicine Report</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="medicine_report" class="collapse collapse-level-1 two-col-list">
					{{-- <li><a href="{{route('medicine.index')}}">Add New Medicine</a></li> --}}
					<li><a href="{{route('all.medicinereport')}}">Report List</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#checkout"><div class="pull-left"><i class="icon-location-pin mr-20"></i><span class="right-nav-text">Check Out</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="checkout" class="collapse collapse-level-1 two-col-list">
		{{-- <li><a href="{{route('checkout.index')}}">New Check Out</a></li>
 --}}		<li><a href="{{route('all.checkout')}}">All List</a></li>
					</ul>
				</li>


				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#settings"><div class="pull-left"><i class="icon-settings mr-20"></i><span class="right-nav-text">Settings</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="settings" class="collapse collapse-level-1 two-col-list">
						<li><a href="{{route('settings')}}">Add Settings</a></li>
						<li><a href="{{route('settings.all')}}">All Settings</a></li>
					</ul>
				</li>

			</ul>
		</div>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">

            	@yield('content')

			</div>

			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2021 &copy; Design & Develop By APitSoft</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->

		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

	<!-- JavaScript -->

    <!-- jQuery -->
    <script src="{{asset('backend/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('backend/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

	<!-- Data table JavaScript -->
<script src="{{asset('backend/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>

	<script src="{{asset('backend/js/dataTables-data.js')}}"></script>

	<!-- Slimscroll JavaScript -->
	<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>

	<!-- simpleWeather JavaScript -->
	<script src="{{asset('backend/vendors/bower_components/moment/min/moment.min.js')}}"></script>
	<script src="{{asset('backend/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js')}}"></script>
	<script src="{{asset('backend/js/simpleweather-data.js')}}"></script>

	<!-- Progressbar Animation JavaScript -->
	<script src="{{asset('backend/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('backend/vendors/bower_components/jquery.counterup/jquery.counterup.min.js')}}"></script>

	<!-- Fancy Dropdown JS -->
	<script src="{{asset('backend/js/dropdown-bootstrap-extended.js')}}"></script>

	<!-- Sparkline JavaScript -->
	<script src="{{asset('backend/vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>

	<!-- Owl JavaScript -->
	<script src="{{asset('backend/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>

	<!-- ChartJS JavaScript -->
	<script src="{{asset('backend/vendors/chart.js/Chart.min.js')}}"></script>

	<!-- Morris Charts JavaScript -->
    <script src="{{asset('backend/vendors/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('backend/vendors/bower_components/morris.js/morris.min.js')}}"></script>
    {{-- <script src="{{asset('backend/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script> --}}

	{{-- <!-- Switchery JavaScript -->
	<script src="{{asset('backend/vendors/bower_components/switchery/dist/switchery.min.js')}}"></script> --}}

	<script src="{{asset('backend/vendors/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>

	<!-- Init JavaScript -->
	<script src="{{asset('backend/js/init.js')}}"></script>
	<script src="{{asset('backend/js/dashboard-data.js')}}"></script>
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script> --}}

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>

      <script>

function confirm(link)
{

 swal({
            title: "Are you sure?",
            text: "Want to Delete this file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e69a2a",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function(){

            swal("Deleted!", "Your imaginary file has been deleted.", "success");
             window.location.href = link;
        });

}


    </script>

</body>


<!-- Mirrored from hencework.com/theme/doodle-demo/fixed-width-light/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2019 21:10:51 GMT -->
</html>
