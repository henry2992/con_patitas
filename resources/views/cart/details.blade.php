@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-11 margin-left-20 margin-right-20">
                    <div class="col-md-10">
                        <h1><b>Carrito de Compras</b></h1>
                        <hr/>
                    </div>

                    @if($errors->has('status'))
                    <div class="col-md-10 alert-danger" style="padding: 20px;">
                        <i class="fa fa-check-circle"></i><b> Get me Home Club QR Tag added to your <a href="{{url("cart")}}">shopping cart.</a></b>
                    </div>
                    @endif
                    @if(isset($warning))
                    <div class="col-md-10 alert-danger" style="padding: 20px;">
                        <i class="fa fa-check-circle"></i>&nbsp; <b>{{$warning}}</b>
                    </div>
                    @endif
                    <div class="col-md-12" style="overflow-x:auto">
                        <hr/>
                    <form id="cartForm" action="{{url('cart/delete')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" name="key" value="" />
                        <table class="cart-table table table-bordered  table-hover">
                            <thead class="table">
                                <tr>
                                    <th style="width:100px;max-width:100px"></th>
                                    <th style="min-width: 500px">Productos</th>
                                    <th style="width:100px;max-width: 100px;!important;">Productos</th>
                                    <th style="max-width: 60px !important;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total=0; ?>
                                
                                @if(Auth::guard('web')->check())                          
                                @if(null !== session('item_'.Auth::user()->id))
                                @foreach(session('item_'.Auth::user()->id) as $item)
                                
                                <tr>
                                    <td><a href="javascript:void(0);" class="btn btn-danger" id="{{$item['unique_key']}}" onclick="removeItem(this);">Remove</a> </td>
                                    <td><img src="#" width="40" height="40" />{{$item['productName']}} </td>
                                    <td><input type="number" class="form-control" value='{{$item['quantity']}}' disabled /></td>
                                    <td>${{$item['price']}}</td>
                                </tr>
                                <?php $total=$total+$item['price'];?>
                                @endforeach
                          
                               <tr>
                               <td colspan="4" style="text-align: right;">Subtotal :${{ $total}}</td>
                            </tr>
                                  @endif
                                @endif
                            </tbody>
                        </table>
                    </form>

                    </div>
                    <div class="col-md-11 text-align-right"><a href="{{url('cart/view')}}" class="btn btn-primary">Actualizar</a>&nbsp;
                        <a href="{{url('checkout/view')}}" class="btn btn-success">Check Out</a> 
                    </div>
               </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

    <script>
  
       function removeItem(obj){

            $key = $(obj).attr('id');

            $("input[name='key']").val($key);
            $("#cartForm").submit();
            
        }
  
    </script>
@endpush