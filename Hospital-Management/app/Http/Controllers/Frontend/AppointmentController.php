<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Appointment;
use Session;
use Auth;

class AppointmentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:patient');
  }


  public function takeAppointment($username)
  {
    $doctor = Doctor::where('username', $username)->first();
    return view('frontend.pages.appointment', compact('doctor'));
  }

  public function submitAppoinment(Request $request)
  {
    $appointmentCount = Appointment::where('doctor_id', $request->id)->where('appoint_date', $request->appointment_date)->get();
    if(count($appointmentCount) <= 5){
      $this->validate($request, [
        'symptom' => 'required',
        'appointment_date' => 'required',
      ]);

      $appointment = new Appointment();
      $appointment->appoint_date = $request->appointment_date;
      $appointment->symptomn = $request->symptom;
      $appointment->doctor_id = $request->id;
      $appointment->patient_id = Auth::guard('patient')->user()->id;
      $appointment->branch_id = $request->branch_id;
      $appointment->save();

      session()->flash('success', 'Appointment taken successfully !!!');
      return back();
    }
    else{
      session()->flash('error', 'Sorry already too much appointment for this doctor !!! Please request for another date.');
      return back();
    }
  }
}
