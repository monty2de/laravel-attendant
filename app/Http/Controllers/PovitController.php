<?php

namespace App\Http\Controllers;

use App\Course;
use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PovitController extends Controller
{
    

    public function index()
    {
       

        $data = DB::connection('mysql2')->table('course_instructor')->get();
        return view('povit.index' , compact('data'));
    }

    

    public function create()
    {

        $courses = Course::all();
        $instructors = Instructor::all();

        return view('povit.create' ,compact('courses' , 'instructors') );

    }

    public function store(Request $request)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $course_name = Course::where('id' , $request->get('course_id'))->first();
        $instructor_name = Instructor::where('id' , $request->get('instructor_id'))->first();


        $data = DB::connection('mysql2')->table('course_instructor')->insert([
            'course_id' => $request->get('course_id'),
            'instructor_id' => $request->get('instructor_id'),
            'instructor_name' => $instructor_name->name_ar,
            'course_name' =>  $course_name->name_ar,
        ]);

        
        
        
        

        $data = DB::connection('mysql2')->table('course_instructor')->get();
        return view('povit.index' , compact('data'));

      
    }


    public function edit($id)
    {   
        
        $data = DB::connection('mysql2')->table('course_instructor')->where('id' , (int)$id)->first();
        // dd($data);
        $courses = Course::all();
        $instructors = Instructor::all();
        
        return view('povit.edit', compact('data', 'courses' , 'instructors'));
    
    }

    public function update($id , Request $request)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
        

        $course_name = Course::where('id' , $request->get('course_id'))->first();
        $instructor_name = Instructor::where('id' , $request->get('instructor_id'))->first();


 

        
        $data = DB::connection('mysql2')->table('course_instructor')->where('id' , '=' , $id)->update([
            'course_id' => $request->get('course_id'),
            'instructor_id' => $request->get('instructor_id'),
            'instructor_name' => $instructor_name->name_ar,
            'course_name' =>  $course_name->name_ar,
        ]);
        
        

        $data = DB::connection('mysql2')->table('course_instructor')->get();
        return view('povit.index' , compact('data'));
       


    }


    public function destroy( $id)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $data = DB::connection('mysql2')->table('course_instructor')->where('id' , '=' , $id)->delete();

        $data = DB::connection('mysql2')->table('course_instructor')->get();
        return view('povit.index' , compact('data'));
    }



    

   


}
