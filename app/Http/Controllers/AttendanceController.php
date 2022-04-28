<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Course;
use App\Exports\AttendancesExport;
use App\Level;
use App\Sick;
use App\Status;
use App\Student;
use App\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\isEmpty;

class AttendanceController extends Controller
{


    public function store(Request $request)
    {


        $student = Student::where('name_ar', $request->get('student_name'))->first();

        if ($student != null) {
            Attendance::create([
                'student_id' => $student->id,
                'student_name' => $student->name_ar,

                'subject_year' => $request->get('level_id'),

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

        $subjects = Course::all();
        $levels = Level::all();


        return view('attendent.get' , compact('subjects' , 'attenents' , 'levels') );
    }


    public function index(Request $request)
    {

        $missingHours = 0;
        $raio = 10;
        $message = ' لا تنبية';
        $student = Student::where('name_ar' , 'LIKE' ,'%'. $request->get('name') . '%' )->first();
        
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

        $subject = Course::where('name_en' ,  $request->get('subject')  )->first();

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

        $subjects = Course::all();
        $levels = Level::all();


        return view('attendent.get' , compact('subjects' , 'attenents' , 'levels') );
        
    }

    // export the status table not the attendant table
    public function export( )
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        return Excel::download(new AttendancesExport, 'data.xlsx');
        
        
    }


    public function searchall(Request $request)
    {

        

        $students = Student::where('level_id' , (int)$request->get('level_id')  )->get();
        $subjects = Course::where('level_id' , (int)$request->get('level_id')  )->get();
        $level_name = Level::where('id' , (int)$request->get('level_id')  )->first();
        foreach ($students as  $student) {

            foreach ($subjects as  $subject) {

                $missingHours = 0;
                $raio = 10;
                $status = ' لا تنبية';


                // check if student have a sick leave

                $sickLeave = Sick::where('student_id' , $student->id)->get();

                if ($sickLeave == null) {
                    $raio = 10;
                }else{
                    $raio = 15; 
                }


                // get the attendent of the st and sum all atteb
       
                $attenents = Attendance::where('student_id' ,$student->id )->where('subject_name' ,$subject->name_en )->get();

                // cal the missing hours by sum all attenents hours for this student in this subject

                foreach ($attenents as $attenent) {
                $missingHours += $attenent->hours;
                }


                // calc total Missing Hourse
                $totalMissingHourse = $subject->total_hours - $missingHours;
                // calc raio
                $attendRaio = ($totalMissingHourse / $subject->total_hours) * 100;
                $missRaio = 100 - $attendRaio;


                // create the message
            
                if ($raio == 10) {

                    if ($missRaio >= 10) {
                        $status = 'تجاوز';
                    }
                    elseif($missRaio < 10 &&  $missRaio >= 9) {
                    $status = 'انذار نهائي';
                    }
                    elseif($missRaio < 9 &&  $missRaio >= 7) {
                    $status = 'انذار اولي';
                    }
                    elseif($missRaio < 7 &&  $missRaio >= 5) {
                    $status = 'تنبية';
                    }
                }
                else{
                    if ($missRaio >= 15) {
                        $status = 'تجاوز';
                    }
                    elseif($missRaio < 15 &&  $missRaio >= 9) {
                    $status = 'انذار نهائي';
                    }
                    elseif($missRaio < 9 &&  $missRaio >= 7) {
                    $status = 'انذار اولي';
                    }
                    elseif($missRaio < 7 &&  $missRaio >= 5) {
                    $status = 'تنبية';
                    }
                }

                 
               
                $old = Status::where('student_id' , $student->id )->where('subject_name' ,$subject->name_en )->first();
                if ($old != null  ) {////////////////////////////////////////
                    $old->update([/////////////////////////////////////////////////
                        'student_id' => $student->id,
                        'student_name' => $student->name_ar,
                        'student_year' => $level_name->name,
                        'subject_name' => $subject->name_en,
                        'status' => $status,

                    ]);
                }else{

                    Status::create([
                        'student_id' => $student->id,
                        'student_name' => $student->name_ar,
                        'student_year' => $level_name->name,
                        'subject_name' => $subject->name_en,
                        'status' => $status,
                        
                    ]);

                }
                
               
            }
            
        }
        
        


        
        // feach the status and sort it by subject name
        
        $statuses = Status::where('student_year' , $level_name->name )->orderBy('subject_name')->get();

        
        // dd($statuses);

        return view('attendent.searchall' , compact('statuses') );
    }



    // not student name mast be arabic   and course name must be english for search to work
    public function searchone(Request $request)
    {

        

        $student = Student::where('name_ar' , 'LIKE' ,'%'. $request->get('name') . '%' )->first();
        $subjects = Course::where('level_id' , $student->level_id )->get();
        $level_name = Level::where('id' , $student->level_id  )->first();

        

            foreach ($subjects as  $subject) {

                $missingHours = 0;
                $raio = 10;
                $status = ' لا تنبية';


                // check if student have a sick leave

                $sickLeave = Sick::where('student_id' , $student->id)->get();

                if ($sickLeave == null) {
                    $raio = 10;
                }else{
                    $raio = 15; 
                }


                // get the attendent of the st and sum all atteb
       
                $attenents = Attendance::where('student_id' ,$student->id )->where('subject_name' ,$subject->name_en )->get();

                // cal the missing hours by sum all attenents hours for this student in this subject

                foreach ($attenents as $attenent) {
                $missingHours += $attenent->hours;
                }


                // calc total Missing Hourse
                $totalMissingHourse = $subject->total_hours - $missingHours;
                // calc raio
                $attendRaio = ($totalMissingHourse / $subject->total_hours) * 100;
                $missRaio = 100 - $attendRaio;


                // create the message
            
                if ($raio == 10) {

                    if ($missRaio >= 10) {
                        $status = 'تجاوز';
                    }
                    elseif($missRaio < 10 &&  $missRaio >= 9) {
                    $status = 'انذار نهائي';
                    }
                    elseif($missRaio < 9 &&  $missRaio >= 7) {
                    $status = 'انذار اولي';
                    }
                    elseif($missRaio < 7 &&  $missRaio >= 5) {
                    $status = 'تنبية';
                    }
                }
                else{
                    if ($missRaio >= 15) {
                        $status = 'تجاوز';
                    }
                    elseif($missRaio < 15 &&  $missRaio >= 9) {
                    $status = 'انذار نهائي';
                    }
                    elseif($missRaio < 9 &&  $missRaio >= 7) {
                    $status = 'انذار اولي';
                    }
                    elseif($missRaio < 7 &&  $missRaio >= 5) {
                    $status = 'تنبية';
                    }
                }

                // 
                $old = Status::where('student_id' , $student->id )->where('subject_name' ,$subject->name_en )->first();
                if ($old != null) {
                    $old->update([
                        'student_id' => $student->id,
                        'student_name' => $student->name_ar,
                        'student_year' => $level_name->name,
                        'subject_name' => $subject->name_en,
                        'status' => $status,

                    ]);
                }else{

                    Status::create([
                        'student_id' => $student->id,
                        'student_name' => $student->name_ar,
                        'student_year' => $level_name->name,
                        'subject_name' => $subject->name_en,
                        'status' => $status,
                        
                    ]);

                }
                
               
            }
            
        
        
        


        
        // feach the status and sort it by subject name
        
        $statuses = Status::where('student_id' , $student->id )->orderBy('subject_name')->get();

        

        return view('attendent.searchone' , compact('statuses') );
    }


    public function edit(Attendance $att)
    {
        

        return view('attendent.edit', compact('att'));
    
    }

    public function update(Attendance $att)
    {
        
         
        $data = request()->validate([
            'hours' => 'required',
            'date' => 'required',
        
        ]);        


        $att->update(array_merge(
            $data
        ));



        $attenents = Attendance::all();
        $subjects = Course::all();
        $levels = Level::all();
        return view('attendent.get' , compact('subjects' , 'attenents' , 'levels') );
    }



    public function destroyStatus( )
    {

      $all = Status::all();
      foreach($all as $status){
        $status->delete();

      }

      return view('home' );

    }
}
