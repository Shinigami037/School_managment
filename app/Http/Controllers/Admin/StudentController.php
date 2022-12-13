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
use App\Models\Student;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

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
        $value = $request;

        $sel_class = $value->class;
        $sel_gender = $value->gender;
        $sel_state = $value->state;
        $class = ClassModel::where('name', $sel_class[0])->first();
        $section = Section::where('cid', '=', $class->id)->get();

        $sec_id = 0;
        $sec_name = '';
        for ($i = 0; $i < sizeof($section); $i++) {
            if ($section[$i]->current_students + 1 <= $section[$i]->max_students) {
                $section[$i]->current_students += 1;
                $section[$i]->update();
                $sec_id = $section[$i]->id;
                $sec_name = $section[$i]->name;
                break;
            }
        }
        if ($sec_id == 0 && $sec_name == '') {
            return redirect('admin/addstudent')->with('message', 'No Free Seat found.');
        }
        // Generators
        $date = date("Y");
        // student_id generate
        $mid = strval($date[2] . $date[3]);
        // $student_id = Helper::IDGenerator(new Student, 'student_id', 3, 'SCH', $mid, 'CL', $class->id, 'STU');
        // student_email generate
        $student_id = Helper::StudentIdGenerator('student_id', 3, $mid, $class->id);
        // dd($student_id2);
        $last_number = Helper::LastNumberGenerator($student_id, $class->id, 3);
        $sec_name = strtolower($sec_name);
        $email = $date . 'schcl' . $class->id . $sec_name . $value['fname'] . $last_number . '@school.org';

        // dd($value->date);

        // user table
        $user = new User;


        $user->name = $value['fname'];
        $user->email = $email;
        $user->password = Hash::make($value['password']);
        $user->role_as = 2;
        if (!$user->save()) {
            return redirect('admin/addstudent')->with('message', 'Please try again later');
        }
        // dd('password');
        // $user->save();
        $id = $user->id;
        // student table
        $student = new Student;
        $student->lname = $value['lname'];
        $student->cid = $sec_id;
        $student->sec_email = $value['email'];
        $student->student_id = $student_id;
        $student->phone = $value['phone'];
        if ($sel_gender[0] == 'Male') {
            $student->gender = 1;
        } else {
            $student->gender = 0;
        }
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/student/', $filename);
            $student->img = $filename;
        }
        $student->address = $value['address'];
        $student->state = $sel_state;
        $student->city = $value['city'];
        $student->zip = $value['zip'];
        $student->birth_date = $value['date'];
        $student->cid = $sec_id;
        $student->sid = $id;
        if (!$student->save()) {
            return redirect('admin/addstudent')->with('message', 'Please try again later');
        }
        return redirect('admin/student');
        // die("Under construction kal aiyo");
    }

    public function display()
    {
        $value = DB::table('student')
            ->join('users', 'student.sid', '=', 'users.id')
            ->join('section_tbl', 'student.cid', '=', 'section_tbl.id')
            ->join('class_tbl', 'section_tbl.cid', '=', 'class_tbl.id')
            ->orderBy('cid', 'asc')
            ->select('users.name as fname', 'users.email', 'student.*', 'section_tbl.name as sectionName', 'section_tbl.max_students', 'section_tbl.current_students', 'class_tbl.name as className')

            ->get();
        // ->select('users.*', 'student.*', 'section_tbl.*');
        // ->where('teacher.is_delete', '=', 0)
        // ->paginate(5);
        // die(compact($value));
        // dd($value);
        return view('admin/student/display', ['values' => $value]);
    }

    public function displayOrder(Request $request)
    {
        if ($request->ajax()) {
            $order = $request->sortby;
            // return redirect('admin/addstudent')->with('message', 'Please try again later');
            $value = DB::table('student')
                ->join('users', 'student.sid', '=', 'users.id')
                ->join('section_tbl', 'student.cid', '=', 'section_tbl.id')
                ->join('class_tbl', 'section_tbl.cid', '=', 'class_tbl.id')
                ->orderBy('cid', 'asc')
                ->select('users.name as fname', 'users.email', 'student.*', 'section_tbl.name as sectionName', 'section_tbl.max_students', 'section_tbl.current_students', 'class_tbl.name as className')
                ->paginate(5);
            // die(gettype($value));
            // dd($order);
            $value = (array) $value;
            $array = json_encode($value);

            return view('admin/student/display', compact('value'))->render();
            // die(gettype($array));
            die($array);
        }
    }
}
