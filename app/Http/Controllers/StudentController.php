<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    // public function __construct()
    // {
    //     // $this->middleware('auth')->only(['store']);
    //     $this->middleware('auth');
    // }
    

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
            'warning_ratio' => $request->get('warning_ratio'),
        ]);

        $students = Student::all();
        return view('student.index' , compact('students'));
    }


    public function edit(Student $st)
    {
        
        return view('student.edit', compact('st'));
    
    }

    public function update(Student $st)
    {
         
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'year' => 'required',
        ]);        


        $st->update(array_merge(
            $data
        ));


        $students = Student::all();
        return view('Student.index' , compact('students'));
    }


    public function destroy($id)
    {

        $st = Student::where('id', $id)->first();
        $st->delete();
        $students = Student::all();

        return view('student.index' , compact('students'));

    }


    public function get(Request $request)
    {
      

        $students = Student::where('year', $request->get('year'))->get();


        return [ 'students' => $students ];

    }
}
