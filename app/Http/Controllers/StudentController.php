<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// use App\Models\student;

class StudentController extends Controller
{
    public function index()
    {

        $url = url("/student");
        $title = "student Registration";
        $data = compact('url', 'title');
        return view('student')->with($data);
    }
    public function store(Request $request)
    {
        // laravel in insert query
        $student = new Student;
        $student->name = $request['name'];
        $student->country = $request['country'];
        $student->email = $request['email'];
        $student->password = Hash::make($request['password']);
        $student->save();

        return redirect("/studentView");
    }
    public function view()
    {
        // laravel in select query

        $student = Student::all();

        $data = compact("student");
        return view("studentView")->with($data);
    }
    public function delete($id)
    {

        $student = Student::find($id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $student = Student::find($id);

        if (is_null($student)) {
            // not  found
            return redirect('studentView');
        } else {
            $title = "Upadate student";
            $url = url("/student/update") . "/" . $id;
            $data = compact('student', 'url', 'title');
            return view('student')->with($data);
        }
    }
    public function update($id, Request $request)
    {
        $student = Student::find($id);
        $student->name = $request['name'];
        $student->country = $request['country'];
        $student->email = $request['email'];
        $student->password = Hash::make($request['password']);
        $student->save();
        return redirect("/studentView");
    }
}
