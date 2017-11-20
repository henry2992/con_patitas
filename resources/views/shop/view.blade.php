@extends("layouts.app")
@section("contents")

<section class="page-header page-header-xs">
				<div class="container margin-top-20">
					<h1>Tienda</h1>
				</div>
			</section>
			<!-- /PAGE HEADER -->
			<!-- -->
			<section style="padding-top:10px">
				<div class="container">
					 <div class="col-md-6" style="width: 100%;">
	                                    @if($status = Session::get("status"))
	                                        <div class="alert alert-info form-group">
	                                        <span class="help-block">
	                                            <strong>{{$status }}</strong>
	                                        </span>
	                                        </div>
	                                    @endif
	                   		
	                   		 
                                    @if($status = Session::get("error"))
                                        <div class="alert alert-info form-group">
                                        <span class="help-block">
                                            <strong>{{$error}}</strong>
                                        </span>
                                        </div>
                                    @endif
                                </div>
					<!-- LIST OPTIONS -->
					<div class="clearfix shop-list-options margin-bottom-20">
						
						<div class="options-left">
							<select onchange=location.href="{{url('shop/tag/1/')}}"+'/'+this.value>
								<option value="id-asc" {{$order=="id-asc" ? "selected" : ""}}>ID ASC</option>
		                				<option value="id-desc" {{$order=="id-desc" ? "selected" : ""}}>ID DESC</option>
										<option value="name-asc" {{$order=="name-asc" ? "selected" : ""}}>Name ASC</option>
										<option value="name-desc" {{$order=="name-desc" ? "selected" : ""}}>Name DESC</option>
										<option value="price-asc" {{$order=="price-asc" ? "selected" : ""}}>Price ASC</option>
										<option value="price-desc" {{$order=="price-desc" ? "selected" : ""}}>Price DESC</option>
							</select>
							<a class="btn active fa fa-th" href="shop-4col-left.html"><!-- grid --></a>
							<a class="btn fa fa-list" href="shop-1col-left.html"><!-- list --></a>
						</div>

					</div>
					<!-- /LIST OPTIONS -->

					<ul class="shop-item-list row list-inline nomargin">
						<!-- ITEM -->
						@foreach($data as $item)
						<li class="col-lg-3 col-sm-3">
							<div class="shop-item">
								<div class="thumbnail">
									<!-- product image(s) -->
									<a class="shop-item-image" href="{{url('shop/detail/'.$item->id)}}">
										<img class="img-responsive" src="{{asset($item->images)}}" alt="shop first image" />
										<!-- <img class="img-responsive" src="{{asset('assets/images/demo/shop/products/300x450/p14.jpg')}}" alt="shop hover image" /> -->
									</a>
									<!-- /product image(s) -->
									

									<!-- product more info -->
									<!-- <div class="shop-item-info">
										<span class="label label-success">NEW</span>
										<span class="label label-danger">SALE</span>
									</div> -->
									<!-- /product more info -->
								</div>
								
								<div class="shop-item-summary text-center">
									<h2>{{$item->text}}</h2>
									<!-- rating -->
									<div class="shop-item-rating-line">
										<div class="rating rating-5 size-13"><!-- rating-0 ... rating-5 --></div>
									</div>
									<!-- /rating -->
									<!-- price -->
									<div class="shop-item-price">
										<!-- <span class="line-through">$98.00</span> -->
										${{$item->price}}
									</div>
									<!-- /price -->
								</div>
									<!-- buttons -->
									<div class="shop-item-buttons text-center">
										<a class="btn btn-default" href="{{url('shop/detail/'.$item->id)}}"><i class="fa fa-cart-plus"></i> Agregar al Carrito</a>
									</div>
									<!-- /buttons -->
							</div>
						</li>
						@endforeach
						<!-- /ITEM -->
					</ul>
					<hr />
					<!-- Pagination Default -->
						 <!-- pagination -->
                    <div class="text-center">
                        <ul class="pagination">
                            @if($page>5 && $totalPage > 0)
                                <li><a href="{{route('product-client-view',array('type'=>'tag','page'=>floor($page/5)*5,'order'=>$order))}}"><i class="fa fa-arrow-left"></i></a></li>
                                {{--@else--}}
                                {{--<li><a href="#" style="color: #666;"><i class="fa fa-arrow-left"></i></a></li>--}}
                            @endif
                            @for($i=floor(($page-1)/5)*5;$i<floor(($page-1)/5)*5+5;$i++)
                                @if($i<$totalPage)
                                    <li {{$i == $page-1 ? 'class=active' : ''}}><a href="{{route('product-client-view',array('type'=>'tag','page'=>$i+1,'order'=>$order))}}">{{$i+1}}</a></li>
                                @endif
                            @endfor
                            @if($totalPage>ceil($page/5)*5)
                                <li><a href="{{route('product-client-view',array('type'=>'tag','page'=>ceil($page/5)*5+1,'order'=>$order))}}"><i class="fa fa-arrow-right"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- /pagination -->
					<!-- /Pagination Default -->
				</div>
			</section>
			<!-- / -->

@endsection

@push('css')
<link href="{{asset('assets/css/layout-shop.css')}}" rel="stylesheet" type="text/css">
@endpush