<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use Session;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Department;

class DoctorController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $doctors = Doctor::orderBy('id', 'DESC')->get();
    return view('backend.pages.doctor.index', compact('doctors'));
  }


  public function create()
  {
    $branches = Branch::orderBy('name', 'ASC')->get();
    $departments = Department::orderBy('department_name', 'ASC')->get();
    return view('backend.pages.doctor.create', compact('branches', 'departments'));
  }


  public function store(Request $request)
  {
    $doctor = new Doctor;
    $this->validate($request, [
      'first_name' => 'required',
      'email' => 'required|unique:doctors',
      'branch_id' => 'required',
      'department_id' => 'required',
      'phone' => 'required|unique:doctors',
      'chember' => 'required',
    ]);

    $doctor->first_name = $request->first_name;
    $doctor->last_name = $request->last_name;
    $doctor->email = $request->email;
    $doctor->phone = $request->phone;
    $doctor->branch_id = $request->branch_id;
    $doctor->department_id = $request->department_id;
    $doctor->address = $request->address;
    $doctor->chamber = $request->chember;
    $doctor->qualification = $request->qualification;
    $doctor->time_schedule = $request->time_schedule;
    if($request->status != null){
      $doctor->status = 1;
    }
    else{
      $doctor->status = 0;
    }
    $doctor->username = StringHelper::createSlug($request->first_name, 'Doctor', 'username');
    $doctor->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/doctors');
    $doctor->save();

    session()->flash('success', 'Doctor information added successfully !!!');
    return redirect()->route('admin.doctor.index');
  }


  public function edit($id)
  {
    $doctor = Doctor::find($id);
    $branches = Branch::orderBy('name', 'ASC')->get();
    $departments = Department::orderBy('department_name', 'ASC')->get();
    return view('backend.pages.doctor.edit', compact('branches', 'departments', 'doctor'));
  }


  public function update(Request $request, $id)
  {
    $doctor = Doctor::find($id);
    $this->validate($request, [
      'first_name' => 'required',
      'email' => 'required|unique:doctors,email,'.$doctor->id,
      'branch_id' => 'required',
      'department_id' => 'required',
      'phone' => 'required|unique:doctors,phone,'.$doctor->id,
      'chember' => 'required',
    ]);

    $doctor->first_name = $request->first_name;
    $doctor->last_name = $request->last_name;
    $doctor->email = $request->email;
    $doctor->phone = $request->phone;
    $doctor->branch_id = $request->branch_id;
    $doctor->department_id = $request->department_id;
    $doctor->address = $request->address;
    $doctor->chamber = $request->chember;
    $doctor->qualification = $request->qualification;
    $doctor->time_schedule = $request->time_schedule;
    if($request->status != null){
      $doctor->status = 1;
    }
    else{
      $doctor->status = 0;
    }
    $doctor->username = StringHelper::createSlug($request->first_name, 'Doctor', 'username');
    if(!is_null($request->image)){
      if(!is_null($doctor->image)){
        $doctor->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/doctors', $doctor->image);
      }
      else{
        $doctor->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/doctors');
      }
    }
    $doctor->save();

    session()->flash('success', 'Doctor information updated successfully !!!');
    return redirect()->route('admin.doctor.index');
  }


  public function destroy($id)
  {
    $doctor = Doctor::find($id);
    if($doctor->image){
      ImageUploadHelper::delete('public/images/doctors/'.$doctor->image);
    }
    $doctor->delete();
    session()->flash('error', 'Doctor deleted successfully !!!');
    return redirect()->route('admin.doctor.index');
  }
}
