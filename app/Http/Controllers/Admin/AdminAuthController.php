<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
class AdminAuthController extends Controller
{
    //

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware("guest:admin")->except('logout');
    }

    public function showLoginForm(){
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        $user = Admin::where (['email' => $request->email])->get()->count();


        if($validator->passes()) {
            if($user <= 0)
            {
                $msg = 'Your Email or Password is wrong.';
                return redirect()->back()->withInput($request->except('password'))->with('status',$msg);
            }

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                return redirect()->intended("admin/dashboard");
            }else{
                $msg = 'Email or Password is wrong';
                return redirect()->back()->withInput($request->except('password'))->with('status',$msg);
            }
        }
        return redirect()->back()->withInput($request->only("email", "password", "remember"))->withErrors($validator);
    }
    public function showRegisterForm(){
        return view('admin.auth.register');
    }

    public function register(Request $request){

        $validate = $this->validator($request->all());

        if($validate->passes())
        {

            event(new Registered($admin = $this->create($request->all())));

            return redirect('/admin')->with("status","Confirmation Email has been send. Please check your email.");
        }
        return redirect()->back()->withInput($request->except('password'))->withErrors($validate);
    }
    protected function create(array $data)
    {
        return Admin::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function validator($data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

    }
    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function registered(Request $request, $user)
    {
        //
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

     //   $request->session()->flush();
     //   $request->session()->regenerate();
        return redirect('/admin');
    }



}
