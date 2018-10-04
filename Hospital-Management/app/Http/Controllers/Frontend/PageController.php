<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Contact;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Appointment;
use App\Models\NewsCircular;

class PageController extends Controller
{
  public function index()
  {
    $notices = NewsCircular::where('type', 0)->paginate(5);
    $circulars = NewsCircular::where('type', 1)->paginate(5);
    return view('frontend.pages.index', compact('notices', 'circulars'));
  }


  public function department($dept_name)
  {
    $departments = Department::where('department_name',$dept_name)->get();
   
  	return view('frontend.pages.department', compact('departments'));
  }


  public function findConsultantForm()
  {
    $branches = Branch::orderBy('name', 'ASC')->get();
    $departments = Department::orderBy('department_name', 'ASC')->get()->unique();
    return view('frontend.pages.findConsultantForm', compact('branches', 'departments'));
  }

  public function consultantList(Request $request)
  {
    $this->validate($request, [
      'department_id' => 'required',
      'branch_id' => 'required',
    ]);

    $doctors = Doctor::where('department_id', $request->department_id)->where('branch_id', $request->branch_id)->get();
    return view('frontend.pages.doctorList', compact('doctors'));
  }

  public function singleDoctor($username)
  {
    $doctor = Doctor::where('username', $username)->first();
    return view('frontend.pages.singleDoctor', compact('doctor'));
  }


  public function branch($id)
  {
    $branch = Branch::where('id', $id)->first();
    $depts = Department::where('branch_id',$id)->get();
    return view('frontend.pages.branch', compact('branch','depts'));
  }


  public function departmentBranch($branch_id,$dept_id)
  {
    $branch = Branch::where('slug', $slug)->first();
    $departments = Department::where('branch_id', $branch->id)->get();
    return view('frontend.pages.department', compact('departments'));
  }

  public function query(){
    return view('frontend.pages.query');
  }

  public function querySubmit(Request $request){
    $this->validate($request,[
      'name'=> 'required',
      'email'=> 'required',
      'phone'=> 'required',
      'message'=> 'required']);
    $contact = new Contact;
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->message = $request->message;
    $contact->save();
    session()->flash('success', 'Your query has been sent to authority successfully !!!');
    return redirect()->route('query');
  }

 public function circular(){
    $circulars = NewsCircular::where('type', 1)->paginate(5);
    return view('frontend.pages.circular', compact('circulars'));
  }


}
