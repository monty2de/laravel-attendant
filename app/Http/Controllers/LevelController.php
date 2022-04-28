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

        return view('level.create');

    }

    public function store(Request $request)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

     


        Level::create([
            'name' => $request->get('name'),
         
        ]);

        $levels = Level::all();
        return view('level.index' , compact('levels'));
    }


    public function edit(Level $level)
    {
      
        
        return view('level.edit', compact('level'));
    
    }

    public function update(Level $level)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
       
        $data = request()->validate([
            'name' => 'required',
           
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
