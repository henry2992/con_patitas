@extends('admin/layout.home')

@section('contents')
	
<section id="middle">
        <div class="container" style="width:90%">
            <div class="row">
                <div class="col-md-12 margin-top-40 margin-left-10">
                	
                	<div class='panel panel-default'>

                		<div class='panel-heading'>
                			<h3>Products</h3><br>
                			
                		</div>

                		<div class='panel-body'>
                			<div class="col-md-12 padding-10 margin-bottom-30">
		                		<div style='text-align:left' class='col-md-2'>
		                			<select onchange=location.href="{{url('admin/shop/view/1/')}}"+'/'+this.value>
		                				<option value="id-asc" {{$order=="id-asc" ? "selected" : ""}}>ID ASC</option>
		                				<option value="id-desc" {{$order=="id-desc" ? "selected" : ""}}>ID DESC</option>
										<option value="name-asc" {{$order=="name-asc" ? "selected" : ""}}>Name ASC</option>
										<option value="name-desc" {{$order=="name-desc" ? "selected" : ""}}>Name DESC</option>
										<option value="price-asc" {{$order=="price-asc" ? "selected" : ""}}>Price ASC</option>
										<option value="price-desc" {{$order=="price-desc" ? "selected" : ""}}>Price DESC</option>
									</select>
								</div>
								<div class="col-md-3" style='text-align:left'>
									<input type="text" name="product_search" id="product_search" class="form-control" placeholder="Search..." />	
								</div>
		                		<div style='text-align:right' class='margin-right-40 col-md-4'>
		        					<a href="javascript:void(0);" id="product_add" class="btn btn-primary">Add</a>
								</div>
            				</div>
            			
	            			<div  class='col-md-12'>
							<table class="table table-hover nomargin">
							<thead>
								<tr>
									<th>No</th>
									<th>Product Image</th>
									<th>Product Name</th>
									<th>Product Description</th>
									<th>Price</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $item)
								<tr>
									<td>{{$item->id}}</td>
									<td><img class="img-responsive" src="{{asset($item->images)}}" width=50 /></td>
									<td>{{$item->name}}</td>
									<td>{{$item->descriptions}}</td>
									<td>${{$item->price}}</td>		
									<td><a href="{{url('admin/shop/delete/'.$item->id)}}" class='btn btn-danger'>Remove</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
							</div>

							 <!-- pagination -->
                    <div class="text-center">
                        <ul class="pagination">
                            @if($page>5 && $totalPage > 0)
                                <li><a href="{{route('product_view',array('page'=>floor($page/5)*5,'order'=>$order))}}"><i class="fa fa-arrow-left"></i></a></li>
                                {{--@else--}}
                                {{--<li><a href="#" style="color: #666;"><i class="fa fa-arrow-left"></i></a></li>--}}
                            @endif
                            @for($i=floor(($page-1)/5)*5;$i<floor(($page-1)/5)*5+5;$i++)
                                @if($i<$totalPage)
                                    <li {{$i == $page-1 ? 'class=active' : ''}}><a href="{{route('product_view',array('page'=>$i+1,'order'=>$order))}}">{{$i+1}}</a></li>
                                @endif
                            @endfor
                            @if($totalPage>ceil($page/5)*5)
                                <li><a href="{{route('product_view',array('page'=>ceil($page/5)*5+1,'order'=>$order))}}"><i class="fa fa-arrow-right"></i></a></li>
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

{{--   Pop up to add product  --}}
<div class="modal fade" id="product_popup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please insert right product information.</h4>
            </div>
            <div class="modal-body">
               <form id="product_form">
				  <div class="form-group">
				  	 <div class="form-group">
				    <label for="product_image">Image:</label>
				    <input type="file" class="form-control" id="product_image" name="image[]">
				  </div>
				 
				    <label for="product_name">Product Name:</label>
				    <input type="text" class="form-control" id="product_name">
				  </div>
				  <div class="form-group">
				    <label for="price">Price:</label>
				    <input type="text" class="form-control" id="price">
				  </div>
				  <div>
				    <label for="product_description">Description:</label>
				    <textarea  class="form-control" id="product_description"></textarea>
				  </div><br>
				 <div class="form-group">
				    <label for="product_type">Product Type:</label>
				    <select id="product_type">
				    	<option value="1">General</option>
			    	 	<option value="2">Medium</option>
		    	 	 	<option value="3">High</option>
				    </select>
				  </div>
				</form>
            </div>
            <div class="modal-footer" style="padding: 15px 15px;border-top: 0">
                <button type="button" id="save_product" class="btn btn-primary" data-dismiss="modal">Save</button>
                <button type="button"  class="btn btn-default close_popup" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.10.1/jquery.mark.js"></script>
<script>

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
				            url: "{{url('admin/shop/add')}}",
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

$("#product_search").on("keydown",function(e){

	if(e.keyCode==13){
		if($(this).val()== ""){
			return false;
		}
		location.href="{{url('admin/shop/search')}}"+'/'+$(this).val().trim();
	}
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