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

								<div class="col-lg-4 col-sm-4">
									<div class="margin-bottom-3">
										<figure id="zoom-primary" class="zoom" data-mode="mouseover">
											<img lass="img-responsive" id="zoom_05" src="{{asset($data->images)}}" data-zoom-image="{{asset($data->images)}}" width=300/>
										</figure>
									</div>
									<div data-for="zoom-primary" class="zoom-more owl-carousel owl-padding-3 featured" data-plugin-options='{"singleItem": false, "autoPlay": false, "navigation": true, "pagination": false}'>
									</div>
									<!-- /Thumbnails -->
								</div>
								<!-- /IMAGE -->
								<!-- ITEM DESC -->
								<div class="col-lg-6 col-sm-6">
									<!-- price -->
									<div class="shop-item-price margin-bottom-30">
										<h2>{{$data->name}}</h2>
									</div>
									<div class="shop-item-price">
										<h4>Precio : ${{$data->price}}</h4>
									</div>
									<hr />
										<p> {{$data->descriptions ? $data->descriptions : ""}}</p>									<!-- /short description -->
									<hr />
									<div class="col-md-12 margin-bottom-20">
									 <div class="col-md-2 padding-10"><h4>Cantidad</h4></div>
									 <div class="col-md-6">
									  <input class="form-control" max="50" min="1"  value=1 type="number" id="productCount"  onkeydown="validateCount();"/>
									  </div>
									</div>
									<div class="col-md-12 margin-bottom-20">
										<div class="col-md-2">
											 <a href="javascript:void(0);" class="markup-button" data-value="{{$data->unique_key}}" >
											 <i class="fa fa-thumbs-up" aria-hidden="true"></i><span style='font-size:16px'> {{$data->mark_up}}</span></a>
										</div>
										
										<div class="col-md-2">
										     <a href="javascript:void(0);"><i class="fa fa-eye" aria-hidden="true"></i><span style="font-size:16px"> {{$data->is_view}}</span> </a>
										</div>
									</div>

									<form class="clearfix form-inline nomargin" method="post" action="{{url('cart/add')}}">
										<input type="hidden" name="product_id" value="1" />
										<input type='hidden' name='product' value="{{$data->unique_key}}"/>
										<input type='hidden' name='_token' value="{{csrf_token()}}" />
										<input type='hidden' name='product_count' id="product_count" value="" />
										<div class="btn-group pull-left product-opt-color">
										</div><!-- /btn-group -->
										<div class="btn-group pull-left product-opt-size">
										</div><!-- /btn-group -->
										<div class="btn-group pull-left product-opt-qty">
										</div><!-- /btn-group -->
										<a class="btn btn-primary pull-left product-add-cart" onclick="submitForm(this)">Agregar al carrito</a>
									</form>
									<!-- /FORM -->
									<hr />
									<div class="rating rating-5 size-13 margin-top-10 width-100"><!-- rating-0 ... rating-5 --></div>
								</div>
							</div>
							<hr class="margin-top-80 margin-bottom-80" />
						</div>
					</div>
					
				</div>
			</section>
@endsection

@push('js')
	
<script>
	$flag = false;
	$(function(){
		$(".markup-button").click(function(){

			$key = $(this).data('value');

			if($flag  == false){
				$.ajax({

					method:"post",
					url:"{{url('shop/markup')}}",
					data:{unique_key:$key},
					dataType:'json',
					success:function(data){
						console.log(data.status);

						if(data.status =="success"){
							var value = parseInt($(".markup-button").children('span').text())+1;
							$(".markup-button").children('span').text(" "+value);
							$flag = true;
						}
					}
				});
			}
		});
	});
	
	function validateCount() {
		
	}
	function submitForm(e){
	   
	   var value = $("#productCount").val();
		console.log(value)
		  if(value < 1 || value > 50) {
			 $("#productCount").val(1);
			 alert('You must order between 1 to 50 products.');
	          } else {
	          
	            $("#product_count").val(value);
	            $(e).parent('form').submit();
	            
	          }
	}
</script>
@endpush

