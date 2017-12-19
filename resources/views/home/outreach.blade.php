@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-14 col-sm-14 margin-left-10">

                    <div class="col-md-5 margin-left-10">
                        <img class="img-responsive" src="{{asset("assets/images/non-profit.jpg")}}" width="300"/>
                    </div>
                    <div class="col-md-6 margin-left-10">
                        <h1><b>Programa sin fines de lucro 10-10 de Con Patitas</b></h1>
                        <hr/>

                        <p>
                            <b>
                                Refugios y organizaciones sin fines de lucro pueden usar los chips de Con Patitas
                                para oportunidades única de recaudación de fondos:
                            </b>
                        </p>

                        <br>
                        <ul>
                            <li>Gané ingresos de afiliado</li>
                            <li>Descuentos únicos en compras por cantidades</li>
                            <li>Códigos especiales de descuento para compartir en sus redes sociales</li>
                            <li>Donación de productos para eventos especiales</li>
                        </ul>

                        <br>
                        <br>
                        <p>
                            <b>¡Pregúntenos acerca de nuestros descuentos especiales, para organizaciones sin fines de lucro,
                                en nuestros chips personalizados!</b>
                        </p>
                        <br>
                        <h5><b>
                                <a href="#">Vea porque Con Patitas es la mejor solución disponible</a>
                            </b>
                        </h5>
                        <p>
                            <b>
                                Para comenzar o aprender más de como Con Patitas puede ayudar a su organización sin fines de
                                lucro,<a href="{{url("contactus")}}">contáctenos.</a>
                            </b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection