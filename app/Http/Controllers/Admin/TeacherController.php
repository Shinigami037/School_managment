<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherFormRequest;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teacher.index');
    }
    public function addteacher(TeacherFormRequest $request)
    {
        $validatedData = $request->validated();
        $user = new User;
        $teacher = new Teacher;
        $teacher->name = $validatedData['name'];
        $teacher->email = $validatedData['email'];
        $teacher->phone = $validatedData['phone'];
        $teacher->qualification = $validatedData['qualification'];
        $teacher->password = Hash::make($validatedData['password']);

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
        $teacher->teacher_id = "";
        // $teacher->img = $validatedData['img'];

        $teacher->save();
        $id = $teacher->id;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role_as = 1;
        $user->tid = $id;
        $user->save();

        return redirect('admin/addteacher');
    }
    public function display()
    {
        return view('admin.teacher.display');
    }
    public function edit(Teacher $tid)
    {
        return view('admin.teacher.edit', compact('tid'));
    }


    public function update(Request $request, $tid)
    {
        // die('not implemented');
        $teacher = Teacher::findOrFail($tid);

        $validatedData = $request;
        $user = User::all()->where('tid', $tid)->first();
        $status  = $request->status;

        $teacher->name = $validatedData['name'];
        $teacher->email = $validatedData['email'];
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
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];


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

    public function delete(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->is_delete = 1;
        $teacher->update();
        return redirect('admin/teacher');
    }
}
