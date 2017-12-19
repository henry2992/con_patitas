@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 margin-left-30">
                    <h1><b>Cambio de Membresía</b></h1>
                    <hr/>
                </div>

                <div class="col-md-10 margin-left-30 margin-top-20">
                    <h5><b>Nivel de cuenta de ConPatitas</b> : Básico (Gratis)</h5>
                    <hr/>
                    <h4>Está intentando utilizar una funcionalidad Premium</h4>
                    <p>
                        La funcionalidad de Reportar como Perdido le permite divulgar el perfil de su mascota a los refugios
                        que se encuentren en un radio de 80 kilómetros de donde la mascota fue vista la última vez.
                        Nuestra lista contiene más de 10,000 refugios en Estados Unidos y Canadá.
                        Por menos de $3 dólares mensuales usted puede tener esta funcionalidad y muchas más.
                    </p>
                    <br>
                    <br>
                    <label>* Las opciones de suscripción incluyen mensual, anual y de por vida.</label>
                </div>

                {{--More Help section--}}

                <div class="col-md-10 margin-left-30 margin-top-20">
                    <h1><b>Mas información</b></h1>
                    <hr/>
                    <p>
                        Confiamos en que las personas se suscriban a nuestras funcionalidad Premium para poder ofrecer
                        beneficios a nuestros usuarios y sus animales de compañía y evitar mostrar publicidad en nuestro sitio.
                        Además de los servicios que ofrecemos considere el servicio gratuito que se muestra debajo para ayudar
                        a recuperar su mascota.
                    </p>
                </div>

                <div class="col-md-10 margin-left-30 margin-top-20">
                    <div class="col-md-4 nopadding">
                        <img class="responsive" src="{{asset("assets/images/hlp-logo-120.jpg")}}" width="200" height="200" />
                    </div>
                    <div class="col-md-8">
                        <p>Nuestros amigos de <b>Helping Lost Pets (HeLP)</b> ofrecen, otra forma gratuita de localizar su mascota.
                            Para hacer uso de servicio visite el sitio HelpingLostPets.com.
                        </p>
                        <br>
                        <a href="http://www.helpinglostpets.com/v2/EditPet.aspx?sc=11" class="btn btn-primary" target="_blank">
                            Obtenga ayuda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection