@extends("layouts.app")

@section("contents")
<!-- REVOLUTION SLIDER -->


        <!-- REVOLUTION SLIDER -->
<section id="slider" class="slider fullwidthbanner-container roundedcorners">
   
    <div class="fullwidthbanner" data-height="550" data-navigationStyle="">
        <ul class="hide">

            <!-- SLIDE  -->
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">

                <img src="{{asset('assets/images/1x1.png')}}" data-lazyload="{{asset('assets/images/demo/a.jpg')}}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" />

                <!--<div class="tp-dottedoverlay twoxtwo"></div>-->
               

                <div class="tp-caption customin ltl tp-resizeme text_white"
                     data-x="center"
                     data-y="105"
                     data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                     data-speed="800"
                     data-start="1000"
                     data-easing="easeOutQuad"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.01"
                     data-endelementdelay="0.1"
                     data-endspeed="1000"
                     data-endeasing="Power4.easeIn" style="z-index: 10;">
                    {{--<span class="weight-300">DEVELOPMENT / MARKETING / DESIGN / PHOTO</span>--}}
                </div>

                <div class="tp-caption customin ltl tp-resizeme large_bold_white"
                     data-x="center"
                     data-y="155"
                     data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                     data-speed="800"
                     data-start="1200"
                     data-easing="easeOutQuad"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.01"
                     data-endelementdelay="0.1"
                     data-endspeed="1000"
                     data-endeasing="Power4.easeIn" style="z-index: 10;">
                    {{$text->slider_one}}
                </div>

                <div class="tp-caption customin ltl tp-resizeme small_light_white font-lato"
                     data-x="center"
                     data-y="245"
                     data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                     data-speed="800"
                     data-start="1400"
                     data-easing="easeOutQuad"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.01"
                     data-endelementdelay="0.1"
                     data-endspeed="1000"
                     data-endeasing="Power4.easeIn" style="z-index: 10; width: 100%; max-width: 750px; white-space: normal; text-align:center; font-size:20px;">
                    {{--Fabulas definitiones ei pri per recteque hendrerit scriptorem in errem scribentur mel fastidii propriae philosophia cu mea.--}}
                </div>

                <div class="tp-caption customin ltl tp-resizeme"
                     data-x="center"
                     data-y="313"
                     data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                     data-speed="800"
                     data-start="1550"
                     data-easing="easeOutQuad"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.01"
                     data-endelementdelay="0.1"
                     data-endspeed="1000"
                     data-endeasing="Power4.easeIn" style="z-index: 10;">
                    {{--<a href="#purchase" class="btn btn-default btn-lg">--}}
                        {{--<span>Purchase Smarty Now</span>--}}
                    {{--</a>--}}
                </div>

            </li>

            <!-- SLIDE  -->
           <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">

                <img src="{{asset('assets/images/1x1.png')}}" data-lazyload="{{asset('assets/images/demo/b.jpg')}}" alt="" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="110" />

                <div class="tp-caption very_large_text lfb ltt tp-resizeme"
                     data-x="right" data-hoffset="-100"
                     data-y="center" data-voffset="-100"
                     data-speed="600"
                     data-start="800"
                     data-easing="Power4.easeOut"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.01"
                     data-endelementdelay="0.1"
                     data-endspeed="500"
                     data-endeasing="Power4.easeIn">
                    {{$text->slider_two}}
                </div>

                <div class="tp-caption medium_light_white lfb ltt tp-resizeme"
                     data-x="right" data-hoffset="-110"
                     data-y="center" data-voffset="10"
                     data-speed="600"
                     data-start="900"
                     data-easing="Power4.easeOut"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.01"
                     data-endelementdelay="0.1"
                     data-endspeed="500"
                     data-endeasing="Power4.easeIn">
                    {{--Happiness is an accident of nature,<br/>--}}
                    {{--a beautiful and flawless aberration.<br/>--}}
                    {{--<span style="font-size:24px;font-weight:400;">&ndash; Pat Conroy</span>--}}
                </div>

            </li>
            
             <!-- SLIDE  -->
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">

                <img src="{{asset('assets/images/1x1.png')}}" data-lazyload="{{asset('assets/images/demo/c.jpg')}}" alt="" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="110" />

                <div class="tp-caption large_text lfb ltt" style='text-align:right !important;'
                     data-x="right" data-hoffset="-100"
                     data-y="center" data-voffset="-100"
                     data-speed="600"
                     data-start="800"
                     data-easing="Power4.easeOut"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.01"
                     data-endelementdelay="0.1"
                     data-endspeed="500"
                     data-endeasing="Power4.easeIn">
                    {{$text->slider_three}}
                </div>

                <div class="tp-caption medium_light_white lfb ltt tp-resizeme"
                     data-x="right" data-hoffset="-110"
                     data-y="center" data-voffset="10"
                     data-speed="600"
                     data-start="900"
                     data-easing="Power4.easeOut"
                     data-splitin="none"
                     data-splitout="none"
                     data-elementdelay="0.01"
                     data-endelementdelay="0.1"
                     data-endspeed="500"
                     data-endeasing="Power4.easeIn">
                    {{--Happiness is an accident of nature,<br/>--}}
                    {{--a beautiful and flawless aberration.<br/>--}}
                    {{--<span style="font-size:24px;font-weight:400;">&ndash; Pat Conroy</span>--}}
                </div>

            </li>  -->

        </ul>
        <div class="tp-bannertimer"></div>
    </div>
</section>
                <!-- /REVOLUTION SLIDER -->
        <!-- /REVOLUTION SLIDER -->







    <!-- /REVOLUTION SLIDER -->
    {{-- Found button --}}

<section style="padding: 20px;">
    <div class="container">

        <div class="row" style="padding: 0 25px;">
        
          <div class="col-md-4 text-align">
          	<a href="{{url("/pets/found")}}" class="fancy-button bg-gradient1"><span><i class="fa fa-search">&nbsp;</i>Encontré una mascota</span></a>
          </div>
          
            @if(Auth::guest())
                {{--<div class="special btn btn-primary" style="float: right;margin: 10px;padding:20px !important;"><h5>Activate A Tag</h5></div>--}}
               
            @else
            <div class="col-md-4 text-align">	
          	    <a href="{{route("show_pet")}}" class="fancy-button bg-gradient1"><span><i class="fa fa-list">&nbsp;</i>Mis mascotas</span></a>
            </div>
             <div class="col-md-4 text-align">
          	    <a href="{{route("petRegistrationForm")}}" class="fancy-button bg-gradient1"><span><i class="fa fa-info">&nbsp;</i>Agregar mascota</span></a>
              </div>
            @endif

            {{----}}
            {{--<div class="container">--}}
                {{--<a href="#" class="button"><span>✓</span></a>--}}
                {{--<a href="#" class="button orange active"><span>✓</span></a>--}}
                {{--<a href="#" class="button purple"><span>✓</span></a>--}}
                {{--<a href="#" class="button turquoise"><span>✓</span></a>--}}
                {{--<a href="#" class="button red"><span>✓</span></a>--}}
            {{--</div>--}}
            {{----}}
        </div>
    </div>
</section>

    {{----}}
    <!-- INFO BAR -->
    <section>
        <div class="container">

            <div class="row">

                <div class="col-sm-8 home-advertise" style="padding-left: 40px;">
                    <h1>Protege a tus Mascotas Con Patitas</h1><br>
                    <p>Con Patitas, tu mascota estará siempre protegida por nuestras 
identificaciones digitales. Si desafortunadamente tu mascota 
escapa no te preocupes la comunidad Con Patitas junto con 
nuestro equipo sabrá cuando alguien encuentre a tu mascota
 y te avisará mediante e-mail, SMS e incluso mediante 
geolocalización.  

                    </p>
                    <h4><a href="{{url('/upgrade')}}" style="color:#0d6aad !important;">Se parte de Con Patitas </a></h4>
                </div>

                <div class="col-sm-4 home-advertise text-align" style="padding-top:20px">
                    @if(Auth::guest())
                        {{--<button style="margin:0 auto;height:50px;padding:0 !important;" class="btn btn-primary">--}}
                     	    <a href="{{route("viewSignUpForm")}}" class="fancy-button bg-gradient1"><span><i class="fa fa-hourglass-start">&nbsp;</i>UNIRSE</span></a>
                            
                        {{--</button>--}}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- /INFO BAR -->
    <section class="padding-10">
        <div class="container">

            <div class="row">

                <div class="col-md-6" style="text-align: center"><a href="http://www.free-qr-code.net/top-10-qr-code-readers.html"><img src="{{asset("assets/images/googleplay_0.png")}}" class="img-responsive home"/></a></div>
                <div class="col-md-6" style="text-align: center;"><a href="https://play.google.com/store/search?q=qr%20code&c=apps"><img src="{{asset("assets/images/appleapp_0.png")}}" class="img-responsive home" /></a></div>

             </div>
        </div>
    </section>
    <!-- / -->
@endsection


