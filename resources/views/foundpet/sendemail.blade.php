@extends("layouts.app")

@section("contents")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-12 margin-left-30">
                    <h3><b>Correo de los dueños de John</b></h3>
                    <hr/>
                </div>
                <div class="col-md-6 margin-left-30">
                    <label>Su dirección de correo<span class="red-mark"> *</span></label>
                    <input type="email" class="form-control" name="email" />
                </div>
                <div class="col-md-10 margin-left-30 margin-top-20">
                    <label>Su mensaje<span class="red-mark"> *</span> </label>
                    <textarea type="text" class="form-control" name="message" placeholder="Leave your message here"></textarea>
                </div>

                <div class="col-md-6 margin-top-20 margin-left-30">
                    {{--recaptch --}}
                    <div class="g-recaptcha" data-sitekey="6LdDxiAUAAAAANypiWiSqa00VusgSVlDbogtGzSp"></div>
                    {{--end recaptcha--}}
                </div>

                <div class="col-md-6 margin-top-20 margin-left-30">
                     <button class="btn btn-primary send-email" name="send"><i class="fa fa-check-circle"></i>ENVIAR</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push("js")
<script src='https://www.google.com/recaptcha/api.js'></script>
@endpush

