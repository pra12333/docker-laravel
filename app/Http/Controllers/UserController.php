<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // To view the list of users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // To create a user
    public function create()
    {
        return view('users.create');
    }

    // To store a user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/user')->with('success', 'User added successfully');
    }

    // To edit a user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // To update a user
    public function update(Request $request, $id)
    {
        
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    // To delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
