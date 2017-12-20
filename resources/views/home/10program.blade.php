@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-10 margin-left-20">
                    <div class="col-md-11 margin-left-20">
                        <h1><b>Programa 10-10 Con Patitas</b></h1>
                        <hr/>

                        <h4>
                            <b>
                                Con Patitas está orgullos de ofrecer un programa de recaudación de fondos para ayudar
                                no solo a organizacion sin fines de lucro en sus esfuerzos de recaudación, sino
                                par aofrecer la solución más confiable de recuperar sus mascotas pérdidas.</b>
                        </h4>
                    </div>

                    <div class="col-md-11">
                        <div class="col-md-9">
                            <h4>
                                <b>
                                    Las organizaciones que califiquen recibirán los siguientes beneficios:
                                </b>
                            </h4>

                            <br>
                            <ul>
                                <li>Precios preferenciales para comprar por cantidades de los chips de Con Patitas.</li>
                                <li>Los chips comprados pueden ser revendidos, sorteados o incluidos en paquetes de regalos</li>
                                <li>Certificados de Regalos "10-10"<a href="#note1"> [1]</a></li>
                                <li>Chips personalizados para recaudaciones de fondos a gran escala <a href="#note2">[2]</a></li>
                                <li>Sorteos y paquetes de subasta para eventos de recaudación de fondos especiales</li>
                            </ul>
                        </div>
                        <div class="col-md-2 margin-top-40">
                            <img class="img-responsive" src="{{asset("assets/images/preventative pet.png")}}" width="200"/>
                        </div>

                    </div>

                    <div class="col-md-11">
                        <hr/>
                        <div class="col-md-9">
                                <h4>
                                    <b>
                                        Para ser considerado en el programa 10-10 de Con Patitas, su organización debe cumplir
                                        ciertas calificaciones y requisitos, incluyendo:
                                    </b>
                                </h4>

                            <ul>
                                <li>Status verificado de que es sin fines de lucro</li>
                                <li>Creación y uso de una cuenta gratuita de ConPatitas.com</li>
                                <li>Compromiso de distribución de los michroships de identificación de Con Patitas comprados
                                    a través del programa y asegurándose de proveer instrucciones de uso junto con los chips</li>
                            </ul>
                        </div>
                        <div class="col-md-2 margin-top-40">
                            <img class="img-responsive" src="{{asset("assets/images/chris-tag-transparent.png")}}" width="200" />
                        </div>
                    </div>


                    <div class="col-md-11">
                        <hr/>
                        <p>
                            Para una página imprimible con información del programa 10-10 haga <a href="#">CLICK AQUÍ</a>
                        </p>

                        <br>
                        <p>
                            Para descargar un formuario de aplicación al programa 10-10 haga <a href="#">CLICK AQUÍ</a>
                        </p>
                        <br>
                        <p id="note1">
                            [1] A las organizaciones se les entrega un código único para un Certificado de Regalo de $10
                            de todos los productos y servicios de Con Patitas, a través de un imprimible en PDF que puede ser vendido
                            o incluído como parte de los paquetes de adopción. Cada cuarto financiero, Con Patitas dará a la
                            organización un 10% de descuento en todas las ventas producidas a través de este código.
                        </p>
                        <br>
                        <p id="note2">
                            [2] Es necesario comprar una cantidad mínima de chips personalizados. Existen paquetes personalizados
                            para compras por cantidades mayores a 1500 chips para organizaciones altamente calificadas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection