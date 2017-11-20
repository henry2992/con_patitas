@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{--<form action="" method="get">--}}
                       <h2>Identificaciones QR Con Patitas</h2><hr/>
                        <div class="col-md-6 row" style="padding: 20px;">
                         
                            <h4>Identificación QR</h4><br>
                            <p>Usted ha encontrado una mascota protegida por Con Patitas. Por favor ingrese el ID de la mascota abajo:</p><br>
                            <div class="col-md-12 text-align">
                                <input type="text" id="tagId" class="form-control" required style="width: 250px;margin:0 auto !important" placeholder="Enter tag"/><br>
                                <a id="btn_found" class="bg-gradient2 fancy-button"><span><i class="fa fa-phone-square">&nbsp;</i>Buscar</span></a>
                                </div>
                        </div>
                    {{--</form>--}}
                    <div class="col-md-4" style="padding:20px">
                        <img src="{{asset("assets/images/dog_w_tag.png")}}" style="width:70%"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--        Alert modal     --}}

<div class="modal fade" id="status_popup" tabindex="-2" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-default close_popup" data-dismiss="modal">Cerca</button>
            </div>

        </div>
    </div>
</div>
{{--        Alert modal     --}}

@endsection


@push('js')
    <script>
        $(function(){

            $("#btn_found").click(function(){

                var id = $("#tagId").val()
                if(id == "" || id.length < 4 ){
                    $("#status_popup .modal-body").html('<h3>Por favor revisa tu información.</h3>');
                    $("#status_popup").modal("show");

                    return false;
                }
                foundPet(id);
            });
        });

        function foundPet(id){
            location.href = '{{url('pets/tag')}}'+'/'+id;
        }
    </script>
@endpush
