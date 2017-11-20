@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-11 col-sm-11 margin-left-10">
                    <h1><b>Preguntas frecuentes (FAQ)</b></h1>
                    <hr/>
                </div>

                <div class="col-md-11 margin-left-10">
                    
                    <p>
                        <b>¿Como funciona Con Patitas?</b>
                    </p>
                    <p>
                        1. Crea el perfil de tu mascota con patitas y añade su nombre, edad, medicaciones, alergias y tu contacto en caso que alguna vez se pierda. 
                    </p>
                    <p>
                        2.Conecta su perfil en conpatitas.com con su identificación QR. 
                    </p>
                    <p>
                        3.Lo que pasa si escanean el código QR de tu mascota:
                    </p>

                    <ul>
                        <li>Cuando escanean la identificación de tu mascota la persona que lo hace puede ver la información de tu mascota y la de  </li>
                        <li>Si las persona que encuentra tu mascota no tiene un teléfono inteligente siempre puede llamar a nuestro Call Center 1800-PATITAS o escribir el código de la mascota encontrada en nuestra página principal <a href='www.conpatitas.com' target='_blank'>www.conpatitas.com</a></li>
                        <li>Cuando la identificación de tu mascota es escaneada recibiras un e-mail con la ubicación donde estaba tu mascota cuando fue escaneada</li>
                    </ul>

                    <br>
                    <p>
                        <b>Necesitas un teléfono inteligente para usar nuestros servicios?</b>
                    </p>
                    <p>
                        No necesariamente, siempre pueden llamar a nuestro Call Center 1800-PATITAS pueden llamar a nuestro Call Center o acceder desde una computadora a <a href='www.conpatitas.com' target='_blank'>www.conpatitas.com</a> e ingresar el código del perro en “Encontré una mascota”
                    </p>
				<ul>
					<li>24/7 Con Patitas Call Center -  1800-PATITAS</li>
					<li>Con Patitas Notificaciones de escaneo– Siempre que la identificación de tu mascota sea escaneada recibirás una notificación. </li>
					<li>Mapa GPS –Recibirá una notificación con la última ubicación donde la identificación de su mascota fue escaneada. </li>
				</ul>
                    <br>
                    <p>
                        <b>¿La identificación digital tiene algún costo?</b>
                    </p>
                    <p>
                        No, la identificación es totalmente gratis, nosotros 
                    </p>

                    <br><br>
                    <p><b>¿Existe algún costo mensual por los servicios de Con Patitas?</b></p>
                    <p>
                        Si, el costo de nuestro servicio es de 1.99$ por mascota.
                    </p>
                   
                    <br>
                    <p><b>¿Existe algún costo mensual por los servicios de Con Patitas?</b></p>
                    <p>
                        Si, el costo de nuestro servicio es de 1.99$ por mascota.
                    </p>
                    <br><br>
                    <p><b>¿Existe algún recargo adicional?</b></p>
                    <p>
                       No, pero si alguna vez el servicio es cancelado se debitará el costo de la identificación QR (5$).
                    </p>
                    <br>
                    <p><b>¿Cómo funciona el mapa GPS?</b></p>
                    <p>
                       Una vez que la identificación de tu mascota es escaneada recibirás un e-mail con la última ubicación donde tu mascota fue encontrada.
                    </p>
                    <br>
                    <p><b>¿Qué pasa si pierdo o la identificación se daña?</b></p>
                    <p>
                       Nosotros le daremos una nueva identificación con su misma cuenta ya existente 
                    </p>
                    <br>
                    <p><b>¿Puedo cambiar la información de mi mascota gratis?</b></p>
                    <p>
                  	   Si, puedes cambiar la información de tus mascotas cuando quieras y las veces que quieras. 
                    </p>
                    <br>
                     <p><b>¿Con Patitas tiene una aplicación para leer codigos QR?</b></p>
                    <p>
                  	  No, nuestras identificaciones pueden usarse con cualquier aplicación para códigos QR, esto, con la finalidad que no sea necesario una aplicación en específico para ayudar una mascota.
                    </p>
                    <br>
                    <hr/>
                    <p>
                        <b>Más preguntas ?</b><a href="{{url("/contact")}}">Contáctenos !</a>
                    </p>

            </div>
        </div>
        </div>
    </section>
@endsection