<?php

namespace App\Http\Controllers;

use App\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
      
    
    public function index()
    {
       
        $semesters = Semester::all();
        return view('semester.index' , compact('semesters'));
    }

    

    public function create()
    {

        return view('semester.create');

    }

    public function store(Request $request)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

     


        Semester::create([
            'name' => $request->get('name'),
            'year' => $request->get('year'),
         
        ]);

        $semesters = Semester::all();
        return view('semester.index' , compact('semesters'));
    }


    public function edit(Semester $semester)
    {
      
        
        return view('semester.edit', compact('semester'));
    
    }

    public function update(Semester $semester)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
       
        $data = request()->validate([
            'name' => 'required',
            'year' => 'required',
           
        ]);        


        $semester->update(array_merge(
            $data
        ));


        $semesters = Semester::all();
        return view('semester.index' , compact('semesters'));
    }


    public function destroy(Semester $semester)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $semester->delete();
        $semesters = Semester::all();
        return view('semester.index' , compact('semesters'));
    }


}
