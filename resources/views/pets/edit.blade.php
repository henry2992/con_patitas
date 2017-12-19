@extends("layouts.app")
@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 margin-left-10 margin-right-10">


                    <h1><b>Editar Perfil</b></h1>
                    <hr/>



                    <fieldset class="nomargin" style="border: rgba(210, 207, 207, 0.72) solid 1px;padding: 20px;">
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

                        <hr/>
                        <div class="row margin-bottom-10">
                            <div class="col-md-6" style="width: 100%;">
                                <br class="input">Foto

                                <form  name ='photo' action="" id='imageuploadform' method="post"  enctype="multipart/form-data">
                                    <input hidden="true" id="fileupload" type="file" accept=".jpg,.png" name="image[]" style="display: none;">
                                </form>

                                @if(!empty($data->avatar))
                                     <img id="avatar" src="{{asset($data->avatar)}}" class="img-responsive" style="width: 200px;height: 200px;"/>
                                @else
                                     <img id="avatar" src="{{asset('assets/images/dog-avatar.jpg')}}" class="img-responsive" style="width: 200px;height: 200px;"/>
                                @endif
                                    <div class="progress" style="display: none;width: 200px;max-width: 200px;">
                                    <div class="bar" style="background: red;height: 20px;"></div >
                                    <div class="percent" style="position: absolute;">0%</div >
                                </div>

                                <br>
                                <h5 style="margin:2px">Los archivos deben de pesar menos de 4 MB</h5>
                                <h5>Tipo de archivos permitidos: png , gif, jpg</h5>
                                </label>
                            </div>
                        </div>

                        <form class="nomargin " action="{{route("update_pet")}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="petId" value="{{$data->id}}">

                            <div class="row margin-bottom-10">
                                <div class=" col-md-4">
                                    <label class="input">ID de Microship</label>
                                </div>
                                <div class=" col-md-8">

                                    <input type="text" class="form-control"  name="tag" value="{{isset($data->tag_id) ? $data->tag->tag: ''}}">
                                    <input type="hidden" name="old_tag" value="{{$data->tag_id ? $data->tag->tag:''}}" />
                                </div>

                            </div>

                            <label><h4>Datos críticos de la mascota </h4></label>
                            <div class="row margin-bottom-10">
                                <div class="col-md-4">
                                    <label class="input">Raza</label>
                                </div>

                                <div class="col-md-8">

                                    <input type="text" class="form-control" required name="breed" value="{{$data->breed ? $data->breed : ''}}">
                                    <input type="hidden" id="avatarPath" name="avatar" value="{{$data->avatar ? $data->avatar:''}}" />   {{--   Uploaded image path    --}}
                                </div>
                            </div>



                            <div class="row margin-bottom-10">
                                <div class="col-md-4">
                                    <label class="input">
                                        Nombre de la mascota
                                    </label>
                                </div>
                                <div class="col col-md-8">
                                    <label class="input">
                                        <input type="text" class="form-control" name="name" value="{{$data->name ? $data->name : ''}}">
                                    </label>
                                </div>
                            </div>

                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                    <label class="input">
                                        Género
                                    </label>
                                </div>
                                <div class="col col-md-8">
                                    <select style="height:40px;padding: 0;width: 100%;" name="gender" class="form-control">
                                        <option value="1" {{$data->gender == 1 ? 'selected':''}}>Masculino</option>
                                        <option value="2" {{$data->gender == 2 ? 'selected':''}}>Femenino </option>
                                        <option value="3" {{$data->gender == 3 ? 'selected':''}}>Otro</option>
                                    </select>
                                    <i></i>
                                </div>
                            </div>

                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                    <label class="input">
                                        Tipo de mascota
                                    </label>
                                </div>
                                <div class="col col-md-8">
                                    <select style="height:40px;padding: 0;width: 100%;" name="type" class="form-control">
                                        <option value="1" {{$data->type == 1 ? 'selected' : ''}}>Perro</option>
                                        <option value="2" {{$data->type == 2 ? 'selected' : ''}}>Gato </option>
                                    </select>
                                    <i></i>
                                </div>
                            </div>

                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                    <label class="input">
                                        Fecha de nacimiento
                                    </label>
                                </div>
                                <div class="col col-md-8">
                                    <label class="input">
                                        <input class="form-control" type="text" id="birthday" class="form-control datepicker" name="birth" value="{{$data->birth ? $data->birth : ''}}"/>
                                    </label>
                                    <i></i>
                                </div>
                            </div>
                            {{--weight --}}

                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                    <label class="input">
                                        Peso
                                    </label>
                                </div>

                                <div class="col col-md-3">
                                    <label class="input">
                                        <input type="text"  name="weight" class="form-control" value="{{$data->weight ? $data->weight :''}}"/>
                                    </label>
                                    <i></i>
                                </div>
                                <div class="col col-md-2">

                                    <select style="height:40px;padding: 0;width: 100%;" name="unit" class="form-control">
                                        <option value="1" {{$data->unit == 1 ? 'selected':''}}>Kg</option>
                                        <option value="2" {{$data->unit == 2 ? 'selected':''}}>lb</option>
                                    </select>
                                </div>
                                <div class="col col-md-3">
                                    {{--for space--}}
                                </div>
                            </div>
                            {{--end weight--}}

                            {{--spay/neuter--}}
                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                    <label class="input">
                                        Castrado/a 
                                    </label>
                                </div>
                                <div class="col col-md-4">

                                    <select style="height:40px;padding: 0;width: 100%;" name="spay" class="form-control">
                                        <option value="1" {{$data->spay == 1?'selected':'' }}>Si</option>
                                        <option value="0" {{$data->spay == 0?'selected':'' }}>No</option>
                                    </select>
                                </div>
                                <div class="col col-md-3">
                                    {{--for space--}}
                                </div>
                            </div>
                            {{--end spay/neuter--}}

                            {{--Start Rabies Tag --}}
                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                    <label class="input">
                                       Etiqueta de rabia
                                    </label>
                                </div>
                                <div class="col col-md-4">

                                    <label class="input">
                                        <input type="text" class="form-control" name="rabiestag" value="{{$data->rabiestag ? $data->rabiestag : ''}}"/>
                                    </label>
                                </div>
                            </div>
                            {{--End rabies tag--}}

                            {{--Start License --}}
                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                    <label class="input">
                                       Licencia
                                    </label>
                                </div>
                                <div class="col col-md-4">
                                    <label class="input">
                                        <input type="text" name="license" class="form-control" value="{{$data->license ? $data->license : ''}}"/>
                                    </label>
                                </div>
                            </div>
                            {{--End License--}}

                            {{--Start Microchip ID --}}
                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                    <label class="input">
                                       ID de Microchip
                                    </label>
                                </div>
                                <div class="col col-md-4">
                                    <label class="input">
                                        <input type="text" name="microchip" class="form-control" value="{{$data->microchip ? $data->microchip : ''}}"/>
                                    </label>
                                </div>
                            </div>
                            {{--End Microchip ID--}}

                            {{--Start Municipal license--}}

                            {{--End Municipal License--}}


                            <hr/>
                           
                            {{--Additional Section --}}
                            <hr/>
                            <h4>Descripción adicional (Color, marcas, etc)</h4>
                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4" style="width:100%">
                                    <label class="input">
                                        <textarea style="width:100%;height:100px" name="additional_color" class="form-control">{{$data->additional_color ? $data->additional_color : ''}}</textarea>
                                    </label>
                                    <h5>Describe cualquier marca distintiva que ayudaría a identificar a tu mascota </h5>
                                </div>
                            </div>
                            <hr/>

                            <h4>Additional Description</h4>
                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4" style="width: 100%;" >
                                    <label class="input">
                                       Información médica, de comportamiento u otra información
                                    </label>
                                    <textarea style="width:100%;height:100px" name="additional_medical" class="form-control">{{$data->additional_medical ? $data->additional_medical : ''}}</textarea>
                                    <h5>Cuéntanos un poco sobre tu mascota</h5>
                                </div>

                            </div>
                            <hr/>
                            <div class="margin-bottom-10 row">
                                <div class="col col-md-6">
                                    <label>Mascota está perdida<input type="checkbox" style="margin: 10px;" name="missing" class="checkbox-inline" value="0" {{$data->missing == 1 ? 'checked' : ''}}/></label>
                                </div>
                            </div>


                            <div class="g-recaptcha" data-sitekey="6LdDxiAUAAAAANypiWiSqa00VusgSVlDbogtGzSp"></div>
                            {{--end recaptcha--}}


                            <div class="row margin-bottom-10 margin-top-20">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save Profile</button>
                                </div>
                            </div>

                        </form>
                    </fieldset>
                    <!-- /register form -->

                </div>
            </div>
        </div>
    </section>
@endsection

@push("css")
<link href="{{asset("assets/css/bootstrap-datepicker.min.css")}}" rel="stylesheet" type="text/css">
@endpush
@push("js")
{{--<script src='https://www.google.com/recaptcha/api.js'></script>--}}
<script src="{{asset("assets/js/bootstrap-datepicker.min.js")}}"></script>
<script>
    $(function(){

        $("#birthday").datepicker({
            format: 'yyyy-mm-dd'
        });
        $("#municipal_expiration").datepicker({
            format: 'yyyy-mm-dd'
        });

        $("#avatar").click(function(){
            $('#fileupload').click();
        })


    });

    //        File upload asynchronously
    $('#fileupload').change(function (e) {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar').attr('src', e.target.result)
            };

            reader.readAsDataURL(this.files[0]);
        }

        $("#imageuploadform").submit();
        e.preventDefault();

    });

    $("#imageuploadform").submit(function(e){


        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: '{{url('uploadFile/avatar/300')}}',
            data:formData,
            dataType:'json',
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    myXhr.upload.addEventListener('progress',progress, false);
                }
                return myXhr;
            },
            cache:false,
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            contentType: false,
            processData: false,

            success:function(data){
                if(data.status == "success") {
                    $("#avatarPath").val(data.path+'/'+data.filename);
                }else{
                    alert(data.status);
                }
            },

            error: function(data){
                console.log(data.status);
            }
        });

        e.preventDefault();
    });


    function progress(e){

        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');

        if(e.lengthComputable){
            var max = e.total;
            var current = e.loaded;

            var Percentage = parseInt((current * 100)/max);
            console.log(Percentage);
            percent.text(Percentage+'% completed');
            bar.css('width',Percentage+'%');
            $(".progress").show();
            if(Percentage >= 100)
            {
                // process completed
            }
        }
    }

</script>
@endpush
