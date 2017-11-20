@extends("layouts.app")

@section("contents")

    <section style="padding:5px">
        <div class="container">
            <div class="row margin-bottom-10">
                <div class="col-md-12" style="width: 100%;">
                    @if($status = Session::get("status"))
                        <div class="alert alert-info form-group">
                                        <span class="help-block">
                                            <strong>{{$status}}</strong>
                                        </span>
                        </div>
                    @endif
                </div>
            </div>
           @if(count($data)>0)
            @foreach($data as $key => $profile)
                <div class="row">
                    <hr/>
                <div class="col-md-2"><!-- company logo -->
                    @if(($profile->avatar))
                    <img src="{{asset($profile->avatar)}}" class="img-responsive">
                        @else
                    <img src="{{asset('assets/images/dog-avatar.jpg')}}" width="300" height="300" class="img-responsive">
                    @endif
                </div>
                <div class="col-md-7"><!-- company detail -->
                    <h2 class="margin-bottom-10">{{$profile->name}}</h2>
                    <ul class="list-inline">
                        <li>
                                <div style="color:#fff;border-radius:15%;background: black; text-align: center;padding:1px 5px">
                                {{intval(ceil((time()-strtotime($profile->birth))/86400/365))}} años
                                </div>

                        </li>
                        <li><i class="fa fa-birthday-cake text-success"></i>
                            <a class="text-success" href="#" >
                                {{$profile->birth}}
                            </a>
                        </li>
                        <li><i class="fa fa-qrcode"></i>
                            <span class="text-warning">
                                @if($profile->tag)
                                {{ $profile->tag->tag}}
                                @else
                                    <span style="color:#000">NONE</span>
                                @endif
                            </span>
                        </li>
                        <li><i class="fa fa-genderless"></i>
                            <span class="text-warning">
                                @if($profile->gender == 1)
                                    Masculino
                                @else
                                    Femenino 
                                @endif
                            </span>
                        </li>
                        <li><i class="fa fa-balance-scale"></i>
                            <span class="text-warning">
                                {{$profile->weight ? $profile->weight: ""}}
                                @if($profile->weight && $profile->unit == 1)
                                    kg
                                @else
                                    lb
                                @endif
                            </span>
                        </li>
                    </ul>
                    <ul class="information">
                        @if($profile->breed)
                            <li><b>Raza</b> : {{$profile->breed}}</li>
                        @endif
                        @if($profile->spay)
                            <li><b>Castrado</b> : {{$profile->spay}}</li>
                        @endif
                        @if($profile->tabiestag)
                            <li><b>Rabies Tag</b> : {{$profile->rabiestag}}</li>
                        @endif
                        @if($profile->license)
                            <li><b>License</b> : {{$profile->license}}</li>
                        @endif
                       
                        @if($profile->municipal_license)
                            <li><b>Municipal License</b> : {{$profile->municipal_license}}</li>
                        @endif
                        @if($profile->municipal_expiration)
                            <li><b>Municipal Expiration</b> : {{$profile->municipal_expiration}}</li>
                        @endif
                        @if($profile->sevice_level==0?'Basic':'')
                                <li><b>Nivel de servicio</b> : <a href="#">Basic</a></li>
                        @endif
                        @if($profile->missing == 0)
                                <li><div  class="btn btn-default missing_reports" data-value="{{$profile->id}}" style="color:red"><i class="fa fa-eye"></i> Perdido</div>&nbsp;&nbsp;<span style="color:rgba(0,0,0,0.3)">haz click para reportar tu mascota perdida</span></li>
                            @else
                                <li><i class="fa fa-eye"></i> Missing reported <span style="color:rgba(0,0,0,0.3)"></span><div  class="btn btn-default found_reports" data-value="{{$profile->id}}" style="color:red">I found this pet</div>&nbsp;<span style="color:rgba(0,0,0,0.3)">click here to report</span></li>
                        @endif
                      

                    </ul>
                    <p>Adicional{{$profile->additional_color ? $profile->additional_color : ''}}</p><br>
                    <p>{{$profile->additional_medical ? $profile->additional_medical :''}}</p>
                </div>
                <div class="col-md-3 text-align">
                    <button class="btn btn-success" onclick="dataSubmit({{$profile->id}});">Editar Perfil  </button>
                    <button class="btn btn-danger btn_delete" onclick="onDelete({{$profile->id}})" > Eliminar</button>
                </div>

            </div>

                @endforeach
                <div class="row text-align">
                <div class="col-md-12">
                        <hr/>
                       <a class="buttons purple" href="{{route('petRegistrationForm')}}"><span style="height: 100%;"><i class="fa fa-check" style="line-height: 50px"></i></span>Agregar una mascota</a>
                    </div>
                  </div>  
                    
                <form action="{{route('edit_pet')}}" method="post" id="edit_form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input class="editId" type="hidden" name="petId" value="">
                </form>
       @else
                <div class="row text-align">
                    
                    <div class="row margin-bottom-10">
                        <div class="alert alert-info form-group" style="margin-top:20px">
                                        <span class="help-block">
                                            <strong>You don not have any pets now. Please click add button to add your pets.</strong>
                                        </span>
                        </div>
             
                  </div>
                    <div class="col-md-12">
                        <hr/>
                       <a class="buttons purple" href="{{route('petRegistrationForm')}}"><span style="height: 100%;"><i class="fa fa-check" style="line-height: 50px"></i></span>Agregar una mascota</a>
                    </div>
                </div>
       @endif
      </div>
    </section>
    
    
    
    
    
    
    
     {{--   Pop up to add provider  --}}
<div class="modal fade" id="general_popup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Select the provider.</h4>
            </div>

            <div class="modal-body">
                <div class="ui-widget">
                    <input id="petId" type="hidden" value="" />
                    <label> </label>
                    <select id="combobox">
                        <option value="">Select one...</option>
                        @foreach($providers as $provider)
                        <option value="{{$provider->id}}">{{$provider->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer" style="padding: 1px 15px;border-top: 0">
                <button type="button" id="save_provider" class="btn btn-primary" data-dismiss="modal">Save</button>
                <button type="button"  class="btn btn-default close_popup" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

{{--        Alert modal     --}}

{{--   Pop up to add tag  --}}
<div class="modal fade" id="tag_popup" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Upgrade account to Premium</h4>
           </div>

           <div class="modal-body">
               <div >
                    You have to upgrade your account from basic to Premium to get tag from Con Patitas.
                    <br />
                    Are you agree ?
               </div>
           </div>
           <div class="modal-footer" style="padding: 1px 15px;border-top: 0">
               <button type="button" id="go_upgrade_account" class="btn btn-primary" data-dismiss="modal">OK</button>
               <button type="button"  class="btn btn-default close_popup" data-dismiss="modal">Close</button>
           </div>

       </div>
   </div>
</div>

{{--        Alert modal     --}}

<div class="modal fade" id="status_popup" tabindex="-2" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">

            </div>
            <div class="modal-footer" style="padding: 1px 15px;border-top: 0">
                <button type="button"  class="btn btn-default close_popup" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
{{--        Alert modal     --}}
    
    
    
    
    
@endsection



@push('css')
<style>
  
   
</style>

@endpush
@push('js')

<script>
    $(function(){

/*  autocomplete methods    */

        
/*  end autocomplete methods    */

        $(".missing_reports").click(function(e){

            $id = $(this).data('value');

            $.ajax({
                url:'{{url('pets/report')}}',
                method:'post',
                data:{id:$id},
                dataType:'json',

                success:function(data){

                    if(data.status == "success"){

                        $("#status_popup .modal-body").html("<div class='padding-10'><h4>Successfully it was being reported.</h4></div>");
                        $("#status_popup").modal('show');
                        setTimeout(reload,3000);
                    }
                  },
                error: function (data) {
                    console.log(data);
                }
            });
        });
        //  Found report
        $(".found_reports").click(function(e){

            $id = $(this).data('value');

            $.ajax({
                url:'{{url('pets/found_report')}}',
                method:'post',
                data:{id:$id},
                dataType:'json',
                success:function(data){
                    console.log(data);
                    if(data.status =='success'){
                        $("#status_popup .modal-body").html("<div class='padding-10'>Successfully it was being reported.</div>");
                        $("#status_popup").modal('show');
                        setTimeout(reload,3000);
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        // end found report
    });

    $('.add_provider').click(function(){
        $("#petId").val("").val($(this).attr("id"));
        showPopUpModal();
    });

    function showPopUpModal(){
        $('#general_popup').modal('show');
    }

    /*  When save a selected provider   */
    var saveBtn = document.getElementById('save_provider');
    saveBtn.addEventListener('click',onSave,false);
    function onSave(){
        var selectedProvider = $('.selected_value').val();

        if(selectedProvider == ''){
            $("#status_popup .modal-body").html('<h5>Please select a provider.</h5>');
            $("#status_popup").modal('show');
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '{{url('providers/register')}}'+'/'+$("#petId").val()+'/'+selectedProvider,
            data:'' ,
            dataType: 'json',
            cache: false,
            headers: {
                'X-CSRF-Token' : '{{csrf_token()}}'
            },
            contentType: false,
            processData: false,

            success: function (data) {
                console.log(data);

                if (data.status == "success") {
                    $("#status_popup .modal-body").html("<h5>Succes !</h5>");
                    $(".information li").find('#'+$("#petId").val()).parent().html("<b>Provider</b>"+':'+selectedProvider);
                } else {
                    $("#status_popup .modal-body").html("<h5>Something went wrong!</h5><br>Please try again.");
                }
                $("#status_popup").modal('show');
            },

            error: function (data) {
                console.log(data);
            }
        });
    }
    /*  When save a selected provider   */

    function dataSubmit(id) {
        $(".editId").val(id);

        $("#edit_form").submit();
    }

    function onDelete(id){

        $.ajax({
            type: 'get',
            url: '{{route('delete_pet')}}',
            data:{petId:id} ,
            cache: false,
            success: function (data) {
          
                if(data == 'success'){
                    location.reload();
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
    function reload(){
       location.reload();
    }
//  # Processing to upgrade user account and get tag id  //
    $(".upgrade_account").click(function(){
        $petId = $(this).data('value');
        $userlevel = '{{Auth::user()->membership }}';
        
        if($userlevel == 0) {
             $("#tag_popup").modal('show'); // if don't upgraded , go to user level upgrade form.
         } else {
             location.href = 'shop/tags'; //if upgraded , go to shop to buy tag.
         }
       
    });

    $("#go_upgrade_account").click(function(){
     // put code here the user's level is 1 and 2.

     //if 2 , go ot shop to buy tagid else goto upgrade account level checkout form.
     // It's same in shop. when the user buy tagId first of all , check the user's level. and to do redirect.
        location.href = '{{url('cart/account')}}' ;
    })
</script>
@endpush
