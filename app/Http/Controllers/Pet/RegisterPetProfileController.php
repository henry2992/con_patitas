<?php

namespace App\Http\Controllers\Pet;

use App\Count;
use App\Message;

use App\Pet;
use App\Provider;
use App\Report;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;

class RegisterPetProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function showRegistrationForm(){
        return view("pets.add");
    }

    protected function validator(array $data)
    {
        return Validator::make($data,[
            'user_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'birth' =>'required',
//          'g-recaptcha-response' => 'required|string|min:100',
            'weight' => 'required|min:1|max:100'
        ]);
    }
    public function register(Request $request)
    {
        $datas = $request->all();
        $datas['user_id'] = Auth::user()->id;

/*               New function 5.22                  */
         $tagId = $request->get('tagId');
         $exists = Tag::where('tag',$tagId)->where('is_used',0)->count();
         if($exists < 0 ) {
             $msg = "This tag is already taken or non-exists.";
             return response()->json($msg);
         }          
        // $duplicate = Pet::where('tag_id',$tagId)->count();
        //
        // if($duplicate>0){
        //     $msg = "This tag is already taken.";
        //     return response()->json($msg);
        // }

/*                                                  */
        if(isset($datas['missing'])){
            $datas['missing'] = 1;
        }else{
            $datas['missing'] = 0;
        }

        $validate = $this->validator($datas);

        if($validate->passes()) {
            $columns = Schema::getColumnListing('pets');

            $insert = array();
//            $pets = new Pet();

            foreach ($datas as $key => $data) {
                if (in_array($key, $columns)) {
                    $insert[$key] = $data;
                }
            }

            $lastPetId = Pet::create($insert);


            if ($lastPetId->id) {

                // if($datas['tag_id']){
                    // $dataToTagTable = array('pet_id'=>$lastPetId->id,'tag'=>$datas['tag_id']);
                    //
                    // $lastTadId = Tag::create($dataToTagTable);
                    //
                    // $pet = Pet::where('id',$lastPetId->id)->update(array('tag_id'=>$lastTadId->id));

                    // Increase total pet count //
                    $count = Count::first();
                    $count->pet_count +=1;
                    $count->save();
                // }

                if ($request->ajax()) {
                    $msg = "success";
                    return response()->json($msg);
                } else {
                    return redirect(route('show_pet'))->with('status', 'Registration Successful !');
                }
            }
        }
            return redirect()->back()->withInput($request->all())->withErrors($validate)->with('status','Please check your information');
    }

    public function show()
    {
	
	if(!Auth::guard('web')->check()){
    		return redirect(url('login'));
    	}
       $userId = Auth::user()->id;
       $pets = Pet::where('user_id',$userId)->get();

       $providers = Provider::all();

       return view('pets.status',array('data'=>$pets,'providers'=>$providers));
    }

    public function edit(Request $request){


        $pet = Pet::where('id',$request->get('petId'))->first();

        return view('pets.edit',array('data'=>$pet));
    }

    public function update(Request $request)
    {


        $petId = $request->get('petId');
        $datas = $request->all();
        $columns = Schema::getColumnListing('pets');
        $datas['user_id'] = Auth::user()->id;
        $insert = array();

        if(isset($datas['missing'])){
            $datas['missing'] = 1;
        }else{
            $datas['missing'] = 0;
        }

        $validate = $this->validator($datas);

        if($validate->passes()) {
            foreach ($datas as $key => $data) {
                if (in_array($key, $columns)) {
                    $insert[$key] = $data;
                }
            }

            $result = Pet::where('id',$petId)->update($insert);
            $isTag = Tag::where('tag',$datas['tag'])->where('is_used',0)->get()->count();
             $tagId = $datas['tag'];
             
             if($isTag == 0 && $datas['tag'] != $datas['old_tag']){
	            $exists = Tag::where('tag',$tagId)->where('is_used','0')->get()->count();
	         
	            if($exists < 1 ) {
	             $msg = "This tag is already taken or non-exists.";
	             return redirect(route('show_pet'))->with('status', $msg);
	            }    
            }

            if($result){
//                if($isTag == 0 && $datas['tag'] != $datas['old_tag']){
                if($isTag == 0 && $datas['tag'] != $datas['old_tag']){

                    if(is_null($datas['tag'])){

                         Tag::where('tag',$datas['old_tag'])->delete();

                        $result = Pet::where('id',$petId)->update(array('tag_id'=>null));
                        if($result) {
                            return redirect(route('show_pet'))->with('status', 'Update successful');
                        }
                    }else {
                        //Tag::where('pet_id',$petId)->delete();
                        $dataToTagTable = array('pet_id' => $petId, 'tag' => $datas['tag'], 'is_used' => '1');
                        $lastTadId = Tag::where('tag',$datas['tag'])->update($dataToTagTable);
                        $tagid = Tag::where('tag',$datas['tag'])->first();
                        $result = Pet::where('id',$petId)->update(array('tag_id'=>$tagid->id));
                    }

                    if($result){
                        return redirect(route('show_pet'))->with('status','Update successful');
                    }
                }else if($isTag == 0 && is_null($datas['tag']) && is_null($datas['old_tag'])){
                    return redirect(route('show_pet'))->with('status','Update successful.');
                }else{
                    return redirect(route('show_pet'))->with('status','Update successful.');;
//                    return redirect(route('show_pet'))->with('status','This tag is already taken.');
                }
            }
        }else{
            return redirect(route('show_pet'))->with('status','Something went wrong. Please check your information.');
        }
    }

    public function delete(Request $request){


        $petId = $request->get('petId');
	
	$tag = Tag::where('pet_id',$petId)->first();
	
	if(isset($tag)) {
		 $tag_result = Tag::where('pet_id',$petId)->update(['is_used'=>'0']);
	} 

       // $tag_result = Tag::where('pet_id',$petId)->delete();
        $result = Pet::where('id',$petId)->delete();
        Message::where('pet_id',$petId)->delete();

        if($result){
            return response('success');
        }else{
            return response('Something went wrong');
        }


    }

    public function report(Request $request) {



        $id = $request->get('id');

        $result = Pet::where('id',$id)->update(['missing'=>1]);
        $count = Report::all()->count();

        if($result){
            if(Report::all()->count()>0){

                $report  = Report::find(1);
                $report->missing += 1;
                $report->save();


            }else{
                $report = Report::create(['missing'=>1,'found'=>0]);
            }

            $msg = "success";
            return response()->json(array('status'=>$msg));
        }
            $msg = "success";
            return response()->json(array('status'=>$msg));

    }

    public function foundReport(Request $request){

        $id = $request->get('id');

        $result = Pet::where('id',$id)->update(['missing'=>0]);
        $count = Report::all()->count();

        if($result){
            if(Report::all()->count()>0){

                $report  = Report::find(1);
                $report->found += 1;
//                $report->missing -=1;
                $report->save();


            }else{
                $report = Report::create(['missing'=>1,'found'=>0]);
            }
                $msg = "success";
            return response()->json(array('status'=>$msg));
        }
            $msg = "success";
            return response()->json(array('status'=>$msg));
    }

	 public function recaptcha(Request $request) {

        $url ='https://www.google.com/recaptcha/api/siteverify';
        $res = $request->response;
        $secret = '6LdrkiIUAAAAAP-FW_0Z5-dmFZ-HCUgHyY6Q-uNx';

        $result =file_get_contents( $url.'?secret='.$secret.'&response='.$res);

        return response($result);
    }

}
