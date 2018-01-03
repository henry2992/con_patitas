@extends("layouts.app")

@section("contents")
    <section style="padding-top:10px">
        <div class="container">
            <div class="row">
                <div class="col-md-11 margin-left-20 margin-right-20">
                    <div class="col-md-10">
                        <h3><b>Carrito de Compras</b></h3>
                        <hr/>
                    </div>

                    @if(isset($warning))
                        <div class="col-md-10 alert-danger" style="padding: 20px;">
                            <i class="fa fa-check-circle"></i>&nbsp; <b>{{$warning}}</b>
                        </div>
                    @endif

                    <div class="col-md-12" style="overflow-x:auto">

                        <form id="cartForm" action="{{url('cart/checkout')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="key" value=""/>
                            <table class="cart-table table table-bordered  table-hover" style="border: none;">
                                <thead class="table">
                                <tr>
                                    <th style="width:100px;max-width:100px"></th>
                                    <th style="min-width: 500px">Productos</th>
                                    <th style="min-width: 50px">Precio</th>
                                    <th style="width:100px;max-width: 100px;!important;">Productos</th>
                                    <th style="max-width: 60px !important;">Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $total = 0; ?>
                                @if(Auth::guard('web')->check())
                                    @if(null !== session('item_'.Auth::user()->id))
                                        @foreach(session('item_'.Auth::user()->id) as $item)

                                            <tr>
                                                <td><a href="javascript:void(0);" class="btn btn-danger"
                                                       id="{{$item['unique_key']}}"
                                                       onclick="removeItem(this);">Remove</a></td>
                                                <td style="text-align:left"><img src="{{asset($item['image'])}}"
                                                                                 width="40"
                                                                                 height="40"/>{{$item['productName']}}
                                                </td>
                                                <td>$0</td>
                                                <td>
                                                    <div>{{$item['quantity']}} </div>
                                                </td>
                                                <td>$0</td>
                                            </tr>


                                            <tr>
                                                <td><input type='hidden' name='product[]'
                                                           value={{$item['unique_key']}} /></td>
                                                <td style="text-align:left"><img
                                                            src="{{asset('assets/images/logo.png')}}" width="40"
                                                            height="40"/>Upgrade Service for {{$item['productName']}}
                                                </td>
                                                <td><input type="hidden" name="product_price[]"
                                                           value="{{$item['price'] }}"/> ${{$item['price'] }}</td>
                                                <td><input type="hidden" name="product_count[]"
                                                           value="{{ $item['quantity'] }}"/>
                                                    <div>{{$item['quantity']}} </div>
                                                </td>
                                                <td><input type="hidden" name="subtotal_amount[]"
                                                           value="{{$item['subtotal']}}"/> ${{$item['subtotal']}}</td>
                                            </tr>


                                            <?php $total = $total + $item['subtotal']; ?>
                                        @endforeach

                                        <tr>
                                            <td colspan="4" style="text-align: right;">
                                                <input type="hidden" id="total_amount" name="total_amount"
                                                       value="{{$total}}"/>
                                                Subtotal
                                            </td>
                                            <td style="background:antiquewhite;">
                                                <b>${{$total}}</b>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" style="border: none;"></td>
                                            <td style="border: none;">
                                                <a href="{{url('cart/view')}}" class="btn btn-primary">Actualizar</a>&nbsp;
                                            </td>
                                            <td style="border: none; vertical-align: top !important;">
                                                <input type="submit" class="btn btn-success" value="Pagar Ahora">
                                            </td>
                                        </tr>

                                        {{--Campos necesarios para xchange.ec--}}
                                        <input type="hidden" name="pay_user" value="{{Auth::user()->email}}">
                                        <input type="hidden" name="commerce" value="sebas.diaz.97@gmail.com">
                                        <input type="hidden" name="secret_key" value="ADB52C32-48C88-3753-1F39-90769F8BE67A">
                                    @endif
                                @endif
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="membership_popup" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cambiar membresía</h4>
                </div>

                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="margin-20">
                            <p>
                                Gracias por seleccionar nuestros productos. <br><br>
                                El nivel actual de su cuenta es Básico. Primero debe cambiarse a Premium para comprar
                                y recibir nuestros servicios. <br><br><br> Gracias.
                            <p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 1px 15px;border-top: 0">
                    <button type="button" id="upgrade_membership" class="btn btn-primary" data-dismiss="modal">Ok
                    </button>
                    <button type="button" class="btn btn-default close_popup" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js')

    <script>
        function removeItem(obj) {

            $key = $(obj).attr('id');

            $("input[name='key']").val($key);
            $("#cartForm").submit();

        }

        function checkMembership() {

            var isMembership = '<?php echo Auth::user()->membership == 1 ? 1 : 0; ?>';
            var isSelected = $("#membership").length;

            //if(isMembership == 0 && isSelected < 1 ) {
            //	$("#membership_popup").modal("show");
            //} else {

            var submitURL = '<?php echo url("cart/checkout"); ?>';
            $("#cartForm").attr("action", submitURL).submit();
            $("#checkout_button").hide();


            //}

        }

        $("#upgrade_membership").click(function () {

            location.href = "<?php echo url('cart/account'); ?>";
        });

        setCheckoutURL();

    </script>
@endpush
