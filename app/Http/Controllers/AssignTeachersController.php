<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AssignTeachersController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'teacher')->get();
        return view('assign-teachers.index', compact('users'));
    }

    public function assign(User $user)
    {
        $user->update([
            'role' => 'teacher'
        ]);

        return redirect()->back()->with('success', 'User has been assigned as a teacher successfully.');
    }
}
