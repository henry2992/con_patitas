<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Smarty assets/admin</title>
		<meta name="description" content="" />
		<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />
		  <meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />
		<!-- CORE CSS -->
		<link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
		<!-- THEME CSS -->
		<link href="{{asset("assets/admin/assets/css/essentials.css")}}" rel="stylesheet" type="text/css" />
		<link href="{{asset("assets/admin/assets/css/layout.css")}}" rel="stylesheet" type="text/css" />
		<link href="{{asset("assets/css/custom.css")}}" rel="stylesheet" type="text/css" />
		@stack("css")
	</head>
	<body
		<!-- WRAPPER -->
		<div id="wrapper" class="clearfix">
			<aside id="aside">
				<nav id="sideNav"><!-- MAIN MENU -->
					<ul class="nav nav-list">
						<li class="active"><!-- dashboard -->
							<a class="dashboard" href="{{url("admin")}}"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
						{{--<li>--}}
							{{--<a href="#">--}}
								{{--<i class="fa fa-menu-arrow pull-right"></i>--}}
								{{--<i class="main-icon fa fa-car"></i> <span>Pets</span>--}}
							{{--</a>--}}
							{{--<ul><!-- submenus -->--}}
								{{--<li><a href="{{url("admin/pets")}}">View</a></li>--}}
							{{--</ul>--}}
						{{--</li>--}}

						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-qrcode"></i> <span>TagID Mangement</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="{{url('admin/qrtag/view/1/id-asc')}}">View</a></li>
							</ul>
						</li>
						<li>
							{{--<a href="#">--}}
								{{--<i class="fa fa-menu-arrow pull-right"></i>--}}
								{{--<i class="main-icon fa fa-table"></i> <span>Missing Reports</span>--}}
							{{--</a>--}}
							{{--<ul><!-- submenus -->--}}
								{{--<li><a href="tables-bootstrap.html">View</a></li>--}}
								{{--<li><a href="tables-jqgrid.html">jQuery Grid</a></li>--}}
								{{--<li><a href="tables-footable.html">jQuery Footable</a></li>--}}
							{{--</ul>--}}
						{{--</li>--}}
						{{--<li>--}}
							{{--<a href="#">--}}
								{{--<i class="fa fa-menu-arrow pull-right"></i>--}}
								{{--<i class="main-icon fa fa-user"></i> <span>Users</span>--}}
							{{--</a>--}}
							{{--<ul><!-- submenus -->--}}
								{{--<li><a href="{{url("admin/users")}}">View</a></li>--}}
								{{--<li><a href="form-masked-inputs.html">Masked Inputs</a></li>--}}
							{{--</ul>--}}
						{{--</li>--}}

						{{--<li>--}}
							{{--<a href="#">--}}
								{{--<i class="fa fa-menu-arrow pull-right"></i>--}}
								{{--<i class="main-icon fa fa-mail-forward"></i> <span>Email</span>--}}
							{{--</a>--}}
							{{--<ul><!-- submenus -->--}}
								{{--<li><a href="page-invoice.html">Inbox--}}
										{{--<span class="pull-right label label-default">0</span>--}}
									{{--</a>--}}
								{{--</li>--}}
								{{--<li><a href="page-login.html">Draft--}}
										{{--<span class="pull-right label label-default">0</span>--}}
									{{--</a>--}}
								{{--</li>--}}
								{{--<li><a href="page-register.html">Sent--}}
										{{--<span class="pull-right label label-default">0</span>--}}
									{{--</a>--}}
								{{--</li>--}}
							{{--</ul>--}}
						{{--</li>--}}
						{{--<li>--}}
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-shopping-cart"></i> <span>Shop</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="{{url('admin/shop/view/1/id-asc')}}">Product Mangement</a></li>
								<li><a href="{{route('order_view',['page'=>1,'order'=>'id-asc'])}}">Orders</a></li>
								<li><a href="page-register.html">Sold Products</a></li>
							</ul>
						</li>

						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-gears"></i> <span>Settings</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="{{route('admin.ads.show')}}">Ads Texts Management</a></li>
								<li><a href="{{route('view_inbox')}}">Notification Mangement</a></li>
							</ul>
						</li>
					</ul>
				</nav>

				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>
			<!-- /ASIDE -->
			<!-- HEADER -->
			<header id="header">

				<!-- Mobile Button -->
				<button id="mobileMenuBtn"></button>
				<!-- Logo -->
				<span class="logo pull-left">
					<img src="{{asset("assets/images/logo_dark.png")}}" height="40" style="padding: 3px;"/>
				</span>

				<form method="get" action="page-search.html" class="search pull-left hidden-xs">
					<input type="text" class="form-control" name="k" placeholder="Search for something..." />
				</form>
				<nav>
					<!-- OPTIONS LIST -->
					<ul class="nav pull-right">

						<!-- USER OPTIONS -->
						<li class="dropdown pull-left">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								{{--<img class="user-avatar" alt="" src="assets/images/noavatar.jpg" height="34" /> --}}
								<span class="user-name">
									<span class="hidden-xs">
										Admin <i class="fa fa-angle-down"></i>
									</span>
								</span>
							</a>
							<ul class="dropdown-menu hold-on-click">

								<li><!-- my inbox -->
									<a href="{{route('view_inbox')}}"><i class="fa fa-envelope"></i> Inbox
										<span class="pull-right label label-default alarm-messages"></span>
									</a>
								</li>
								{{--<li><!-- settings -->--}}
								{{--<a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>--}}
								{{--</li>--}}
								<li>
									<a href="{{route('admin.showLinkRequestForm')}}"><i class="fa fa-power-off"></i> Password Reset</a>
								</li>
								<li><!-- logout -->
									<a href="{{route('admin.logout')}}"><i class="fa fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
						<!-- /USER OPTIONS -->
					</ul>
					<!-- /OPTIONS LIST -->
				</nav>
			</header>
			<!-- /HEADER -->
			<!--MIDDLE -->
			@yield("contents")
			<!-- /MIDDLE -->
		</div>

		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = "<?php echo asset('assets/admin/assets/plugins/')."/"; ?>";</script>
		<script type="text/javascript" src="{{asset("assets/admin/assets/plugins/jquery/jquery-2.2.3.min.js")}}"></script>
		<script type="text/javascript" src="{{asset("assets/admin/assets/js/app.js")}}"></script>
		<script>
            var msgCount = '{{\App\Contact::all()->count()}}';
			$(function(){
				$(".alarm-messages").text(msgCount);
			});
		</script>
		<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })
</script>
		<!-- STYLESWITCHER - REMOVE -->
	@stack("js")
	</body>
</html>