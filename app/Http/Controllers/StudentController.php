<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    

    public function index()
    {
        $students = Student::all();
        return view('student.index' , compact('students'));
    }

    public function create()
    {

        return view('student.create');

    }

    public function store(Request $request)
    {

        $request->validate([
            //'body'=>'required',
        ]);


        Student::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'year' => $request->get('year'),
        ]);

        $students = Student::all();
        return view('student.index' , compact('students'));
    }


    public function destroy($id)
    {

        $st = Student::where('id', $id)->first();
        $st->delete();
        // return back();
    }


}
