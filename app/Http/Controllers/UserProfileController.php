<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator($data)
    {

        return Validator::make($data, [
            'firstname' =>'required|string|max:255|min:2',
            'lastname'=>'required|string|max:255',
            'phonenumber' =>'required|string|min:8',
            'country' => 'required|string|min:1|max:255',
            'gender' => 'required|string|max:1',
            'postalcode' =>'required|string|min:3',
        ]);

    }

    public function showProfileForm(){

        $user = Auth::user();
        $user = User::find($user->id);

        return view('login.view',array('data'=>$user));
    }
    public function updateProfile(Request $request){


        $datas = $request->all();
        $columns = Schema::getColumnListing('users');

        $update = array();

        foreach ($datas as $key=>$data){
            if(in_array($key,$columns)){
                $update[$key] = $data;
            }
        }

        $validate = $this->validator($request->all());


        if($validate->passes()){

            $user = User::where('id',Auth::user()->id)->update($update);

            if ($user){
                $msg = 'Update Successful !';

            }else{
                $msg = 'Something went wrong. Please try again.';
            }
                return redirect(('profile/edit'))->with('status',$msg);
        }else{
            return redirect()->back()->withInput($datas)->withErrors($validate);
        }
    }

    public function showChangeEmailForm(){

        return view('login.change_email');
    }

    public function changeEmail(Request $request){

        $newEmail = $request->get('email');
        $userId = Auth::user()->id;

        $validate = $this->validate($request->all(),['email' => 'required|email|string|unique:users']);

        if($validate->passes()){


            $token = str_random(25);

            $result = User::where('id',$userId)->update(array('email'=>$newEmail,'token'=>$token,'is_activated'=>'0'));

//            Mail::send("mail.confirmation",$data, function($message) use($data){
//                $message->to($data['email']);
//                $message->subject("Registration Confirmation");
//
            if($result){
                return view('login.email.confirmaton');
            }
        } else {
            return redirect()->back()->withInput($request->all())->withErrors($validate);
        }



    }

    public function confirmationEmail(Request $request,$token){

    }

    public function showChangePasswordForm(){

        return view ('login.change_password');
    }

    public function admin_credential_rules(array $data)
    {
//        $messages = [
//            'current-password.required' => 'Please enter current password',
//            'password.required' => 'Please enter password',
//        ];

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
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;

                    $result = $obj_user->save();

                    if($result){
                       return redirect('profile/change_password')->with('status','Password Changed.');
                    }else{

                    }
                }
                else
                {
                   return redirect('profile/change_password')->with('status','Please enter correct current password.');
                }
            }
        }
        else
        {
            return redirect()->to('/');
        }
    }

}
