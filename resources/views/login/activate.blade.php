@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 margin-left-20">
                    <h1><b>Active su microship o collar</b></h1>
                    <hr/>
                <p>
                    ¡Estamos muy contentos de que esté aquí! Conéctemos su microship o collar con su mascota. Pero primero,
                    necesitamos saber si es un Usuario Registrado o un Usuario Nuevo.
                </p>

                <br>
                <p>
                    <b>Usuario Registrado </b>-
                    si previamente ha comprado algún artículo en nuestro sitio o activado algún microship o collar
                </p>
                <p>
                    <b>Usuario Nuevo</b>-
                    nunca ha visitado antes nuestro sitio
                </p>
                <br>
                <a href="{{url("signup")}}" class="btn btn-primary">Usuario Nuevo</a>
                <a href="{{url("login")}}" class="btn btn-success">Usuario Registrado</a>
                  <div class="margin-top-20"></div>
                    <p>
                        (Si no está seguro trate de registrarse y si le informa que su cuenta existe regrese a esta página y presion en Usuario registrado o contacte a nuestro equipo de soporte y ayuda)
                    </p>
                    <hr/>
                    <p>
                        <b>Necesita más ayuda? WVea nuestros tutoriales</b>: http://Con Patitas.com/How-To-Videos
                    </p>
                    <br>

                    <ul>
                        <li><a href="#" >Cómo crear una cuenta"</a></li>
                        <li><a href="#">Cómo agregar una mascota"</a></li>
                        <li><a href="#">Cómo conectar un microship"</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection