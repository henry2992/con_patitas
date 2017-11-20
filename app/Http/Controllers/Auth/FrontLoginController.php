<?php

namespace App\Http\Controllers\Auth;

use App\Count;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Mail;



class FrontLoginController extends Controller
{


    use RegistersUsers;

    public function __construct()
    {
        $this->middleware("guest")->except("logout");
    }

    public function showLoginForm()
    {
        return view("login.login");
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        $user = User::where (['email' => $request->email,'is_activated' =>true])->get()->count();


        if($validator->passes()) {
            if($user <= 0)
            {
                return redirect()->back()->withInput($request->only("email", "password", "remember"))->with('status','Your Email/Password is wrong or not verified.');
            }

            if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

                $request->session('item_'.Auth::user()->id,array());
                return redirect()->intended("/");
            }else{
                return redirect()->back()->withInput($request->only("email", "password", "remember"))->with('status','Email or Password is wrong');
            }
        }
            return redirect()->back()->withInput($request->only("email", "password", "remember"))->withErrors($validator);
    }

    /*  Register Functions  */
    public function showRegisterForm()
    {
        return view("login.signup");
    }

    protected function validator($data)
    {

        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'firstname' =>'required|string|max:255|min:2',
            'lastname'=>'required|string|max:255',
            'phonenumber' =>'required|string|min:8',
            'country' => 'required|string|min:1|max:255',
            'gender' => 'required|string|max:1',
            'postalcode' =>'required|string|min:3'
           

        ]);

    }

    protected function create(array $data)
    {

        return User::create([

            'firstname' =>$data['firstname'],
            'lastname' =>$data['lastname'],
            'gender' => $data['gender'],
            'postalcode' => $data['postalcode'],
            'phonenumber' =>$data['phonenumber'],
            'country' =>$data['country'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'state' =>$data['state'],
            'street' =>$data['street'],
            'city' =>$data['city'],


        ]);
    }

    public function register(Request $request)
    {	
    	
   

        $validate = $this->validator($request->all());

        if($validate->passes())
        {

            event(new Registered($user = $this->create($request->all())));

            $data = $request->all();

            $data['token'] = str_random(25);

            $getUserdata = User::find($user['id']);
            $getUserdata->token = $data['token'];
            $getUserdata->save();

            Mail::send("mail.confirmation",$data, function($message) use($data){
                $message->to($data['email']);
                $message->subject("Registration Confirmation");

            });

            return $this->registered($request, $user) ?: redirect(url('/login'))->with("status","Confirmation Email has been send. Please check your email.");
        }
            return redirect()->back()->withInput($request->except('password'))->withErrors($validate);
    }

    public function confirmation($token){

        $user = User::where("token",$token)->first();

        if(!is_null($user)) {
            $user->is_activated = 1;
            $user->token='';
            $user->save();

            // Increase total users //
            $count = Count::first();
            $count->user_count += 1;
            $count->save();
            //                      //
//    Define redirection page after loged in to pet registration page


//
            return redirect('login')->with("status","Your Email is verified.");
        }

        return redirect('login')->with("status","Something went wrong.");
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function registered(Request $request, $user)
    {
        //
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

//        $request->session()->flush();
//        $request->session()->regenerate();
        return redirect('/');
    }
    
    public function recaptcha(Request $request) {

        $url ='https://www.google.com/recaptcha/api/siteverify';
        $res = $request->response;
        $secret = '6LdrkiIUAAAAAP-FW_0Z5-dmFZ-HCUgHyY6Q-uNx';

        $result =file_get_contents( $url.'?secret='.$secret.'&response='.$res);

        return response($result);
    }

}
