@extends("layouts.app")
@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 text-align margin-left-20">
                    <form class="nomargin sky-form boxed" id="change_passwordForm" action="{{url('password/email')}}" method="post">
                        {{csrf_field()}}
                        <header>
                            <i class="fa fa-users"></i> Recuperar Clave
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

                                    <input placeholder="Su dirección e-mail" class="form-control" type="email" name="email" value="" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                       </span>
                                    @endif
                                </div>
                            </div>
                           
                        </fieldset>

                        <div class="row margin-bottom-10">
                            <div class="col-md-3 margin-left-15">
                                <button id="btn_change_password" class="btn btn-success form-control" type="submit">Enviar e-mail</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

