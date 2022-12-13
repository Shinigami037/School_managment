<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherFormRequest;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teacher.index');
    }

    public function addteacher(Request $request)
    {
        $validatedData = $request;

        $user = new User;
        $teacher = new Teacher;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role_as = 1;
        $user->save();

        $id = $user->id;
        $date = date("Y");
        $mid = strval($date[2] . $date[3]);
        // die(print_r($mid));
        // $teacher->name = $validatedData['name'];
        // $teacher->email = $validatedData['email'];
        $teacher->phone = $validatedData['phone'];
        $teacher->qualification = $validatedData['qualification'];
        // $teacher->password = Hash::make($validatedData['password']);
        $teacher->tid = $id;
        $gender = $request->gender;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/teacher/', $filename);
            $teacher->img = $filename;
        }
        if ($gender[0] == 'Male') {
            $teacher->gender = 1;
        } else {
            $teacher->gender = 0;
        }
        $teacher_id = Helper::IDGenerator(new Teacher, 'teacher_id', 3, 'SCH', $mid, '', '', 'TEC');
        /** Generate id */
        $teacher->teacher_id = $teacher_id;
        // $teacher->img = $validatedData['img'];
        $teacher->save();

        return redirect('admin/teacher');
    }

    public function display(Request $request)
    {
        $search = $request['search'] ?? '';
        // die($search);
        if ($search != '') {
            $value = DB::table('users')
                ->join('teacher', 'users.id', '=', 'teacher.tid')
                ->select('users.name', 'users.email', 'teacher.*')
                ->where('users.name', 'LIKE', "%$search%")
                ->orwhere('users.email', 'LIKE', "%$search%")
                ->orwhere('teacher.teacher_id', 'LIKE', "%$search%")
                ->where('teacher.is_delete', '=', 0)
                ->paginate(5);
        } else {
            $value = DB::table('users')
                ->join('teacher', 'users.id', '=', 'teacher.tid')
                ->select('users.name', 'users.email', 'teacher.*')
                ->where('teacher.is_delete', '=', 0)
                ->paginate(5);
        }

        // $value = Teacher::orderBy('id', 'ASC')->where('is_delete', '=', 0)->paginate(5);
        // $value = DB::table('Teacher')->orderBy('id', 'asc')->where('is_delete', '=', 0)->paginate(5);
        // return view('livewire.admin.teacher.index', ['values' => $value]);
        return view('admin.teacher.display', ['values' => $value, 'search' => $search]);
    }

    public function edit($tid)
    {
        $value = DB::table('users')
            ->join('teacher', 'users.id', '=', 'teacher.tid')
            ->select('users.name', 'users.email', 'teacher.*')
            ->where('teacher.tid', '=', $tid)->first();
        // die(print_r($value));
        return view('admin.teacher.edit', ['tid' => $value]);
    }

    public function update(Request $request, $tid)
    {
        // die('not implemented');
        $teacher = Teacher::all()->where('tid', $tid)->first();

        $validatedData = $request;
        $user = User::findOrFail($tid);
        $status  = $request->status;

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        // $user->save();

        // $teacher->name = $validatedData['name'];
        // $teacher->email = $validatedData['email'];
        $teacher->phone = $validatedData['phone'];
        $teacher->qualification = $validatedData['qualification'];
        if ($status[0] == 'Active') {
            $teacher->status = 1;
        } else {
            $teacher->status = 0;
        }

        $gender = $request->gender;
        if ($gender[0] == 'Male') {
            $teacher->gender = 1;
        } else {
            $teacher->gender = 0;
        }
        // $teacher->teacher_id = "";

        // die($status[0]);
        // $user->name = $validatedData['name'];
        // $user->email = $validatedData['email'];


        if ($request->hasFile('img')) {
            $path = 'uploads/teacher/' . $teacher->img;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/teacher/', $filename);
            $teacher->img = $filename;
        }
        // $teacher->img = $validatedData['img'];
        $user->update();
        $teacher->update();

        return redirect('admin/teacher');
    }

    public function delete(Request $request)
    {
        $id = $request->user_id;
        // dd($id);
        $teacher = Teacher::where('tid', '=', $id)->first();
        // $teacher = Teacher::findOrFail($id);
        $teacher->is_delete = 1;
        $teacher->update();
        $user = User::find($id);
        $user->role_as = 3;
        $user->update();
        return redirect('admin/teacher');
    }

    public function updateStatus(Request $request)
    {
        $id = $request->status_id;
        $teacher = Teacher::find($id);
        $curr_status = $teacher->status;
        if ($curr_status == 1) {
            $teacher->status = 0;
        } else {
            $teacher->status = 1;
        }
        $teacher->update();
        // dd($teacher->status, $curr_status, $id);
        return redirect('admin/teacher')->with('message', 'Status updated');
    }
    public function viewCard(Request $request, $id)
    {
        $value = DB::table('users')
            ->join('teacher', 'users.id', '=', 'teacher.tid')
            ->select('users.name', 'users.email', 'teacher.*')
            ->where('teacher.id', '=', $id)
            ->where('teacher.is_delete', '=', 0)
            ->first();
        // $teacher = Teacher::find($id);
        // $user = User::find($teacher->tid);
        // dd($value);
        return view('admin/teacher/view', ['values' => $value]);
    }
}
