@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="margin-left-30 margin-right-30">
                    <div class="col-md-12">
                        <h1><b>Nuestra Historia</b></h1>
                        <hr/>
                    </div>

                    <div class="col-md-12">
                        <div>
                            <img class="img-responsive" src="{{asset("assets/images/tom-ullr.jpg")}}" style="width: 400px; float: right; border-width: 1px; border-style: solid;">
                            <p>Llegaste en el momento justo, somos un proyecto nuevo, nuestra historia acaba de empezar. Se parte de ella, con patitas. </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h1><b>Nuestra Misión</b></h1>
                        <hr/>
                    </div>
                    <div class="col-md-12">
                        <div>
                          
                            <p>Asegurarnos que tú y tu amigo/s con patitas estén siempre juntos. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection