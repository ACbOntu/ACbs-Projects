<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use Session;
use App\Models\Doctor;
use App\Models\Staff;
use App\Models\About;
use App\Models\Branch;
use App\Models\Department;
use App\Models\NewsCircular;

class BranchController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $branches = Branch::orderBy('id', 'DESC')->get();
    return view('backend.pages.branch.index', compact('branches'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'city' => 'required',
      'place' => 'required',
    ]);

    $branch = new Branch;
    $branch->name = $request->name;
    $branch->city = $request->city;
    $branch->place = $request->place;
    $branch->slug = StringHelper::createSlug($request->name, 'Branch', 'slug');
    $branch->save();

    session()->flash('success', 'Branch infomation added successfully !!!');
    return redirect()->route('admin.branch.index');
  }


  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'city' => 'required',
      'place' => 'required',
    ]);

    $branch = Branch::find($id);
    $branch->name = $request->name;
    $branch->city = $request->city;
    $branch->place = $request->place;
    $branch->slug = StringHelper::createSlug($request->name, 'Branch', 'slug');
    $branch->save();

    session()->flash('success', 'Branch infomation updated successfully !!!');
    return redirect()->route('admin.branch.index');
  }


  public function destroy(Request $request, $id)
  {
    $branch = Branch::find($id);
    $doctors = Doctor::where('branch_id', $id)->get();
    if(count($doctors) > 0){
      foreach($doctors as $doctor){
        ImageUploadHelper::delete('public/images/doctors/'.$doctor->image);
        $doctor->delete();
      }
    }
    $staffs = Staff::where('branch_id', $id)->get();
    if(count($staffs) > 0){
      foreach($staffs as $staff){
        ImageUploadHelper::delete('public/images/staffs/'.$staff->image);
        $staff->delete();
      }
    }
    $newsCirculars = NewsCircular::where('branch_id', $id)->get();
    if(count($newsCirculars) > 0){
      foreach($newsCirculars as $newsCircular){
        ImageUploadHelper::delete('public/images/newsCirculars/'.$newsCircular->file);
        $newsCircular->delete();
      }
    }
    $abouts = About::where('branch_id', $id)->get();
    if(count($abouts) > 0){
      $abouts->delete();
    }
    $branch->delete();
    session()->flash('error', 'Branch deleted successfully !!!');
    return redirect()->route('admin.branch.index');
  }
}
