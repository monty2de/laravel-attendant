<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {
       
        $users = Instructor::all();
        return view('user.index' , compact('users'));
    }

    

    public function create()
    {

        return view('user.create');

    }

    public function store(Request $request)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

     


        Instructor::create([
            'name_en' => $request->get('name_en'),
            'name_ar' => $request->get('name_ar'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);

        $users = Instructor::all();
        return view('user.index' , compact('users'));
    }


    public function edit(Instructor $user)
    {
      
        
        return view('user.edit', compact('user'));
    
    }

    public function update(Instructor $user)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
         
        $data = request()->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required',
        ]);        


        $user->update(array_merge(
            $data
        ));


        $users = Instructor::all();
        return view('user.index' , compact('users'));
    }


    public function destroy(Instructor $user)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $user->delete();
        $users = Instructor::all();
        return view('user.index' , compact('users'));
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        

            
        $user = Instructor::where('email', $request->get('email'))->where('password', $request->get('password'))->first();


        return [ 'id' => $user->id ];
        
       
    }
    
}
