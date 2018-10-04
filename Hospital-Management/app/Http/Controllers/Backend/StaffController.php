<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use Session;
use App\Models\Staff;
use App\Models\Branch;
use App\Models\Department;

class StaffController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $staffs = Staff::orderBy('id', 'DESC')->get();
    return view('backend.pages.staff.index', compact('staffs'));
  }


  public function create()
  {
    $departments = Department::orderBy('department_name', 'ASC')->get();
    $branches = Branch::orderBy('name', 'ASC')->get();
    return view('backend.pages.staff.create', compact('departments', 'branches'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'department_id' => 'required|numeric',
      'branch_id' => 'required|numeric',
    ]);

    $staff = new Staff;
    $staff->name = $request->name;
    $staff->phone = $request->phone;
    $staff->address = $request->address;
    $staff->department_id = $request->department_id;
    $staff->branch_id = $request->branch_id;
    $staff->email = $request->email;
    if($request->status == null){
      $staff->status = 0;
    }
    else{
      $staff->status = 1;
    }
    $staff->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/staffs');
    $staff->username = StringHelper::createSlug($request->name, 'Staff', 'username');
    $staff->save();

    session()->flash('success', 'Staff information added successfully !!!');
    return redirect()->route('admin.staff.index');
  }


  public function edit($id)
  {
    $departments = Department::orderBy('department_name', 'ASC')->get();
    $branches = Branch::orderBy('name', 'ASC')->get();
    $staff = Staff::find($id);
    return view('backend.pages.staff.edit', compact('departments', 'branches', 'staff'));
  }


  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'department_id' => 'required|numeric',
      'branch_id' => 'required|numeric',
    ]);

    $staff = Staff::find($id);
    $staff->name = $request->name;
    $staff->phone = $request->phone;
    $staff->address = $request->address;
    $staff->department_id = $request->department_id;
    $staff->branch_id = $request->branch_id;
    $staff->email = $request->email;
    if($request->status == null){
      $staff->status = 0;
    }
    else{
      $staff->status = 1;
    }
    $staff->username = StringHelper::createSlug($request->name, 'Staff', 'username');
    if(!is_null($request->image)){
      if(!is_null($staff->image)){
        $staff->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/staffs', $staff->image);
      }
      else{
        $staff->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/staffs');
      }
    }
    $staff->save();

    session()->flash('success', 'Staff information added successfully !!!');
    return redirect()->route('admin.staff.index');
  }


  public function destroy($id)
  {
    $staff = Staff::find($id);
    if($staff->image){
      ImageUploadHelper::delete('public/images/staffs/'.$staff->image);
    }
    $staff->delete();

    session()->flash('success', 'Staff deleted successfully !!!');
    return redirect()->route('admin.staff.index');
  }
}
