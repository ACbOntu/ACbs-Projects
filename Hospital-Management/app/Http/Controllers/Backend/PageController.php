<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use Session;

class PageController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index()
  {
    return view('backend.pages.index');
  }
   public function messages($id)
  {
   
  	    $messages = Contact::where('id', $id)->where('seen_unseen', 0)->first();
  	    Contact::where('id', $id)->update(['seen_unseen' => 1]);
    	return view('backend.pages.messages', compact('messages'));

  }
}
