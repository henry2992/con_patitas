@extends("layouts.app")

@section("contents")
    <section>
        <div class="container">

            <div class="row">

                <div class="col-md-11 margin-left-20">
                    <h1><b>Forum & Noticias</b></h1>
                    <hr/>
                </div>


                <!-- RIGHT -->
                {{--<div class="col-md-3 margin-left-20">--}}

                    {{--<!-- INLINE SEARCH -->--}}
                    {{--<div class="inline-search clearfix margin-bottom-60">--}}
                        {{--<form action="" method="get" class="widget_search">--}}
                            {{--<input placeholder="Search Forum..." id="s" name="s" class="serch-input" type="search">--}}
                            {{--<button type="submit">--}}
                                {{--<i class="fa fa-search"></i>--}}
                            {{--</button>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    {{--<!-- /INLINE SEARCH -->--}}
                    {{--<!-- SIGNED IN -->--}}
                    {{--<h5 class="bold nomargin-bottom">--}}
                        {{--<small class="pull-right size-14 weight-300">(signed in)</small>--}}
                        {{--Welcome, Felicia Doe--}}
                    {{--</h5>--}}
                    {{--<!-- SIDE NAV -->--}}
                    {{--<ul class="side-nav list-group margin-bottom-80" id="sidebar-nav">--}}
                        {{--<li class="list-group-item active"><a href="page-profile.html"><i class="fa fa-eye"></i> PROFILE</a></li>--}}
                        {{--<li class="list-group-item"><a href="page-profile-comments.html"><i class="fa fa-comments-o"></i> COMMENTS</a></li>--}}
                        {{--<li class="list-group-item"><a href="page-profile-history.html"><i class="fa fa-history"></i> HISTORY</a></li>--}}
                        {{--<li class="list-group-item"><a href="page-profile-settings.html"><i class="fa fa-gears"></i> SETTINGS</a></li>--}}
                        {{--<li class="list-group-item"><a href="#"><i class="fa fa-power-off"></i> LOG OUT</a></li>--}}
                    {{--</ul><!-- /SIDE NAV -->--}}
                    {{--<!-- /SIGNED IN -->--}}

                {{--</div>--}}
                <!-- LEFT -->
                <div class="col-md-11  margin-left-20">


                    <!-- post -->
                @if(count($data)>0)
                  @foreach($data as $blog)
                    <div class="clearfix margin-bottom-60">

                        <div class="border-bottom-1 border-top-1 padding-10">
                            <span class="pull-right size-11 margin-top-3 text-muted">{{date('Y m d',strtotime($blog->updated_at))}}</span>
                            <i class="fa fa-user"></i><span style="font-size:16px;color:#0a0a71 !important"><b> {{$blog->user->firstname.' '.$blog->user->lastname}}</b></span>
                        </div>

                        <div class="block-review-content">
                            <div class="block-review-body">
                                <div class="block-review-avatar text-center">
                                    <div class="push-bit">
                                        <a href="#">
                                            @if($blog->avatar)
                                               <img src="{{asset($blog->avatar)}}"  width="200" class="img-responsive">
                                            @else
                                                <img src="{{asset('assets/images/dog-avatar.jpg')}}"  width="200" class="img-responsive">
                                            @endif
                                        </a>
                                    </div>
                                    {{--<small class="block">admin</small>--}}
                                    {{--<small class="block">473 Posts</small>--}}
                                    <hr>
                                    {{--<div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>--}}
                                </div>

                                <p style="overflow-wrap: break-word;padding:20px";>
                                    {{$blog->text ? $blog->text:''}}
                                </p>
                                <em>- {{$blog->user->firstname}} <br>{{$blog->user->lastname}}</em>
                            </div>
                        </div>

                    </div>
                  @endforeach
                @else
                        <div class="row text-align">
                            <div class="col-md-11">
                                <h2><b>No tiene mensajes en el sitio</b></h2>
                            </div>
                            <div class="col-md-11">
                                <hr/>
                            </div>
                        </div>
                @endif
              

                    <!-- /post -->

                    <!-- WARNING -->
                    @if(!Auth::check())
                    <div class="alert alert-warning alert-bordered-dashed text-center margin-bottom-30"><!-- DASHED -->
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
                        <p>DEBE ESTAR LOGUEADO PARA RESPONDER EN ESTE TEMA!</p>
                    </div>
                    @endif
                    <!-- /WARNING -->
                    @if(Auth::check())
                    <!-- post -->
                    <div class="clearfix margin-bottom-60">

                        <div class="border-bottom-1 border-top-1 padding-10">
                            <span class="pull-right size-11 margin-top-3 text-muted">today</span>
                            <strong>DEJE SU RESPUESTA</strong>
                        </div>

                        <div class="col-md-6" style="width: 100%;">
                            <br class="input">Foto

                            <form  name ='photo' action="" id='imageuploadform' method="post"  enctype="multipart/form-data">
                                <input hidden="true" id="fileupload" type="file" accept=".jpg,.png" name="image[]" style="display: none;">
                            </form>

                                <div class="col-md-4">
                                    <img id="avatar" src="{{asset('assets/images/dog-avatar.jpg')}}" class="img-responsive" style="width: 200px;height: 200px;"/>
                                </div>
                            <form action="{{route('save_post')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="hidden" id="avatarPath" name="avatarPath"/>
                                    <div class="progress" style="display: none;width: 200px;max-width: 200px;">
                                        <div class="bar" style="background: red;height: 20px;"></div >
                                        <div class="percent" style="position: absolute;">0%</div >
                                    </div>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="text" style="height: 200px;"></textarea>
                                     @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                     @endif
                                </div>
                                    <button class="btn btn-success">Publique una noticia</button>
                            </form>

                        </div>

                    </div>
                    <!-- /post -->
                    <!-- pagination -->
                    <div class="text-center">
                        <ul class="pagination">
                            @if($page>5 && $totalPage > 0)
                                <li><a href="{{route('list_notifications',array('id'=>floor($page/5)*5))}}"><i class="fa fa-arrow-left"></i></a></li>
                                {{--@else--}}
                                {{--<li><a href="#" style="color: #666;"><i class="fa fa-arrow-left"></i></a></li>--}}
                            @endif
                            @for($i=floor(($page-1)/5)*5;$i<floor(($page-1)/5)*5+5;$i++)
                                @if($i<$totalPage)
                                    <li {{$i == $page-1 ? 'class=active' : ''}}><a href="{{route('list_notifications',array('page'=>$i+1))}}">{{$i+1}}</a></li>
                                @endif
                            @endfor
                            @if($totalPage>ceil($page/5)*5)
                                <li><a href="{{route('list_notifications',array('id'=>ceil($page/5)*5+1))}}"><i class="fa fa-arrow-right"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- /pagination -->
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
{{--For editor--}}
@push("css")

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@endpush
@push("js")
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
<script>


    $("#avatar").click(function(){
        $('#fileupload').click();
    })
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
