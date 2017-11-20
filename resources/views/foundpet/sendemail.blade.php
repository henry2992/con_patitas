@extends("layouts.app")

@section("contents")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-12 margin-left-30">
                    <h3><b>Email Owners Of John</b></h3>
                    <hr/>
                </div>
                <div class="col-md-6 margin-left-30">
                    <label>Your Email Address<span class="red-mark"> *</span></label>
                    <input type="email" class="form-control" name="email" />
                </div>
                <div class="col-md-10 margin-left-30 margin-top-20">
                    <label>Your Message<span class="red-mark"> *</span> </label>
                    <textarea type="text" class="form-control" name="message" placeholder="Leave your message here"></textarea>
                </div>

                <div class="col-md-6 margin-top-20 margin-left-30">
                    {{--recaptch --}}
                    <div class="g-recaptcha" data-sitekey="6LdDxiAUAAAAANypiWiSqa00VusgSVlDbogtGzSp"></div>
                    {{--end recaptcha--}}
                </div>

                <div class="col-md-6 margin-top-20 margin-left-30">
                     <button class="btn btn-primary send-email" name="send"><i class="fa fa-check-circle"></i>SEND</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push("js")
<script src='https://www.google.com/recaptcha/api.js'></script>
@endpush

