<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Contact;
use App\Count;
use App\Report;
use App\Text;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware("auth:admin");
    }

    public function index(){

        $users= User::all();

        $userCounts = $users->count();
        $onlineUserCount=0;
        $currentYear = date('Y',time());
        $lastMonth = date('n',time())-1 == 0 ? 12 : date('n',time());
        $monthlyUserCount = array();
        $lastMonthUsers=0;
        $currentMonthUsers=0;

        if($lastMonth == 12){
            $lastMonthUsers = User::whereYear('created_at',$currentYear-1)->whereMonth('created_at',$lastMonth)->count();
        }else{
            $lastMonthUsers = User::whereYear('created_at',$currentYear)->whereMonth('created_at',$lastMonth)->count();
        }

        for($i=0;$i<12;$i++){
            $monthlyUserCount[$i] = User::whereYear('created_at',$currentYear)->whereMonth('created_at',$i+1)->count();
        }

        foreach ($users as $user){
            if($user->onlineUsers()){
                $onlineUserCount +=1;
            }
            if($user->created_at->month == date('n',time())){
                $currentMonthUsers += 1;
            }
        }
        $pets = Count::first();
        $reports = Report::first();

        if($lastMonthUsers == 0){
            $lastMonthUsers = 1;
        }
        $increasePercent = $currentMonthUsers*100/$lastMonthUsers;

        $data = [
            'userCount' =>$userCounts,
            'pets' =>$pets,
            'reports' =>$reports,
            'onlineUserCount' =>$onlineUserCount,
            'monthlyUserCount' =>$monthlyUserCount,
            'lastMonthUsers' => $lastMonthUsers,
            'currentMonthUsers' =>$currentMonthUsers,
            'increasePercent' =>$increasePercent
        ];

        return view('admin.home.home',array('data'=>$data));
    }

    public function showAds(){

        $text= Text::first();

        return view('admin.slider.show',array('data'=>$text));
    }

    public function updateAds(Request $request){

        $columns = Schema::getColumnListing('texts');
        $datas = $request->all();
        $insert = array();

        foreach ($datas as $key=>$data){
            if(in_array($key , $columns)){
                $insert[$key] = $data;
            }
        }

        $result = Text::find(1)->update($insert);

        if($result){
            return redirect(route('admin.ads.show'))->with('status','Updated');
        }else{
            return redirect()->back()->withInput($request->all())->with('status','Something went wrong');
        }
    }

    public function showInbox(){

        $contacts = Contact::all();

        return view('admin.inbox.view',array('data'=>$contacts));
    }

    public function deleteInbox(Request $request){

        $id = $request->get('id');

        $result = Contact::where('id',$id)->delete();

        if($result){

            return response()->json(array('status'=>'success'));
        }else{
            return response()->json(array('status'=>'fail'));
        }

    }
    public function showChangePasswordForm(){

        return view ('admin.auth.passwords.reset');
    }

    public function admin_credential_rules(array $data)
    {
        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password|min:6',
            'password_confirmation' => 'required|same:password|min:6',
        ]);

        return $validator;
    }

    public function changePassword(Request $request)
    {
        if(Auth::Check())
        {
            $request_data = $request->all();
            $validator = $this->admin_credential_rules($request_data);

            if($validator->fails())
            {

                return redirect()->back()->withErrors($validator);
            }
            else
            {
                $current_password = Auth::User()->password;
                if(Hash::check($request_data['current-password'], $current_password))
                {
                    $user_id = Auth::User()->id;
                    $obj_user = Admin::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;

                    $result = $obj_user->save();

                    if($result){
//                           $request->session()->flush();
//                           $request->session()->regenerate();

                        return redirect()->back()->with('status','Password Changed.');
                    }else{

                    }
                }
                else
                {
                    return redirect()->back()->with('status','Please enter correct current password.');
                }
            }
        }
        else
        {
            return redirect()->to('/admin');
        }
    }


}
