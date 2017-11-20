@extends("admin/layout.home")

@section("contents")
    <section id="middle">
        <div class="container">
            <div class="row">
                <div class="col-md-8 margin-top-40 margin-left-10">
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
                    <form action="{{route('admin.ads.update')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="slider_one">Slider 1:</label>
                            <input type="text" class="form-control"
                                   value="{{$data->slider_one ? $data->slider_one :''}}"
                                   id="slider_one"
                                   name="slider_one"
                            />
                        </div>
                        <div class="form-group">
                            <label for="slider_two">Slider 2:</label>
                            <input type="text" class="form-control"
                                   value="{{$data->slider_two ? $data->slider_two :''}}"
                                   id="slider_two"
                                   name="slider_two"
                            />
                        </div>
                        <div class="form-group">
                            <label for="slider_three">Slider 3:</label>
                            <input type="text" class="form-control"
                                   value="{{$data->slider_three ? $data->slider_three :''}}"
                                   id="slider_three"
                                   name="slider_three"
                            />
                        </div>
                        <div class="form-group">
                            <label for="slider_four">Slider 4:</label>
                            <input type="text" class="form-control"
                                   value="{{$data->slider_four ? $data->slider_four :''}}"
                                   id="slider_four"
                                   name="slider_four"
                            />
                        </div>
                        <div class="form-group">
                            <label for="slider_five">Slider 5:</label>
                            <input type="text" class="form-control"
                                   value="{{$data->slider_five ? $data->slider_five :''}}"
                                   id="slider_five"
                                   name="slider_five"
                            />
                        </div>

                        <button type="submit" class="btn btn-default">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

