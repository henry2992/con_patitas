@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-11 col-sm-11 margin-left-10">
                    <div class="col-md-10">
                        <h1><b>How Con Patitas Works</b></h1>
                        <hr/>
                        <p>
                            ¡Observe el video a continuación para aprender más acerca de Con Patitas o visite nuestra tienda
                            para obtener su propio microship de identificación Con Patitas!
                        </p>
                    </div>

                    <div class="col-md-12">
                        <h3>
                            <b>¿Cómo funciona?</b>
                        </h3>
                    </div>

                    <div class="col-md-12 nopadding">
                        <div class="col-md-6">
                            <p>
                                Un chip de identificación físico que vincula a un perfil online GRATIS para su mascota.
                                Este perfil puede tener cualquier información que usted desee, incluyendo varios contactos de
                                emergencia, números de identificación de licencias y rabia, datos de microship, medicaciones
                                críticas y mucho más.
                            </p>
                            <br>
                            <br>
                            <h3>
                                <b>Cuando alguien encuentra su mascota pueden regresarla a casa de 3 formas diferentes</b>
                            </h3>
                            <ul>
                                <li>Escaneando el código QR</li>
                                <li>Escribiendo a la dirección web del chip</li>
                                <li>O llamando la línea de Mascotas Encontradas de Con Patitas disponible las 24 horas</li>
                            </ul>
                        </div>


                            <div class="col-md-8 youtube-video">
                                <iframe allowfullscreen="" style="width: 100%;height:300px;max-width: 400px" frameborder="0" src="https://www.youtube.com/embed/mMU84MIPpi4"></iframe>
                            </div>

                        <div class="col-md-11 text-align" style="position: relative;">
                            <hr/><br>
                            <a href="#" class="btn btn-primary">Compre ya</a>
                        </div>
                    </div>


                    <div class="col-md-12 nopadding">
                        <div class="margin-top-40"></div>
                        <div class="col-md-7">
                            <h3>¿Tiene más preguntas?</h3>
                            <br>
                            <ul>
                                <li>Visita nuestra págian de <a href="#">Preguntas Frecuentes</a></li>
                                <li><a href="#">Contáctenos </a>directamente</li>
                                <li>Visite nuestra amplia varidad de chips en nuestra <a href="#">Tienda</a></li>
                            </ul>
                        </div>

                        <div class="col-md-5">
                            <img src="{{asset("assets/images/How-it-works.jpg")}}" class="img-responsive" style="max-width: 400px"/>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </section>
@endsection