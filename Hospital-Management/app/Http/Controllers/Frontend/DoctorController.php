<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Department;

class DoctorController extends Controller
{
    public function departmentDoctor($slug)
    {
    	$department = Department::where('slug', $slug)->first();
    	$doctors = Doctor::where('department_id', $department->id)->get();
    	return view('frontend.pages.department-doctor', compact('doctors'));
    }
}
