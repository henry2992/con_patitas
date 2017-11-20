@extends("layouts.app")
@section("contents")


    <section>
        <div class="container">
            <div class="row">
                <!-- LOGIN -->
                <div class="col-md-6 col-sm-6 margin-left-20 margin-right-20">
                    <!-- login form -->
                    <form id="loginForm" class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <h2><b>Ingresar</b></h2>
                        <hr/>
                        @if($errors->has("wrong"))
                        <div class="alert alert-danger form-group">
                            <span class="help-block">
                                <strong>{{$errors->first("wrong")}}</strong>
                            </span>
                        </div><br>
                        @endif
                        @if($status = Session::get("status"))
                            <div class="alert alert-info form-group">
                            <span class="help-block">
                                <strong>{{$status}}</strong>
                            </span>
                            </div><br>
                        @endif

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Dirección e-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="fancy-button bg-gradient2"><span><i class="fa fa-sign-in"></i>
                                    Ingresar</span>        
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- /login form -->
                </div>
                <!-- /LOGIN -->
                <!-- SOCIAL LOGIN -->
                <div class="col-md-5 col-sm-6 margin-left-20 margin-right-20">
                    <form action="#" method="post" class="sky-form boxed padding-20">
                        <header class="size-18 margin-bottom-20 text-align">
                           <h3>¿No eres parte de CONPATITAS ?</h3>
                        </header>
                        <fieldset class="nomargin">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12 margin-bottom-10">
                                        <i class="fa fa-check-circle "></i>
                                       Perfil dinámico para tus mascotas
                                    </div>
                                    <div class="col-md-12 margin-bottom-10">
                                        <i class="fa fa-check-circle"></i>
                                       La forma más confiable y eficaz de encontrar a tu amigo con patitas
                                    </div>
                                    <div class="col-md-12 margin-bottom-10">
                                        <i class="fa fa-check-circle"></i>
                                        Te contactaremos mediante SMS si tu amigo con patitas esta extraviado  
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <footer>
                           ¿No tienes una cuenta?  <a href="{{url("signup")}}"><strong>Regístrate</strong></a>
                        </footer>
                    </form>

                </div>
                <!-- /SOCIAL LOGIN -->

            </div>


        </div>
    </section>
    @endsection

@push('js')
<script src="{{asset('assets/js/jquery.validation.min.js')}}"></script>
<script>
    $("#loginForm").submit(function(e) {
        e.preventDefault();
    }).validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        message: {
            email :{
                required:"Please endter your email.",
                email : "please enter correct email."
            },
            password : {
                required : "please enter the password",
                minlength : "Please enter more than 6 letters."
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>
@endpush