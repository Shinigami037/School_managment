<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassController extends Controller
{
    public function index()
    {
        return view('admin/class/index');
    }
    public function display()
    {
        $value = ClassModel::all();
        return view('admin/class/display', ['values' => $value]);
    }
    public function update(Request $request)
    {
        $recived_class = $request->class;
        $max_value = $request->student;
        ClassModel::where('name', $recived_class[0])->update(['max_value' => $max_value]);
        // $class->section

        // $class[0]->max_value = $max_value;
        // $class[1]->max_value = $max_value;
        // $class[2]->max_value = $max_value;
        // die(print_r($val));
        // $class->update();


        // dd($value[0]->name);
        // foreach ($value as $data) {
        //     echo $data;
        // }
        // die();
        return redirect('admin/class');
    }
}
