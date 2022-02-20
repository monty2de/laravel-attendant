<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Exports\AttendancesExport;
use App\Sick;
use App\Student;
use App\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class AttendanceController extends Controller
{


    public function store(Request $request)
    {


        $student = Student::where('name', $request->get('student_name'))->first();

        if ($student != null) {
            Attendance::create([
                'student_id' => $student->id,
                'student_name' => $student->name,
                'subject_year' => $request->get('subject_year'),
                'subject_name' => $request->get('subject_name'),
                'hours' => (int)$request->get('hourse'),
                'date' => Carbon::now(),
            ]);
        }

        return 'ok';
    }





    public function get(Request $request)
    {

        $attenents = Attendance::all();

        $subjects = Subject::all();


        return view('attendent.get' , compact('subjects' , 'attenents') );
    }


    public function index(Request $request)
    {

        $missingHours = 0;
        $raio = 10;
        $message = ' لا تنبية';
        $student = Student::where('name' , 'LIKE' ,'%'. $request->get('name') . '%' )->first();
        
        // check if student have a sick leave

        $sickLeave = Sick::where('student_id' , $student->id)->get();

        if ($sickLeave == null) {
            $raio = 10;
        }else{
            $raio = 15; 
        }


        // get the attendent of the st and sum all atteb
        //make it where(subject name)

        $attenents = Attendance::where('student_id' ,$student->id )->where('subject_name' ,$request->get('subject') )->get();

        // cal the hourse

        foreach ($attenents as $attenent) {
         $missingHours += $attenent->hours;
        }

        // get the subject total hours

        $subject = Subject::where('name' ,  $request->get('subject')  )->first();

        // 
        $totalMissingHourse = $subject->total_hours - $missingHours;

        $attendRaio = ($totalMissingHourse / $subject->total_hours) * 100;
        $missRaio = 100 - $attendRaio;
        
            // create the message
            
        if ($raio == 10) {

            if ($missRaio >= 10) {
                $message = 'تجاوز';
            }
            elseif($missRaio < 10 &&  $missRaio >= 9) {
             $message = 'انذار نهائي';
            }
            elseif($missRaio < 9 &&  $missRaio >= 7) {
             $message = 'انذار اولي';
            }
            elseif($missRaio < 7 &&  $missRaio >= 5) {
             $message = 'تنبية';
            }
        }
        else{
            if ($missRaio >= 15) {
                $message = 'تجاوز';
            }
            elseif($missRaio < 15 &&  $missRaio >= 9) {
            $message = 'انذار نهائي';
            }
            elseif($missRaio < 9 &&  $missRaio >= 7) {
            $message = 'انذار اولي';
            }
            elseif($missRaio < 7 &&  $missRaio >= 5) {
            $message = 'تنبية';
            }
        }
        

        // dd($raio);
        // dd($missRaio);
        return view('attendent.index' , compact('attenents' , 'message') );
    }



    public function destroy(Attendance $attendent)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $attendent->delete();
        
        $attenents = Attendance::all();

        $subjects = Subject::all();


        return view('attendent.get' , compact('subjects' , 'attenents') );
        
    }


    public function export( )
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        return Excel::download(new AttendancesExport, 'data.xlsx');
        
        
    }
}
