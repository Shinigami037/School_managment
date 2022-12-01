<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherFormRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teacher.index');
    }
    public function addteacher(TeacherFormRequest $request)
    {
        $validatedData = $request->validated();

        $teacher = new Teacher;
        $teacher->name = $validatedData['name'];
        $teacher->email = $validatedData['email'];
        $teacher->phone = $validatedData['phone'];
        $teacher->qualification = $validatedData['qualification'];
        $teacher->password = $validatedData['password'];

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
}
