<?php

namespace App\Http\Controllers\Auth\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use App\Models\Patient;


class LoginController extends Controller
{

    use AuthenticatesUsers;


    protected $redirectTo = '/';

    public function __construct(){
        $this->middleware('guest:patient', ['except' => ['logout']]);
    }


    public function showLoginForm(){
        return view('frontend.auth.login');
    }

    public function login(Request $request){

        //Validate the form data
        $this->validate($request, [
            'email' 		=> 'required',
            'password' 		=> 'required'
        ]);


        //Attempt to log the employee in
        if (Auth::guard('patient')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $patient = Patient::where('email', $request->email)->first();
            if (!is_null($patient)) {
                return redirect()->intended(route('patient.dashboard'));
            }
        }else{
            Session::flash('login_error', "There is no account by this email and password !!!");
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function logout()
    {
        Auth::guard('patient')->logout();
        return redirect()->route('index');
    }
}
