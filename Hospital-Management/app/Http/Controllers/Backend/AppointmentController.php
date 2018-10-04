<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use Session;
use App\Models\Appointment;

class AppointmentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function uncompleted()
  {
    $appointments = Appointment::where('status', 0)->get();
    return view('backend.pages.appointment.index', compact('appointments'));
  }


  public function completed()
  {
    $appointments = Appointment::where('status', 1)->get();
    return view('backend.pages.appointment.index', compact('appointments'));
  }


  public function completeService($id)
  {
    Appointment::where('id', $id)->update(['status' => 1]);
    return redirect()->route('admin.appointment.completed');
  }


  public function uncompleteService($id)
  {
    Appointment::where('id', $id)->update(['status' => 0]);
    return redirect()->route('admin.appointment.uncompleted');
  }


  public function destroy($id)
  {
    Appointment::find($id)->delete();
    session()->flash('error', 'Appointment deleted successfully !!!');
    return back();
  }
}
