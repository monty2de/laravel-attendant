<?php

namespace App\Http\Controllers;

use App\Sick;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SickController extends Controller
{
    
    public function create()
    {

        return view('sick.create');

    }

    public function store(Request $request)
    {

        $student = Student::where('name', 'LIKE' ,'%'. $request->get('name') . '%')->first();

        Sick::create([
            'student_id' => $student->id,
            'student_name' => $student->name,
            'date' => Carbon::now(),
          

        
        ]);

        $students = Student::all();
        return view('student.index' , compact('students'));
    }
}
