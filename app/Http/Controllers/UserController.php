<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()

    {
        $users = User::all();

        return view('users.index',compact('users'));

    }

  
    public function create()

    {
        return view('users.create');
    }

   
    public function store(Request $request)

    {
        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => bcrypt($request->password),

            'role' => $request->role

        ]);

        $user->save();

        return redirect()->back()->with('success', 'Congratulation! User has been created');
    }

   
    public function show($id)
    {
        //
    }


    public function edit(User $user)

    {
        return view('users.edit', compact('user'));
    }

   
    public function update(Request $request, $id)
    {
        $User = User::find($id);

        $User->name = $request->input('name');

        $User->email = $request->input('email');

        $User->role = $request->input('role');

        $User->update();

        return redirect()->back()->with('success', 'User was successfully updated');
    }

  
    public function destroy(User $user)

    {
        $id = $user->id ; 

        $User = User::where('id',$id);

        $User->delete();

        return redirect()->route('user.index')->with('success', 'User was deleted successfully');
    }

    public function delete(User $user)
    
    {   
        return view('users.delete', compact('user'));     
    }
}
