@extends("layouts.app")
@section("contents")

<section>
    <div class="container text-align">
        <div class="row">
            <div class="col-md-6 col-sm-6 text-align margin-left-20">
                <form class="nomargin sky-form boxed" action="{{route("updateProfile")}}" method="post">
                {{csrf_field()}}
                <header>
                    <i class="fa fa-users"></i> Change Email Address
                </header>
                <fieldset class="nomargin">

                    <div class="row margin-bottom-10">
                        <div class="col-md-6" style="width: 100%;">
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
                        <div class="col-md-6">

                            <input placeholder="New Email Address" class="form-control" type="email" name="email" value="{{old('email')}}" required>
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
                            <input class="btn btn-success form-control" type="submit" value="Change" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection