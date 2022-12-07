<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\Models\ClassModel;
use App\Models\Section;


class StudentController extends Controller
{
    public function index()
    {
        // die();
        return view('admin.student.index');
    }

    public function addstudent(Request $request)
    {
        die("Under construction");
    }
}
