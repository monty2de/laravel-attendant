<?php

namespace App\Http\Controllers;

use App\Course;
use App\Instructor;
use App\Level;
use App\Semester;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    

    public function index()
    {
       

        $courses = Course::all();
        return view('subject.index' , compact('courses'));
    }

    

    public function create()
    {

        $levels = Level::all();
        $semesters = Semester::all();

        return view('subject.create' ,compact('levels' , 'semesters') );

    }

    public function store(Request $request)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        Course::create([
            'name_ar' => $request->get('name_ar'),
            'name_en' => $request->get('name_en'),
            'level_id' => $request->get('level_id'),
            'semester_id' => $request->get('semester_id'),
            'code' => $request->get('code'),
            'unit' => $request->get('unit'),
            'total_hours' => $request->get('total_hours'),
        ]);

        $courses = Course::all();
        return view('subject.index' , compact('courses'));
    }


    public function edit(Course $sub)
    {
      
        $levels = Level::all();
        $semesters = Semester::all();
        return view('subject.edit', compact('sub', 'levels' , 'semesters'));
    
    }

    public function update(Course $sub)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
         
        $data = request()->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'total_hours' => 'required',
            'level_id' => 'required',
            'semester_id' => 'required',
            'code' => 'required',
            'unit' => 'required',
        ]);        


        $sub->update(array_merge(
            $data
        ));


        $courses = Course::all();
        return view('subject.index' , compact('courses'));
    }


    public function destroy(Course $sub)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $sub->delete();

         $courses = Course::all();
        return view('subject.index' , compact('courses'));
    }


    public function get(Request $request)
    {
        $instructor = Instructor::where('id' , $request->get('id'))->first();

        $courses = $instructor->courses; 
        return [ 'subjects' => $courses ];


        
    }

    

   



}
