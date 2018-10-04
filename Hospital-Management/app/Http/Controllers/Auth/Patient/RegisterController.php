<?php

namespace App\Http\Controllers\Auth\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use App\Models\Patient;
use Session;
use Hash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
    * Where to redirect users after registration.
    *
    * @var string
    */
    protected $redirectTo = '/';

    /**
    * Create a new controller instance.
    *
    * @return void
    */

    


    public function __construct()
    {
        $this->middleware('guest');
    }


    public function register(Request $request)
    {
        $patient = new Patient();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|unique:patients',
            'occupation' => 'required',
            'address' => 'required',
            'blood_group' => 'required',
            'birthdate' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        if($request->password == $request->confirm_password){
            $patient->name = $request->name;
            $patient->email = $request->email;
            $patient->occupation = $request->occupation;
            $patient->phone = $request->phone;
            $patient->address = $request->address;
            $patient->blood_group = $request->blood_group;
            $patient->birthdate = $request->birthdate;
            $patient->password = Hash::make($request->password);
            $patient->username = StringHelper::createSlug($request->name, 'Patient', 'username');
            $patient->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/patients');

            $patient->save();

            session()->flash('success', 'Registration successfull !!!');
            return redirect()->route('patient.login');
        }
        else{
            session()->flash('error', 'Confirm password does not match !!!');
            return bacK();
        }
    }


    public function patientRegistration()
    {

        return view('frontend.auth.register');
    }

}
