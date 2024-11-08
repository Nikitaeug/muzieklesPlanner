<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AssignRoleController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('assign-role.index', compact('users'));
    }

    public function assign(User $user, Request $request)
    {
        $validRoles = ['teacher', 'guardian', 'admin','student'];
        $role = $request->route('role');

        if (!in_array($role, $validRoles)) {
            return redirect()->back()->with('error', 'Invalid role specified.');
        }

        $user->update([
            'role' => $role
        ]);

        return redirect()->back()->with('success', "User has been assigned as a {$role} successfully.");
    }
}
