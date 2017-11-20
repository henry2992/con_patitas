@extends('layouts.app')

@section('contents')

    <section>
        <div class="container">
            <div class="row margin-bottom-10 padding-10 text-align">
                <div class="col-md-12 padding-10 text-align">
                    <div id="map"  style="height:500px"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgJqtsJhwhgCkgsQqfnUgJKVmwn2KcPV4&callback=initMap"
        type="text/javascript"></script>
<script>


    function initMap() {
        var lat = '{{$data !=null ? $data->lat : 0}}';var lng = '{{$data !=null ? $data->lng : 0}}';


        var latlng = {lat: parseFloat(lat), lng: parseFloat(lng)};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: latlng
        });
        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });
    }
//        $.ajax({
//            url: 'http://maps.googleapis.com/maps/api/geocode/json?latlng=40.714224,-73.961452&sensor=true',
//            dataType: 'json',
//            method: 'get',
//            headers: {"Access-Control-Allow-Origin": "*",
//            },
//            scriptCharset: "utf-8",
//            contentType: "application/json; charset=utf-8",
//
//            success: function (data) {
//                    console.log(data);
//                     infowindow = new google.maps.InfoWindow();
//                     google.maps.event.addListener(marker, 'click', function () {
//                     infowindow.setContent("<p>"+data.result.formatted_address+"</p>");
//                     infowindow.open(map, marker);
//                });
//            }
//        });

</script>
@endpush
