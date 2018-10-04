<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use Session;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index()
  {
    Contact::where('seen_unseen', 0)->update(['seen_unseen' => 1]);
    $contacts = Contact::orderBy('id', 'DESC')->get();
    return view('backend.pages.contact.index', compact('contacts'));
  }


  public function replyMessage(Request $request)
  {
    $this->validate($request, [
      'message' => 'required',
    ]);

    $data = array(
      'from_email' => 'acb@gmail.com',
      'to_email' => $request->email,
      'subject' => 'Reply of your query',
      'reply_message' => $request->message,
    );

     Mail::send('backend.pages.reply-email',$data,function($message) use($data){
            $message->from($data['from_email']);
            $message->to($data['to_email']);
            $message->subject($data['subject']);
        });

     return back();
  }

  public function destroy(Request $request, $id)
  {
    Contact::find($id)->delete();
    session()->flash('error', 'Message deleted successfully !!!');
    return redirect()->route('admin.contact.index');
  }
}
