<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {
       
        $users = User::all();
        return view('user.index' , compact('users'));
    }

    

    public function create()
    {

        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
       

        return view('user.create');

    }

    public function store(Request $request)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

     


        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'type' => $request->get('type'),
        ]);

        $users = User::all();
        return view('user.index' , compact('users'));
    }


    public function edit(User $user)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
        
        return view('user.edit', compact('user'));
    
    }

    public function update(User $user)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }
         
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
        ]);        


        $user->update(array_merge(
            $data
        ));


        $users = User::all();
        return view('user.index' , compact('users'));
    }


    public function destroy(User $user)
    {
        if(auth()->user()->type != 'admin')
        {
            return redirect()->back();

        }

        $user->delete();
        $users = User::all();
        return view('user.index' , compact('users'));
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credintial = $request->only('email', 'password');

        

        if(Auth::attempt($credintial)){
            $user = User::where('email', $request->get('email'))->first();


            return [ 'token' => $user->api_token , 'id' => $user->id ];
        }
        return 'not found';
    }
    
}
