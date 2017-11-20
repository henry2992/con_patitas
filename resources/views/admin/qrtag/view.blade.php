@extends('admin/layout.home')

@section('contents')

	
<section id="middle">
        <div class="container" style="width:90%">
            <div class="row">
                <div class="col-md-12 margin-top-40 margin-left-10">
                	
                	<div class='panel panel-default'>

                		<div class='panel-heading'>
                			<h3>Tag Generation</h3><br>
                			
                			<div class="row margin-bottom-10">
	                                <div class="col-md-6 margin-left-20" style="width: 90%;display:none">
	                                        <div class="alert alert-info form-group">
	                                        <span class="help-block">
	                                            <strong></strong>
	                                        </span>
	                                        </div>
	                                </div>
                            	</div>

                		</div>

                		<div class='panel-body'>
                			<div class="col-md-12 padding-10 margin-bottom-30">
		                		<div style='text-align:left' class='col-md-2'>
		                			<select onchange=location.href="{{url('admin/qrtag/view/1/')}}"+'/'+this.value>
		                			<option value="id-asc" {{$order=="id-asc" ? "selected" : ""}}>ID ASC</option>
		                				<option value="id-desc" {{$order=="id-desc" ? "selected" : ""}}>ID DESC</option>
										<option value="tag-asc" {{$order=="tag-asc" ? "selected" : ""}}>Tag ASC</option>
										<option value="tag-desc" {{$order=="tag-desc" ? "selected" : ""}}>Tag DESC</option>
										<option value="is_used-asc" {{$order=="is_used-asc" ? "selected" : ""}}>Used ASC</option>
										<option value="is_used-desc" {{$order=="is_used-desc" ? "selected" : ""}}>Used DESC</option>
									</select>
								</div>
								<div class="col-md-3" style='text-align:left'>
									<input type="text" name="tag_search" id="tag_search" class="form-control" placeholder="Search..." />	
								</div>
		                		<div style='text-align:right' class='margin-right-40 col-md-4'>
		        					<a href="javascript:void(0);" id="tag_add" class="btn btn-primary">Add</a>
								</div>
            				</div>
            			
	            			<div  class='col-md-12'>
									<table class="table table-hover nomargin">
									<thead>
										<tr>
											<th>No</th>
											<th>TagID</th>
											<th>Used</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $key=>$item)
										<tr>
											<td>{{ $key+1 }}</td>
											<td>{{ strtoupper($item->tag) }}</td>
											<td>
												@if($item->is_used == 0)
												Unused
												@else
												Used
												@endif
											</td>
											<td><a href="{{url('admin/qrtag/delete/'.$item->tag)}}" class='btn btn-danger'>Remove</a></td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>

							 <!-- pagination -->
                    <div class="text-center">
                         <ul class="pagination">
                            @if($page>5 && $totalPage > 0)
                                <li><a href="{{route('tag-view',array('page'=>floor($page/5)*5,'order'=>$order))}}"><i class="fa fa-arrow-left"></i></a></li>
                                {{--@else--}}
                                {{--<li><a href="#" style="color: #666;"><i class="fa fa-arrow-left"></i></a></li>--}}
                            @endif
                            @for($i=floor(($page-1)/5)*5;$i<floor(($page-1)/5)*5+5;$i++)
                                @if($i<$totalPage)
                                    <li {{$i == $page-1 ? 'class=active' : ''}}><a href="{{route('tag-view',array('page'=>$i+1,'order'=>$order))}}">{{$i+1}}</a></li>
                                @endif
                            @endfor
                            @if($totalPage>ceil($page/5)*5)
                                <li><a href="{{route('tag-view',array('page'=>ceil($page/5)*5+1,'order'=>$order))}}"><i class="fa fa-arrow-right"></i></a></li>
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


{{--   Pop up to add tag  --}}
<div class="modal fade" id="tag_popup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please select counts you're making for pet profile link.</h4>
            </div>
            <div class="modal-body">
               <form id="tag_form">
				 <div class="form-group">
				    <label for="tag_count">Total Tag Counts</label>
				    <select id="tag_count" name="tag_tatal_count">
				    	<option value="500">500</option>
			    	 	<option value="1500">1500</option>
		    	 	 	<option value="5000">5000</option>
				    </select>
				  </div>
				</form>
            </div>
            <div class="modal-footer" style="padding: 15px 15px;border-top: 0">
                <button type="button" id="save_tag" class="btn btn-primary" data-dismiss="modal">Save</button>
                <button type="button"  class="btn btn-default close_popup" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.10.1/jquery.mark.js"></script>	
<script>
	
	$("#tag_add").click(function(){

		$("#tag_popup").modal("show");
	});


	$("#save_tag").click(function(){
		$("#tag_form").submit();
	});


	$("#tag_form").submit(function(e){

		 var count = $("#tag_count").val();
		
	        $.ajax({
	          
	            method:'post',
	            url: "{{url('admin/qrtag/generation')}}",
	            data:{count:count},

	            success:function(data){
	            	console.log(data)	;
	                if(data.status == "success") {
	                    alert(data.status);
	                }else{
	                	$(".alert-info").parent().show();
	                   $(".help-block strong").text('Something went wrong.');
	                }
	            }
			});
	        	e.preventDefault();
	});


	$("#tag_search").on("keydown",function(e){

	if(e.keyCode==13){
		if($(this).val()== ""){
			return false;
		}
		location.href="{{url('admin/qrtag/search')}}"+'/'+$(this).val().trim();
	}
});

	$(function(){

	var mark = function() {
    // Read the keyword
    var keyword = "{{session('tag_keyword')}}";
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