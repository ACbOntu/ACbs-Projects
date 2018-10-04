<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use Session;

class PatientController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
}
