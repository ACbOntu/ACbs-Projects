<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use Session;
use App\Models\About;
use App\Models\Branch;

class AboutController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $branches = Branch::orderBy('name', 'ASC')->get();
    $abouts = About::orderBy('id', 'DESC')->get();
    return view('backend.pages.about.index', compact('abouts', 'branches'));
  }


  public function store(Request $request)
  {
    $about = new About;

    $this->validate($request, [
      'branch_id' => 'numeric',
      'emergency' => 'required|unique:abouts',
      'helpline' => 'required|unique:abouts',
      'ambulance_no' => 'required|unique:abouts',
      'email' => 'required|unique:abouts',
    ]);

    $about->branch_id = $request->branch_id;
    $about->emergency = $request->emergency;
    $about->helpline = $request->helpline;
    $about->ambulance_no = $request->ambulance_no;
    $about->email = $request->email;
    $about->save();

    session()->flash('success', 'Information added successfully !!!');
    return redirect()->route('admin.about.index');
  }


  public function update(Request $request, $id)
  {
    $about = About::find($id);

    $this->validate($request, [
      'branch_id' => 'numeric',
      'emergency' => 'required|unique:abouts,emergency,'.$about->id,
      'helpline' => 'required|unique:abouts,helpline,'.$about->id,
      'ambulance_no' => 'required|unique:abouts,ambulance_no,'.$about->id,
      'email' => 'required|unique:abouts,email,'.$about->id,
    ]);

    $about->branch_id = $request->branch_id;
    $about->emergency = $request->emergency;
    $about->helpline = $request->helpline;
    $about->ambulance_no = $request->ambulance_no;
    $about->email = $request->email;
    $about->save();

    session()->flash('success', 'Information updated successfully !!!');
    return redirect()->route('admin.about.index');
  }


  public function destroy($id)
  {
    About::find($id)->delete();
    session()->flash('error', 'Information deleted successfully !!!');
    return redirect()->route('admin.about.index');
  }
}
