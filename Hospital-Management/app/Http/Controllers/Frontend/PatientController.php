<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:patient');
  }


  public function index()
  {
    return redirect()->route('index');
  }
}
