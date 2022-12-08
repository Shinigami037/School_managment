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
        // $value = DB::table('class_tbl')
        // ->join('section_tbl', 'class_tbl.id', '=', 'section_tbl.cid')
        // ->select('class_tbl.name as className', 'section_tbl.*', 'section_tbl.id as sid')
        // ->where('section_tbl.id', $id)
        // ->first();
        $class = ClassModel::all();
        return view('admin.student.index', ['values' => $class]);
    }

    public function addstudent(Request $request)
    {
        return redirect('admin/addstudent')->with('message', 'Under construction kal aiyo');
        // die("Under construction kal aiyo");
    }
}
