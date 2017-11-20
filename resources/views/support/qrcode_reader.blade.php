@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 margin-left-20">
                    <h1><b>Lectores de Identificación QR</b></h1>
                    <hr/>
                    <div class="col-md-8 nomargin nopadding">

                        <h4>Con Patitas ID tags allow you to access a pet's critical information in a number of ways:</h4>

                        <ul>
                            <li>Call-Center </li>
                            <li>URL sin necesidad de lector QR</li>
                            <li>Identificación QR escaneable </li>
                        </ul>
                        <br>
                        <p>
                           Si tu teléfono no tiene un lector de identificación QR, estas son algunas opciones para tu celular: 
                        </p>
                    </div>

                    <div class="col-md-4 text-align">
                        <img src="{{asset("assets/images/qrcode.png")}}" class="responsive width-150" />
                    </div>
                </div>

                <div class="col-md-12 margin-left-20" style="text-align: center">
                    <div class="col-md-2 mobile-phones padding-30"><a href="https://play.google.com/store/search?q=qr%20code&c=apps"><img src="{{asset("assets/images/app-store-badge.png")}}" class="width-150"/></a></div>
                    <div class="col-md-2 mobile-phones padding-30"><a href="http://www.free-qr-code.net/top-10-qr-code-readers.html"><img src="{{asset("assets/images/google-play.png")}}" class="width-150"/></a></div>
                    <div class="col-md-2 mobile-phones padding-30"><a href="http://www.windowscentral.com/top-qr-and-barcode-apps-windows-phone"><img src="{{asset("assets/images/windows-phone.png")}}" class="width-150"/></a></div>
                </div>

                <div class="margin-left-30 col-md-11">
                    <p>
                        Estos lectores QR para su Smartphone no mantienen ninguna relación con CONPATITAS.COM, usted puede usar cualquier opción para escanear la identificación QR. 
                    </p>
                </div>

               <!-- <hr/>

                <div class="margin-left-30 col-md-11">
                    <p>
                        <span class="red-mark"> *Note </span>: Con Patitas does not endorse any one QR code reader.
                        It is your responsibility to weigh and assess which reader you feel comfortable with installing on your phone.
                    </p>
                </div> -->
            </div>
        </div>
    </section>
@endsection