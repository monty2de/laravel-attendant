<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index' , compact('users'));
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function create()
    {

        return view('user.create');

    }

    public function store(Request $request)
    {

        $request->validate([
            //'body'=>'required',
        ]);


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
        
        return view('user.edit', compact('user'));
    
    }

    public function update(User $user)
    {
         
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
        ]);        


        $user->update(array_merge(
            $data
        ));

        // return redirect("/users/{$user->id}");

        $users = User::all();
        return view('user.index' , compact('users'));
    }


    public function destroy(User $user)
    {

        $user->delete();
        $users = User::all();
        return view('user.index' , compact('users'));
    }
    
}
