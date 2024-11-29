<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Guardian;

class AdminController extends Controller
{
    public function showRegistrationForm()
    {
        $students = Student::all();
        $guardians = Guardian::all();
        return view('auth.adminRegister', compact('students', 'guardians'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'specialization' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'availability' => 'nullable|string|max:255',
            'guardian_id' => 'nullable|integer',
        ]);

        // Create the user and assign the role
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]); 

        
        $user->role = $request->role;
        $user->save();

        // Handle role-specific attributes
        if ($request->role === 'teacher') {
            Teacher::create([
                'user_id' => $user->id,
                'specialization' => $request->specialization,
                'phone_number' => $request->phone_number,
                'availability' => $request->availability,
            ]);
        } elseif ($request->role === 'student') {
            Student::create([
                'user_id' => $user->id,
                'guardian_id' => $request->guardian_id,
            ]);
        } elseif ($request->role === 'guardian') {
            Guardian::create([
                'user_id' => $user->id,
                'phone_number' => $request->guardian_phone_number,
            ]);
        }

        return redirect()->route('admin.register')->with('success', 'User registered successfully.');
    }
} 