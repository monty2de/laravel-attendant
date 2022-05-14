<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    
    
    public function index()
    {
       
        $levels = Level::all();
        return view('level.index' , compact('levels'));
    }

    

    public function create()
    {
        $levels = [
            'bachaelor' => 'bachaelor',
            'master' => 'master',
            'pHD' => 'pHD',
        ];
        $years = [
            'first' => 'first',
            'second' => 'second',
            'third' => 'third',
            'fourth' => 'fourth',
            'fifth' => 'fifth',
            'sixth' => 'sixth',
            'seventh' => 'seventh',
            'eigth' => 'eigth',
            'ninth' => 'ninth',
            'tenth' => 'tenth',
            
        ];

        return view('level.create' , compact('levels' , 'years'));

    }

    public function store(Request $request)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

     


        Level::create([
            'level' => $request->get('level'),
            'year' => $request->get('year'),
         
        ]);

        $levels = Level::all();
        return view('level.index' , compact('levels'));
    }


    public function edit(Level $level)
    {

        $levels = [
            'bachaelor' => 'bachaelor',
            'master' => 'master',
            'pHD' => 'pHD',
        ];
        $years = [
            'first' => 'first',
            'second' => 'second',
            'third' => 'third',
            'fourth' => 'fourth',
            'fifth' => 'fifth',
            'sixth' => 'sixth',
            'seventh' => 'seventh',
            'eigth' => 'eigth',
            'ninth' => 'ninth',
            'tenth' => 'tenth',
            
        ];
      
        
        return view('level.edit', compact('level' , 'levels' , 'years'));
    
    }

    public function update(Level $level)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
       
        $data = request()->validate([
            'level' => 'required',
            'year' => 'required',
           
        ]);        


        $level->update(array_merge(
            $data
        ));


        $levels = Level::all();
        return view('level.index' , compact('levels'));
    }


    public function destroy(Level $level)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $level->delete();
        $levels = Level::all();
        return view('level.index' , compact('levels'));
    }


}
