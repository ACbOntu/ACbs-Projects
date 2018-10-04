<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use Session;
use App\Models\Doctor;
use App\Models\Staff;
use App\Models\Branch;
use App\Models\Department;
use App\Models\NewsCircular;

class DepartmentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $departments = Department::orderBy('id', 'DESC')->get();
    $branches = Branch::orderBy('name', 'ASC')->get();
    return view('backend.pages.department.index', compact('departments', 'branches'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'location' => 'required',
    ]);

    $department = new Department;
    $department->department_name = $request->name;
    $department->location = $request->location;
    $department->branch_id = $request->branch_id;
    $department->slug = StringHelper::createSlug($request->name, 'Department', 'slug');
    $department->save();

    session()->flash('success', 'Department infomation added successfully !!!');
    return redirect()->route('admin.department.index');
  }


  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'location' => 'required',
    ]);

    $department = Department::find($id);
    $department->department_name = $request->name;
    $department->location = $request->location;
    $department->branch_id = $request->branch_id;
    $department->slug = StringHelper::createSlug($request->name, 'Department', 'slug');
    $department->save();

    session()->flash('success', 'Department infomation updated successfully !!!');
    return redirect()->route('admin.department.index');
  }


  public function destroy(Request $request, $id)
  {
    $department = Department::find($id);
    $doctors = Doctor::where('department_id', $id)->get();
    if(count($doctors) > 0){
      foreach($doctors as $doctor){
        ImageUploadHelper::delete('public/images/doctors/'.$doctor->image);
        $doctor->delete();
      }
    }
    $staffs = Staff::where('department_id', $id)->get();
    if(count($staffs) > 0){
      foreach($staffs as $staff){
        ImageUploadHelper::delete('public/images/staffs/'.$staff->image);
        $staff->delete();
      }
    }
    $department->delete();
    session()->flash('error', 'Department deleted successfully !!!');
    return redirect()->route('admin.department.index');
  }
}
