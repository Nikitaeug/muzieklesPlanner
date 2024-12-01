<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentGuardianController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $students = Student::with('guardian')->get();
        } elseif(Auth::user()->role == 'guardian') {
            $students = Student::with('guardian')->where('guardian_id', Auth::user()->id)->get();
        }else{
            $students = Student::with('guardian')->where('id', Auth::user()->student_id)->get();
        }

        $guardians = Guardian::all();

        return view('studentguardian.index', compact('students', 'guardians'));
    }

    public function update(Student $student)
    {
        $validated = request()->validate([
            'guardian_id' => 'required|exists:guardians,id'
        ]);

        $student->update([
            'guardian_id' => $validated['guardian_id']
        ]);

        return redirect()->route('studentGuardian.index')
            ->with('success', 'Guardian assigned successfully');
    }
}
