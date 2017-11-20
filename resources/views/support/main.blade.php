@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 margin-left-30">
                    <h1><b>Ayuda</b></h1>
                    <hr/>
                    <p>¿Necesitas ayuda? Esto te podría ayudar:</p>
                </div>
                <div class="col-md-12 margin-left-30 margin-bottom-0">

                    <div class="col-md-7 text-align">
                        <div class="margin-top-10">
                            <a href="{{url("support/getreader")}}" class="bg-gradient2 fancy-button">
                                <span><i class="fa fa-qrcode">&nbsp;</i>  LECTORES DE IDENTIFICACIÓN QR</span>
                            </a>
                        </div>

                        <div class="margin-top-10">
                            <a href="{{url('/support/mobile')}}" class="bg-gradient2 fancy-button">
                                <span><i class="fa fa-mobile-phone">&nbsp;</i>APLICACIÓN CONPATITAS</span>
                            </a>
                        </div>

                        <div class="margin-top-10">
                            <a href="{{url('support/common_questions')}}" class="bg-gradient2 fancy-button">
                                <span><i class="fa fa-question-circle"> &nbsp;</i>PREGUNTAS FRECUENTES</span>
                            </a>
                        </div>

                        <div class="margin-top-10">
                            <a href="{{url('/support/shipping')}}" class="bg-gradient2 fancy-button">
                               <span><i class="fa fa-ship">&nbsp; </i>ENVÍOS Y DEVOLUCIONES</span>
                            </a>
                        </div>

                        <div class="margin-top-10">
                            <a href="{{url('/contact')}}" class="bg-gradient2 fancy-button">
                                <span><i class="fa fa-phone-square">&nbsp;</i>CONTÁCTENOS</span>
                            </a>
                        </div>

                    </div>

                    <div class="col-md-4 margin-left-20 padding-50">
                        <img src="{{asset("assets/images/support-dog.jpg")}}" class="responsive width-200" />
                    </div>
                    <div class="col-md-7 margin-left-30 margin-bottom-0" style="height:10px;background: url({{asset('assets/images/misc/shadow3.png')}}) no-repeat;opacity: 0.1;"></div>

                </div>
            </div>
        </div>
    </section>
@endsection