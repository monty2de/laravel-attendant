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
        $year1 = Student::where('year' , 1)->get();
        $year2 = Student::where('year' , 2)->get();
        $year3 = Student::where('year' , 3)->get();
        $year4 = Student::where('year' , 4)->get();
        return view('student.index' , compact('year1' , 'year2' , 'year3' , 'year4'));
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

        $year1 = Student::where('year' , 1)->get();
        $year2 = Student::where('year' , 2)->get();
        $year3 = Student::where('year' , 3)->get();
        $year4 = Student::where('year' , 4)->get();
        return view('student.index' , compact('year1' , 'year2' , 'year3' , 'year4'));
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


      

        $year1 = Student::where('year' , 1)->get();
        $year2 = Student::where('year' , 2)->get();
        $year3 = Student::where('year' , 3)->get();
        $year4 = Student::where('year' , 4)->get();
        return view('student.index' , compact('year1' , 'year2' , 'year3' , 'year4'));
    }


    public function destroy($id)
    {

        $st = Student::where('id', $id)->first();
        $st->delete();
        $year1 = Student::where('year' , 1)->get();
        $year2 = Student::where('year' , 2)->get();
        $year3 = Student::where('year' , 3)->get();
        $year4 = Student::where('year' , 4)->get();
        return view('student.index' , compact('year1' , 'year2' , 'year3' , 'year4'));

    }

    public function move($year)
    {

        $studebts = Student::where('year', $year-1)->get();

        foreach ($studebts as $studebt) {

            $studebt->update([
                'year' => $year,
            ]);
           
        }

        $year1 = Student::where('year' , 1)->get();
        $year2 = Student::where('year' , 2)->get();
        $year3 = Student::where('year' , 3)->get();
        $year4 = Student::where('year' , 4)->get();

     
        return view('student.index' , compact('year1' , 'year2' , 'year3' , 'year4'));

    }



    public function get(Request $request)
    {
      

        $students = Student::where('year', $request->get('year'))->get();


        return [ 'students' => $students ];

    }
}
