<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function index()
    {
        return view('admin/class/index');
    }
    public function display()
    {
        $value = DB::table('class_tbl')
            ->join('section_tbl', 'class_tbl.id', '=', 'section_tbl.cid')
            ->select('class_tbl.name as className', 'section_tbl.*')
            ->orderBy('cid', 'asc')
            ->get();
        // ->paginate(2);
        // ->orderBy('cid', 'asc');
        // ->where('teacher.is_delete', '=', 0);

        // $value = ClassModel::all();
        // dd($value);
        return view('admin/class/display', ['values' => $value]);
    }
    public function update(Request $request)
    {
        $recived_class = $request->class;
        $recived_section = $request->section;
        $max_value = $request->student;

        $class = ClassModel::where('name', '=', $recived_class[0])->first();
        $class_id = $class->id;

        $temp = Section::where('name', '=', $recived_section[0])->where('cid', '=', $class_id)->first();
        // die($temp);
        if (empty($temp)) {

            $section = new Section;

            $section->name = $recived_section[0];
            $section->max_students = $max_value;
            $section->cid = $class_id;
            $section->save();

            return redirect('admin/addclass');
        } else {

            $temp->max_students = $max_value;
            $temp->update();

            return redirect('admin/addclass');
        }
    }
}
