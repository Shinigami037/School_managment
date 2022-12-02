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

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role_as = 1;
        $user->save();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/teacher/', $filename);
            $teacher->img = $filename;
        }
        // $teacher->img = $validatedData['img'];

        $teacher->save();

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
    public function update(TeacherFormRequest $request, $teacher)
    {
        die('not implemented');
        $teacher = Teacher::findOrFail($teacher);

        $validatedData = $request->validated();
        // $user = User::find($validatedData['email']);
        $teacher->name = $validatedData['name'];
        $teacher->email = $validatedData['email'];
        $teacher->phone = $validatedData['phone'];
        $teacher->qualification = $validatedData['qualification'];

        // $user->name = $validatedData['name'];
        // $user->email = $validatedData['email'];
        // $user->update();

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

        $teacher->update();

        return redirect('admin/teacher');
    }
}