<?php

namespace App\Http\Controllers;

use App\Subject;
use App\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
        $subjects = Subject::all();
        return view('subject.index' , compact('subjects'));
    }

    

    public function create()
    {

        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $teachers = User::where('type','!=','admin')->get() ;

        return view('subject.create' ,compact('teachers') );

    }

    public function store(Request $request)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $request->validate([
            //'body'=>'required',
        ]);


        Subject::create([
            'name' => $request->get('name'),
            'teacher_id' => $request->get('teacher_id'),
            'year' => $request->get('year'),
            'total_hours' => $request->get('total_hours'),
        ]);

        $subjects = Subject::all();
        return view('subject.index' , compact('subjects'));
    }


    public function edit(Subject $sub)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
        $teachers = User::where('type','!=','admin')->get() ;

        return view('subject.edit', compact('sub', 'teachers'));
    
    }

    public function update(Subject $sub)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
         
        $data = request()->validate([
            'name' => 'required',
            'year' => 'required',
            'total_hours' => 'required',
            'teacher_id' => 'required',
        ]);        


        $sub->update(array_merge(
            $data
        ));


        $subjects = Subject::all();
        return view('subject.index' , compact('subjects'));
    }


    public function destroy(Subject $sub)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $sub->delete();
        $subjects = Subject::all();
        return view('subject.index' , compact('subjects'));
    }


    public function get(Request $request)
    {
        $teacher = User::where('api_token' , $request->get('token'))->first();
        
    

        $subjects = Subject::where('teacher_id' , $teacher->id)->get();
        // return 'test';
        return [ 'subjects' => $subjects ];


        
    }

    public function test()
    {
        
    

        return 'test';


        
    }



}
