<?php

namespace App\Http\Controllers\Pet;


use App\Pet;
use App\Report;
use App\Tag;
use App\User;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Nexmo\Laravel\Facade\Nexmo;
use Bogardo\Mailgun\Facades\Mailgun;
Use App\Mail\SendLocation;




class PetController extends Controller
{
    public function __construct()
    {
       // $this->middleware("guest");
    }

    public function showFoundForm()
    {

        return view('foundpet.index');
    }

    public function foundPet(Request $request,$id)
    {
        $pet  = Tag::where('tag',$id)->first();

        if(!is_null($pet)){
           // $pet  = Tag::where('tag',$id)->first()->pet->first();
  $pet  = Tag::where('tag',$id)->first();
  $pet = Pet::where('id',$pet->pet_id)->first();
  	   if(isset($pet->user_id)){
            $user = User::find($pet->user_id);
            } else{ $data='';$user=''; }
        }else{
            $data='';$user='';
        }


        return view('foundpet.result',array('data'=>$pet,'user'=>$user));
    }

    public function sendEmail(Request $request)
    {


        $from = $request->get('email');
        $contents = $request->get('contents');
        $to = User::find($request->get('id'));

        $data=array('from'=>$from,'to'=>$to->email,'contents'=>$contents);

        Mail::send("mail.foundPet",$data, function($message) use($data) {
            $message->to($data['to']);
            $message->from($data['from']);
            $message->subject("Encontré a su mascota.");
         
        });

        if(count(Mail::failures()) > 0){
            $msg = "Error enviando el correo.";
        }
        else{
            $msg = "Correo enviado a ".$data['to'];
        }

        return response($msg);
    }

    public function sendLocation(Request $request){

       $user_id = $request->get('user_id');
       $pet_id = $request->get('pet_id');
       $contents = $request->get('contents');
       $is_updated = $request->get('is_updated');
       $lat = $request->get('lat');
       $lng = $request->get('lng');
       $user = User::find($user_id);
       
       if($user) {
       
       $data = [
           'user_id' =>$user_id,
           'pet_id'=>$pet_id,
           'contents'=>$contents,
           'lat'=>$lat,
           'lng'=>$lng
       ];
        $updated = false;

            if(isset($is_updated)){

               // $update = DB::table('location_messages')->where('id',$is_updated)->update(['contents'=>$contents]);
                $updated = true;
            }else{
               // $result = DB::table('location_messages')->insertGetId($data);
            }

            if($updated){
                $msg['msg']= "Su ubicación ha sido actualizada.";
                $msg['is_updated']='';
            }else{
                $msg['msg']= "Su ubicación ha sido enviada al dueño de la mascota.";
              //  $msg['is_updated']=$result;
            }
    
	       $send= Mail::to($user->email)->send(new SendLocation($user_id,array('lat'=>$lat,'lng'=>$lng),$contents));
	   		
	    
	       return response()->json($msg);
	  
	        
        }else{
        	 $msg['msg']= "Algo salió mal.";
                 $msg['is_updated']='';
        	
        	 return response()->json($msg);
        }
    }

    public function sendSms(Request $request){

        $country_code = $request->get('country_code');
        $phone_number = $request->get('phone_number');
        $contents = $request->get('smsContents');
        $userId = $request->get('userId');

        $user = User::find($userId);

        $to = $user->country.$user->phonenumber;

        $from = $country_code.$phone_number;
//        return response()->json($to);
        $result = Nexmo::message()->send([
            'to' => $to,
            'from' => '8617013474541',
            'text' => $contents
        ]);
 	if($result){
        	return response()->json('SMS enviado exitosamente.');
    	} else {
    		return response()->json('Algo salió mal');
    	}

    }

}
