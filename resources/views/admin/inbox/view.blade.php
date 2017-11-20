@extends("admin/layout.home")

@section("contents")
    <section id="middle">
        <div class="dashboard padding-20">
                <div class="">
                    <h3>Inbox</h3>
                    <hr/>
                </div>
                <div id="ttab1_nobg" class="tab-pane active"><!-- TAB 1 CONTENT -->

                    <div class="table-responsive">
                        <table class="table  table-hover ">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Email</th>
                                <th>Contents</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key=>$content)
                                  <tr>
                                      <td>{{$key+1}}</td><td>{{$content->email}}</td>
                                      <td><p style="overflow-wrap: break-word;margin: 0;">{{$content->contents}}</p></td>
                                      <td>
                                          <button class="btn btn-danger btn-inbox-delete" data-value="{{$content->id}}">Delete</button>
                                      </td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </section>
@endsection
@push("js")
    <script>
        $(function(){
            _toastr("You have "+msgCount+" new Message(s)","top-right","success",false);
        });

        $(".btn-inbox-delete").click(function(){

            $id = $(this).data('value');
            var tr = $(this);
            $.ajax({
                type:'POST',
                url: '{{route('delete_inbox')}}',
                data:{id:$id},
                dataType:'json',
                cache:false,
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success:function(data){
                    console.log(data);
                    if(data.status == "success") {
                        tr.parents('tr').remove();
                    }else{
                        alert(data.status);
                    }
                },
                error: function(data){
                    console.log(data.status);
                }
            });
        });
    </script>
@endpush