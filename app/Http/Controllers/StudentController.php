<?php

namespace App\Http\Controllers;

use App\Level;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    // public function __construct()
    // {
    //     // $this->middleware('auth')->only(['store']);
    //     $this->middleware('auth');
    // }
    

    public function index()
    {
       
        
        $students = Student::orderBy('level_id')->get();       
       
        return view('student.index' , compact('students'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('student.create', compact('levels'));

    }

    public function store(Request $request)
    {

        Student::create([
            'name_ar' => $request->get('name_ar'),
            'name_en' => $request->get('name_en'),
            'level_id' => $request->get('level_id'),
    
        ]);

       
        $students = Student::orderBy('level_id')->get();       
       
        return view('student.index' , compact('students')); 
    }


    
    public function edit(Student $st)
    {
        $levels = Level::all();
        return view('student.edit', compact('st' , 'levels'));
    
    }

    public function update(Student $st)
    {
         
        $data = request()->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'level_id' => 'required',
        ]);        


        $st->update(array_merge(
            $data
        ));


      

      
        $students = Student::orderBy('level_id')->get();       
       
        return view('student.index' , compact('students'));   
    }


    public function destroy($id)
    {

        $st = Student::where('id', $id)->first();
        $st->delete();

        $students = Student::orderBy('level_id')->get();       
       
        return view('student.index' , compact('students'));  

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
      

        $students = Student::where('level_id', $request->get('level_id'))->get();


        return [ 'students' => $students ];

    }
}
