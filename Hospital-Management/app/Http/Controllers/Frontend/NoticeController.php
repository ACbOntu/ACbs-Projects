<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsCircular;

class NoticeController extends Controller
{
    public function singleNotice($slug)
    {
    	$notice = NewsCircular::where('slug', $slug)->where('status', 1)->first();
    	return view('frontend.pages.notice-details', compact('notice'));
    }


    public function singleCircular($slug)
    {
    	$notice = NewsCircular::where('slug', $slug)->where('status', 1)->first();
    	return view('frontend.pages.notice-details', compact('notice'));
    }
}
