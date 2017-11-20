@extends('admin/layout.home')

@section('contents')
	
<section id="middle">
        <div class="container" style="width:90%">
            <div class="row">
                <div class="col-md-12 margin-top-40 margin-left-10">
                	
                	<div class='panel panel-default'>

                		<div class='panel-heading'>
                			<h3>Orders</h3><br>
                			
                		</div>

                		<div class='panel-body'>
                			<div class="col-md-12 padding-10 margin-bottom-30">
		                		<div style='text-align:left' class='col-md-2'>
		                			<select onchange=location.href="{{url('admin/order/view/1/')}}"+'/'+this.value>
		                				<option value="id-asc" {{$order=="id-asc" ? "selected" : ""}}>ID ASC</option>
		                				<option value="id-desc" {{$order=="id-desc" ? "selected" : ""}}>ID DESC</option>
										<option value="user_id-asc" {{$order=="user_id-asc" ? "selected" : ""}}>Name ASC</option>
										<option value="user_id-desc" {{$order=="user_id-desc" ? "selected" : ""}}>Name DESC</option>
										<option value="product_id-asc" {{$order=="product_id-asc" ? "selected" : ""}}>PRODUCT ASC</option>
										<option value="product_id-desc" {{$order=="product_id-desc" ? "selected" : ""}}>PRODUCT DESC</option>
									</select>
								</div>
								
		                		
            				</div>
            			
	            			<div  class='col-md-12'>
							<table class="table table-hover nomargin">
							<thead>
								<tr>
									<th>No</th>
									<th>Product Image</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Customer</th>
									<th>Customer Email</th>
									<th>Phone Number</th>
									<th>Address</th>									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							@if(($data))
								@foreach($data as $key=>$item)
								
								<tr id="productItem_{{$key}}" >
									<td onclick="showDetails(this);">{{$item->id}}</td>
									<td onclick="showDetails(this);"><img class="img-responsive" src="{{asset($item->product->images)}}" width=50 /></td>
									<td onclick="showDetails(this);">{{$item->product->name}}</td>
									<td onclick="showDetails(this);">${{$item->product->price}}</td>
									<td onclick="showDetails(this);">{{$item->user->firstname}}</td>	
									<td onclick="showDetails(this);">{{$item->user->email}}</td>		
									<td onclick="showDetails(this);">+{{$item->user->country}}&nbsp;{{$item->user->phonenumber}}</td>	
									<td onclick="showDetails(this);">{{$item->user->city}} &nbsp; {{$item->user->street}}</td>	
									<td>
										<a href="{{url('admin/order/delete/'.$item->id)}}" class='btn btn-danger'>Remove</a>
										@if($item->is_approved ==1)
										<a href="#" class='btn btn-success'>Procced</a>
										@else
										<a href="#" class='btn btn-warning'>Processing</a>
										@endif

									</td>
								</tr>
								
								
								
									<div class="modal fade" id={{"product_popup_".$key}} tabindex="-1" role="dialog">
										    <div class="modal-dialog" role="document">
										        <div class="modal-content">
										            <div class="modal-header">
										                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										                <h4 class="modal-title">Order information.</h4>
										            </div>
										            <div class="modal-body">
										               <form id="product_form">
										               <div class="col-md-12">
														  <div class="col-md-3">
															 <div><img class="img-responsive" src="{{asset($item->product->images)}}" width=100 /></div>
														  </div>
														 
														<div class="col-md-9">
														   <div class="col-md-12">
														    <div>Product Name: {{$item->product->name}}</div>
														</div>
														 <div class="col-md-6">
														
														    <div>Price: ${{$item->price}}</div>
														  </div>
														   <div class="col-md-6">
														  
														    <div>Count: {{$item->count}} </div>
														  </div><br>
														 <div class="col-md-6">
														 
														    <div>Total Price: ${{$item->count * $item->price}}</div>
														  </div><br>
														 <div class="col-md-12">
														   
														    <div>
														    	Address: {{$item->user->city." ".$item->user->street." ".$item->user->state.' : '.$item->user->country.' '.$item->user->phonenumber}}
														    	<br>
														    	Email Address : {{$item->user->email}}
														     </div>
														  </div><br>
														</div>
														</div>
														</form>
										            </div>
										            <div class="modal-footer" style="padding: 15px 15px;border-top: 0">
										                <button type="button"  class="btn btn-default close_popup" data-dismiss="modal">Close</button>
										            </div>
										        </div>
										    </div>
										</div>
								@endforeach
								@else
								<tr><td>No match data</td></tr>
								@endif
							</tbody>
						</table>
							</div>

							 <!-- pagination -->
                    <div class="text-center">
                        <ul class="pagination">
                            @if($page>5 && $totalPage > 0)
                                <li><a href="{{route('order_view',array('page'=>floor($page/5)*5,'order'=>$order))}}"><i class="fa fa-arrow-left"></i></a></li>
                                {{--@else--}}
                                {{--<li><a href="#" style="color: #666;"><i class="fa fa-arrow-left"></i></a></li>--}}
                            @endif
                            @for($i=floor(($page-1)/5)*5;$i<floor(($page-1)/5)*5+5;$i++)
                                @if($i<$totalPage)
                                    <li {{$i == $page-1 ? 'class=active' : ''}}><a href="{{route('order_view',array('page'=>$i+1,'order'=>$order))}}">{{$i+1}}</a></li>
                                @endif
                            @endfor
                            @if($totalPage>ceil($page/5)*5)
                                <li><a href="{{route('order_view',array('page'=>ceil($page/5)*5+1,'order'=>$order))}}"><i class="fa fa-arrow-right"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- /pagination -->
						</div>
						</div>
					</div>
                </div>
            </div>
        </div>
</section>
@endsection


@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.10.1/jquery.mark.js"></script>
<script>


function showDetails(obj){
	$id = $(obj).parent().attr("id").split("_");

	$("#product_popup_"+$id[1]).modal("show");
}


$("#product_add").click(function(){
	$("#product_popup").modal("show");
});

$("#save_product").click(function(){
	$("#product_form").submit();
});

$("#product_form").submit(function(e){

	 var formData = new FormData(this);
	 var productName = $("#product_name").val();
	 var price = $("#price").val();
	 var type = $("#product_type").val();
	 var description = $("#product_description").val();

		console.log(formData);
        $.ajax({
            method:'POST',
            url: "{{url('admin/uploadFile/product/300')}}",
            data:formData,
            dataType:'json',
         
            contentType: false,
            processData: false,

            success:function(data){
            	console.log(data);
                if(data.status == "success") {
                    alert(data.filename);

                     $.ajax({
				            type:'POST',
				            url: "{{url('admin/order/add')}}",
				            data:{name:productName,price:price,type:type,description:description,images:data.path+'/'+data.filename},
				            dataType:'json',	
				            success:function(data){
				            			console.log(data);
				            	if(data.status=="success"){

				            		$("#product_name").val("");
				            		$("#price").val("");
				            		location.reload();
				            	}
				            }
				        });
                }else{
                    alert(data.status);
                }
            }
		});
        	e.preventDefault();
	});



$(function(){

	var mark = function() {
    // Read the keyword
    var keyword = "{{session('keyword')}}";
    // Determine selected options
    var options = {};
    // Remove previous marked elements and mark
    // the new keyword inside the context
    $("tbody").unmark({
      done: function() {
        $("tbody").mark(keyword, options);
      }
    });
  };
	mark();
});
</script>

@endpush