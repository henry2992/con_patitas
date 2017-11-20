@extends("layouts.app")
@section("contents")


    <section>
        <div class="container">
            <div class="row">
                <!-- LOGIN -->
                <div class="col-md-8 col-sm-8">
                    <!-- login form -->
                    <form id="contact_form" action="{{route('contact.submit')}}" method="post" class="sky-form boxed">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <header class="size-18 margin-bottom-20">
                            <h2>Contáctenos</h2>
                            <hr/>
                            <!-- ALERT -->
                                    @if($status = Session::get("status"))
                                        <div class="alert alert-info form-group">
                                            <span class="help-block">
                                                <strong>{{$status}}</strong>
                                            </span>
                                        </div>
                                    @endif
                        </header>

                        <fieldset class="nomargin">
                            <label class="input margin-bottom-10">
                                <label class="input">Dirección e-mail <span class="red-mark"> *</span> </label>
                                <input required="" class="form-control"  type="email" name="email" required>
                            </label>

                            <label class="input margin-bottom-10">
                                <label class="input">Mensaje <span class="red-mark"> *</span> </label>
                                <textarea style="width: 100%;height: 100px;" class="form-control" name="contents" required> </textarea>
                            </label>

                            {{--<label class="input margin-bottom-10">--}}

                                {{--<label class="input">Description <span class="red-mark"> *</span> </label>--}}
                                {{--<input type="file" name="file"/>--}}
                            {{--</label>--}}
                        </fieldset>
                        <footer>
                            <button type="submit" class="bg-gradient2 fancy-button"><span><i class="fa fa-check">&nbsp;</i> Enviar</span></button>
                        </footer>
                    </form>
                    <!-- /login form -->

                </div>
                <!-- /LOGIN -->
            </div>
        </div>
    </section>
@endsection

@push('js')
<script src="{{asset('assets/js/jquery.validation.min.js')}}"></script>

<script>


    $("#contact_form").submit(function(){}).validate({

        rules:{
            email:{
                required:true
            },
            contents:{
                required:true,
                minlength:30
            }
        },
        message : {
            email:{
                required:"Please endter your email."
            },
            contents:{
                required:"Please endter your email.",
                minlength:"Please enter more than 30 words"
            }
        },
        submitHandler: function(form) {
           form.submit();
        }
    })
</script>
@endpush