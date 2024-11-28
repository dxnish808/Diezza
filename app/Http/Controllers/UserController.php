<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index(): View
    {
        $users = User::all();
        return view('profile.users', ['users' => $users]);
    }

    /**
     * Admin delete user
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users');
    }

    // Admin edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile.admin.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
    $user = User::findOrFail($id);

    // Validate and update user information
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->update($request->all());

    return redirect()->route('users')->with('status', 'User updated successfully');
        }
}
