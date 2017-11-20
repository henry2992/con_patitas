@extends("layouts.app")
@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 text-align margin-left-20">
                    <form class="nomargin sky-form boxed" id="change_passwordForm" action="{{url("password/reset")}}" method="post">
                        {{csrf_field()}}
                        <input type='hidden' name='token' value={{$token}} />
                        <header>
                            <i class="fa fa-users"></i>Nueva Contraseña
                        </header>
                        <fieldset class="nomargin">

                            <div class="row margin-bottom-10">
                                <div class="col-md-8" style="width: 100%;">
                                    @if($status = Session::get("status"))
                                        <div class="alert alert-info form-group">
                                        <span class="help-block">
                                            <strong>{{$status}}</strong>
                                        </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row margin-bottom-10">
                                <div class="col-md-8">

                                    <input placeholder="Dirección e-mail" class="form-control" type="text" name="email" value="" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                       </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row margin-bottom-10">
                                <div class="col-md-8">

                                    <input placeholder="Nueva contraseña" class="form-control" type="password" name="password" value="" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                 <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row margin-bottom-10">
                                <div class="col-md-8">

                                    <input placeholder="Confirme nueva contraseña" class="form-control" type="password" name="password_confirmation" value="" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                 <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>
                        </fieldset>

                        <div class="row margin-bottom-10">
                            <div class="col-md-4 margin-left-15">
                                <button id="btn_change_password" class="btn btn-success form-control" type="submit">Confirmar nueva contraseña</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $status = '{{$status = Session::get("status")}}';
        if($status == 'Password Changed.'){

            setTimeout(redirect,3000);
        }

        function redirect(){
            location.href='{{url('signout')}}'
        }
    </script>
@endpush