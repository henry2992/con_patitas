@extends("layouts.app")
@section("contents")

	<section>
				<div class="container">
					
					<div class="row">

						<div class="col-lg-12 col-md-12 col-sm-12">

							<div class="row">
								 <div class="row margin-bottom-10">
	                                <div class="col-md-6 margin-left-20" style="width: 90%;">
	                                    @if($status = Session::get("status"))
	                                        <div class="alert alert-info form-group">
	                                        <span class="help-block">
	                                            <strong>{{$status}}</strong>
	                                        </span>
	                                        </div>
	                                    @endif
	                                </div>
                            	</div>

                            	<div class="col-md-6">

                            			<div class="col-md-12" style="overflow-x:auto">
                        <hr/>
                    <form id="cartForm" action="{{url('cart/delete')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" name="key" value="" />
                        <table class="cart-table table table-bordered  table-hover">
                            <thead class="table">
                                <tr>
                                    <th style="width:100px;max-width:100px"></th>
                                    <th style="min-width: 500px">Products</th>
                                    <th style="width:100px;max-width: 100px;!important;">Quantity</th>
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
                            	</div>
							</div>
							<hr class="margin-top-80 margin-bottom-80" />
						</div>
					</div>
					
				</div>
			</section>
@endsection