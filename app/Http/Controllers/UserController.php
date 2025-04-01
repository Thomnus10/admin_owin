<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ✅ Show all users
    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    // ✅ Show user creation form
    public function create()
    {
        return view('admin.users.users_create');
    }

    // ✅ Store new user (Already exists in your code)
    public function store(Request $request)
    {
        
        $request->validate([
            'username' => 'required|string|max:15', // Ensure username is validated
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'username' => $request->username, // Make sure this exists
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.user')->with('success', 'User added successfully!');
    }


    // ✅ Show user edit form
    public function edit(User $user)
    {
        return view('admin.users.users_edit', compact('user'));
    }

    // ✅ Update user details
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('admin.user')->with('success', 'User updated successfully!');
    }

    // ✅ Delete a user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User deleted successfully!');
    }
}
