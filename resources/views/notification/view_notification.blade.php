@extends('layouts.app')

@section('contents')

    <section>
        <div class="container">
            <div class="row margin-bottom-10 padding-10">
            @if(count($data)>0)
              @foreach($data as $notification)
                <div class="col-md-12 notification_data">
                    <div class="col-md-2 padding-10">
                        <?php $avatar = \App\Pet::find($notification->pet_id)->avatar; ?>
                        <img src="{{asset($avatar)}}" width="100" height="100" />
                    </div>
                    <div class="col-md-7 padding-30">
                        <p>{{$notification->contents}}</p>
                    </div>
                    <div class="col-md-3 padding-10">
                        <a href="{{route('notification_view',array('id'=>$notification->id))}}" class="btn btn-primary" >View in Map</a>
                        <a href="#" class="btn btn-danger btn_delete_notification" data-value="{{$notification->id}}">Delete</a>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="col-md-12 text-align">
                <ul class="pagination nomargin">

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

            @else
                <div class="row text-align">
                    <div class="col-md-12">
                        <h1><b>You don't have any messages on this website</b></h1>
                    </div>
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('js')

    <script>
        $(".btn_delete_notification").click(function(){

            $notification_id = $(this).data('value');
            var html = $(this).parents('div.notification_data');

            $.ajax({
                url:'{{route('delete_notification')}}',
                method:'post',
                dataType:'json',
                data:{id:$notification_id},
                success:function(data){

                    if(data == "success") {
                        html.remove();
                    }
                }
            })
        });
    </script>
@endpush
