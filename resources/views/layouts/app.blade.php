<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Con Patitas </title>
    <meta name="keywords" content="compatitas.com,pet website,lost dog" />
    <meta name="description" content="compatitas.com,Pet website,founding lost pet,dog cat" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />


    <link rel="shortcut icon" type="image/png" href="{{asset('favor_icon.png')}}"/>
    <!-- LAYER SLIDER -->
    
    <link href="{{asset("assets/js/slider.revolution/css/extralayers.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/js/slider.revolution/css/settings.css")}}" rel="stylesheet" type="text/css" />
    <!-- THEME CSS -->
    <link href="{{asset("assets/css/essentials.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/css/layout.css")}}" rel="stylesheet" type="text/css" />
    <!-- PAGE LEVEL SCRIPTS -->
    <link href="{{asset("assets/css/header-1.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/css/green.css")}}" rel="stylesheet" type="text/css" id="color_scheme" />
     <link href="{{asset("assets/css/site.css")}}" rel="stylesheet" type="text/css" />
    <!-- CORE CSS -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    @stack("css")
    {{--CUSTOM CSS--}}
    <link href="{{asset("assets/css/custom.css")}}" rel="stylesheet" type="text/css" />
    {{--CUSTOM CSS--}}
</head>

<body class="smoothscroll boxed" >

<div class="modals"></div>
<!-- wrapper -->
<div id="wrapper" style="box-shadows: 0px 1px 30px 2px rgba(123, 121, 119, 0.74);margin-top:0">

    <div id="header" class="sticky shadow-after-3 clearfix">

        <!-- SEARCH HEADER -->
        <div class="search-box over-header">
            <a id="closeSearch" href="#" class="glyphicon glyphicon-remove"></a>

            <form action="page-search-result-1.html" method="get">
                <input type="text" class="form-control" placeholder="SEARCH" />
            </form>
        </div>
        <!-- /SEARCH HEADER -->

        <!-- TOP NAV -->

        <header id="topNav">
            <div class="container">

                <!-- Mobile Menu Button -->
                <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- BUTTONS -->
                <ul class="pull-right nav nav-pills nav-second-main">
                    @if(!Auth::guest())
                    <!-- Notification -->
                    <?php
                    $messages =  \App\Message::where('user_id',Auth::user()->id)->where('is_view',0)->get();
                    $count = count($messages);
                    ?>
                    @if($count>0)
                    <li class="quick-cart notification">
                        <a href="javascript:;" class="notification">
                            <span class="badge badge-aqua btn-xs badge-corner">{{$count}}</span>
                            <i class="fa fa-info"></i>
                        </a>
                        <div class="quick-cart-box notification" style="max-height:500px;overflow-y:auto">
                            <h4>Nuevos Mensajes</h4>

                            @foreach($messages as $message)
                            <div class="quick-cart-wrapper">
                                <a href="{{route('notification_view',array('id'=>$message->id))}}" style="text-decoration: none;">
                                    <h6><span>{{$message->contents}}</span></h6>
                                    <small>Para {{\App\Pet::find($message->pet_id)->name}}</small>
                                </a>
                            </div>
                            @endforeach

                            <!-- quick cart footer -->
                            <div class="quick-cart-footer clearfix">
                                <a href="{{route('list_notifications',array('page'=>1))}}" class="btn btn-primary btn-xs pull-right">VIEW All</a>

                            </div>
                            <!-- /quick cart footer -->

                        </div>
                    </li>
                    @else
                            <li class="quick-cart notification">
                                <a href="javascript:;" class="notification">
                                    {{--<span class="badge badge-aqua btn-xs badge-corner">{{$count}}</span>--}}
                                    <i class="fa fa-info"></i>
                                </a>
                                <div class="quick-cart-box notification" style="max-height:500px;overflow-y:auto">
                                    <h4>Nuevos Mensajes </h4>


                                        <div class="quick-cart-wrapper margin-left-10">
                                                <h6><span>bandeja de entrada vacía.</span></h6>
                                                <small></small>
                                        </div>

                                <!-- quick cart footer -->
                                    <div class="quick-cart-footer clearfix">
                                        <a href="{{route('list_notifications',array('page'=>1))}}" class="btn btn-primary btn-xs pull-right">VIEW All</a>

                                    </div>
                                    <!-- /quick cart footer -->

                                </div>
                            </li>
                    @endif
                    <!-- /SEARCH -->
                    @endif
                    <!-- QUICK SHOP CART -->
                    <li class="quick-cart cart">
                        <a href="#" class="cart">
                            <span class="badge badge-aqua btn-xs badge-corner">
                                @if(Auth::guard('web')->check())
                                     {{count(session('item_'.Auth::user()->id))}}
                                @endif
                            </span>
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <div class="quick-cart-box cart">
                            <h4>Carro de compras</h4>

                            <div class="quick-cart-wrapper">
                              <?php $total=0; ?>  
                              @if(Auth::guard('web')->check())
                              @if(null !== session('item_'.Auth::user()->id))
                                @foreach(session('item_'.Auth::user()->id) as $item)
                                <a href="#"><!-- cart item -->
                                    <img src="{{asset($item['image'])}}" width="45" height="45" alt="" />
                                    <h6><span></span> {{$item['productName']}}</h6>
                                    <small>${{$item['price']}}</small>
                                </a><!-- /cart item -->
                                <?php $total = $total + $item['price'] ?>
                                @endforeach
                                @endif
                            @endif
                            </div>

                            <!-- quick cart footer -->
                            <div class="quick-cart-footer clearfix">
                                <a href="{{url('cart/view')}}" class="btn btn-primary btn-xs pull-right">VER CARRO</a>
                                <span class="pull-left"><strong>TOTAL:</strong> ${{$total}}</span>
                            </div>
                            <!-- /quick cart footer -->

                        </div>
                    </li>
                </ul>
                <!-- /BUTTONS -->
                <!-- Logo -->
                <a class="logo pull-left" href="{{url('/')}}" >
                    <img src="{{asset('assets/images/Logo.jpg')}}" alt="" style="zoom:0.5;"/>
                </a>

                <div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
                    <nav class="nav-main">
                        <ul id="topMain" class="nav nav-pills nav-main">

                            {{--start home--}}
                            <li class="dropdown active"><!-- HOME -->
                                <a class="dropdown-toggle" href="/">
                                  Inicio
                                </a>
                            </li>
                            {{--end home--}}

                            {{--start collars --}}
                            <li class="dropdown"><!-- PAGES -->
                                <a class="dropdown-toggle" href="#">
                                   Tienda     
                                    {{--& Collars--}}
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" href="{{url('shop/tag/1/id-asc')}}">
                                           Identificaciones QR
                                        </a>
                                        <!--<ul class="dropdown-menu">
                                            <li><a href="page-music.html">See All Tag Options</a></li>
                                            <li><a href="page-music.html">Best Seller</a></li>
                                            <li><a href="page-music.html">Cat - Tastic</a></li>
                                            <li><a href="page-music.html">Personalized</a></li>
                                            <li><a href="page-music.html">Sale - Clearance</a></li>
                                        </ul>-->
                                    </li>

                                    <!--<li class="dropdown">
                                        <a class="dropdown-toggle" href="#">
                                            Collars <small>&nbsp;comming soon</small>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="page-music.html">Collars by DodIDs</a></li>
                                            <li><a href="page-music.html">Personalized Collars</a></li>
                                        </ul>
                                    </li>-->

                                   <!-- <li class="dropdown">
                                        <a class="dropdown-toggle" href="#">
                                            Accessories & More <small>&nbsp;comming soon</small>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="page-music.html">Tag Connectors</a></li>
                                            <li><a href="page-music.html">Tag Sliencers</a></li>
                                            <li><a href="page-music.html">Products that Give Back</a></li>
                                            <li><a href="page-music.html">Wallet Cards</a></li>
                                        </ul>
                                    </li>-->

                                </ul>
                            </li>
                            {{--end collars--}}

                            {{--start articles and news--}}
                            <li class="dropdown"><!-- FEATURES -->
                                <a class="dropdown-toggle" href="{{url('pets')}}">
                                   Mis Mascotas
                                </a>
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-newspaper"></i> SIDE PANEL--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="feature-sidepanel-dark-right.html">SIDE PANEL - DARK - RIGHT</a></li>--}}
                                            {{--<li><a href="feature-sidepanel-dark-left.html">SIDE PANEL - DARK - LEFT</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a target="_blank" href="../Admin/HTML/"><span class="label label-success pull-right">BONUS</span><i class="et-gears"></i> ADMIN PANEL</a></li>--}}
                                {{--</ul>--}}
                            </li>
                            {{--end articles and news--}}

                            {{--start upgrade--}}
                            <li class="dropdown mega-menu"><!-- PORTFOLIO -->
                                <a class="dropdown-toggle" href="{{url('upgrade')}}">
                                 Activar
                                </a>
                            </li>

                            {{--end upgrade--}}

                            {{--start support--}}
                            <li class="dropdown"><!-- BLOG -->
                                <a class="dropdown-toggle" href="{{url("support")}}">
                                  Ayuda
                                </a>
                            </li>
                            {{--end support--}}

                            {{--start sign in / sign up part--}}

                            <li class="dropdown"><!-- PAGES -->
                               @if(Auth::guest())
                                <a class="dropdown-toggle" href="{{url('login')}}">
                                Perfil
                                </a>
                                @else
                                <a class="dropdown-toggle" href="#">
                                  SALIR
                                </a>
                                    <ul class="dropdown-menu">
                                         <li class="dropdown">
                                              <a class="dropdown-toggle" href="{{url('profile/edit')}}">
                                                  <i class="fa fa-user"></i> Editar Perfil
                                              </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="{{url('profile/change_email')}}">
                                                <i class="fa fa-lock"></i> Cambiar Correo
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="{{url('profile/change_password')}}">
                                                <i class="fa fa-lock"></i> Cambiar Contraseña
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="{{url("signout")}}">
                                                <i class="fa fa-sign-out"></i> Salir
                                            </a>
                                        </li>
                                    </ul>
                               @endif
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </header>
        <!-- /Top Nav -->

    </div>



   @yield("contents")

    <!-- FOOTER -->
    <footer id="footer" style="margin-top:0">
        <div class="container" style="width: 100%;padding-bottom:0">

            <div class="row">

                <div class="col-md-3">
                    <!-- Footer Logo -->
                 <!--   <img class="footer-logo" src="{{asset("assets/images/logo_dark.png")}}" style="width:30%" alt="" /> -->

                    <!-- Contact Address -->
                    <address>
                        <ul class="footer-posts list-unstyled">
                            <li >
                                <a href="{{url("support/common_questions")}}">Preguntas Frecuentes    </a>
                            </li>
                            <li >
                                <a href="{{url("/blog/1")}}"> Foros</a>
                            </li>
                            <li >
                                <a href="{{url('/support/shipping')}}"> Envíos y devoluciones</a>
                            </li>
                            <li >
                                <a href="{{url("contact")}}">Contáctenos</a>
                            </li>
                            <li>
                                <a href="{{url("signup")}}">Regístrese</a>
                            </li>

                        </ul>
                    </address>
                    <!-- /Contact Address -->

                </div>

                <div class="col-md-2">

                    <!-- Latest Blog Post -->
                    <h4 class="letter-spacing-1">Para sus mascotas    </h4>
                    <ul class="footer-posts list-unstyled">
                        <li>
                            <a href="#">Activar identificación </a>

                        </li>
                        <li>
                            <a href="#">Identificaciones QR </a>

                        </li>
                        <!--<li>
                            <a href="#">Cat ID Tags</a>
                        </li>
                        <li>
                            <a href="#">Personalized IDs</a>
                        </li>-->
                    </ul>
                    <!-- /Latest Blog Post -->

                </div>

                <div class="col-md-3">

                    <!-- Links -->
                    <h4 class="letter-spacing-1">Para Socios</h4>
                    <ul class="footer-posts list-unstyled">

                        <li><a href="{{url("outreach/company")}}">Nuestra Empresa</a></li>
                     
                        <li><a href="{{url("outreach/ourstory")}}">Nuestra Historia</a></li>
                        <li><a href="{{url("privacy")}}">Privacidad</a></li>
                    </ul>
                    <!-- /Links -->

                </div>

                <div class="col-md-3">

                    <!-- Links -->
                    <h4 class="letter-spacing-1">Ayuda</h4>
                    <ul class="footer-posts list-unstyled">
                    <!--    <li><a href="{{url("outreach")}}">Shelter & Rescue</a></li> -->
                        <li><a href="{{url("outreach/program")}}">Programa Social</a></li>
                    <!--     <li><a href="{{url("outreach")}}">Affiliate & Partner</a></li>-->
                    <!--     <li><a href="#">Community Alert Sign Up</a></li>-->

                    </ul>
                    <!-- /Links -->
                </div>

                <div class="col-md-1">

                    <!-- Newsletter Form -->
                    {{--<h4 class="letter-spacing-1">ABOUT Con Patitas</h4>--}}
                    {{--<p>Subscribe to Our Newsletter to get Important News &amp; Offers</p>--}}

                    {{--<form class="validate" action="php/newsletter.php" method="post" data-success="Subscribed! Thank you!" data-toastr-position="bottom-right">--}}
                        {{--<div class="input-group">--}}
                            {{--<span class="input-group-addon"><i class="fa fa-envelope"></i></span>--}}
                            {{--<input type="email" id="email" name="email" class="form-control required" placeholder="Enter your Email">--}}
                            {{--<span class="input-group-btn">--}}
										{{--<button class="btn btn-success" type="submit">Subscribe</button>--}}
									{{--</span>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                    <!-- /Newsletter Form -->

                    <!-- Social Icons -->
                    <div class="margin-top-20">
                        <a href="https://www.facebook.com" class="social-icon social-icon-border social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="Facebook">

                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="https://www.twitter.com" class="social-icon social-icon-border social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="Twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="https://plus.google.com" class="social-icon social-icon-border social-gplus pull-left" data-toggle="tooltip" data-placement="top" title="Google plus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="https://www.linkedin.com/" class="social-icon social-icon-border social-linkedin pull-left" data-toggle="tooltip" data-placement="top" title="Linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>

                        {{--<a href="#" class="social-icon social-icon-border social-rss pull-left" data-toggle="tooltip" data-placement="top" title="Rss">--}}
                            {{--<i class="icon-rss"></i>--}}
                            {{--<i class="icon-rss"></i>--}}
                        {{--</a>--}}

                    </div>
                    <!-- /Social Icons -->

                </div>

            </div>

        </div>

        <div class="copyright" style="padding:0">
            <div class="container" style="text-align:center">
               <div style="color:#ffffff"> &copy; 2017 Todos los derechos reservados, ConPatias</div>
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->

</div>
<!-- /wrapper -->


<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>


<!-- PRELOADER -->
<div id="preloader">
    <div class="inner">
        <span class="loader"></span>
    </div>
</div><!-- /PRELOADER -->


<!-- JAVASCRIPT FILES -->
<script type="text/javascript">var plugin_path = 'assets';</script>
<script type="text/javascript" src="{{asset("assets/js/jquery-2.2.3.min.js")}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script type="text/javascript" src="{{asset("assets/js/scripts.js")}}"></script>
<!-- STYLESWITCHER - REMOVE -->
{{--<script async type="text/javascript" src="{{asset("assets/js/styleswitcher.js")}}"></script>--}}
<!-- LAYER SLIDER -->
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })
</script>
<script type="text/javascript" src="{{asset("assets/js/slider.revolution/js/jquery.themepunch.tools.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/slider.revolution/js/jquery.themepunch.revolution.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/slider.revolution/js/demo.revolution_slider.js")}}"></script>
@stack("js")
</body>
</html>