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

        $sicks = Sick::all();

        return view('sick.create' , compact('sicks'));

    }

    public function store(Request $request)
    {

        $student = Student::where('name_ar', 'LIKE' ,'%'. $request->get('name') . '%')->first();

        Sick::create([
            'student_id' => $student->id,
            'student_name' => $student->name_ar,
            'date' => Carbon::now(),
          

        
        ]);

        $sicks = Sick::all();

        return view('sick.create' , compact('sicks'));
        
    }


    public function destroy(Sick $sick)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $sick->delete();
        
        $sicks = Sick::all();

        return view('sick.create' , compact('sicks'));
    }
}
