<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use Session;
use App\Models\Branch;
use App\Models\NewsCircular;

class NewsCircularController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $notices = NewsCircular::orderBy('id', 'DESC')->get();
    return view('backend.pages.newsCircular.index', compact('notices'));
  }


  public function create()
  {
    $branches = Branch::orderBy('name', 'ASC')->get();
    return view('backend.pages.newsCircular.create', compact('branches'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'type' => 'required|numeric',
      'branch_id' => 'numeric',
    ]);

    $notice = new NewsCircular;
    $notice->title = $request->title;
    $notice->description = $request->description;
    $notice->branch_id = $request->branch_id;
    $notice->type = $request->type;
    if($request->status != 1){
      $notice->status = 0;
    }
    else{
      $notice->status = 1;
    }
    $notice->file = ImageUploadHelper::upload('file', $request->file('file'), time(), 'public/images/newsCirculars');
    $notice->slug = StringHelper::createSlug($request->title, 'NewsCircular', 'slug');
    $notice->save();

    session()->flash('success', 'Notice information updated successfully !!!');
    return redirect()->route('admin.news.index');
  }


  public function edit($id)
  {
    $notice = NewsCircular::find($id);
    $branches = Branch::orderBy('name', 'ASC')->get();
    return view('backend.pages.newsCircular.edit', compact('notice', 'branches'));
  }


  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'title' => 'required',
      'type' => 'required|numeric',
      'branch_id' => 'numeric',
    ]);

    $notice = NewsCircular::find($id);
    $notice->title = $request->title;
    $notice->description = $request->description;
    $notice->branch_id = $request->branch_id;
    $notice->type = $request->type;
    if($request->status != 1){
      $notice->status = 0;
    }
    else{
      $notice->status = 1;
    }
    if(!is_null($request->file)){
      if(!is_null($notice->file)){
        $notice->file = ImageUploadHelper::update('file', $request->file('file'), time(), 'public/images/newsCirculars', $notice->file);
      }
      else{
        $notice->file = ImageUploadHelper::upload('file', $request->file('file'), time(), 'public/images/newsCirculars');
      }
    }
    $notice->slug = StringHelper::createSlug($request->title, 'NewsCircular', 'slug');
    $notice->save();

    session()->flash('success', 'Notice information updated successfully !!!');
    return redirect()->route('admin.news.index');
  }


  public function destroy($id)
  {
    $notice = NewsCircular::find($id);
    if($notice->file != null){
      ImageUploadHelper::delete('public/images/newsCirculars/'.$notice->file);
    }
    $notice->delete();

    session()->flash('error', 'Notice deleted successfully !!!');
    return redirect()->route('admin.news.index');
  }

  public function hide($id)
  {
    NewsCircular::where('id', $id)->update(['status' => 0]);
    session()->flash('success', 'Successfully hide this notice !!!');
    return redirect()->route('admin.news.index');
  }

  public function publish($id)
  {
    NewsCircular::where('id', $id)->update(['status' => 1]);
    session()->flash('success', 'Successfully publish this notice !!!');
    return redirect()->route('admin.news.index');
  }
}
