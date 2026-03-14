<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the teacher's students.
     */
    public function index(): View
    {
        $students = Student::latest()->paginate(10);
        return view('teacher.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('teacher.students.create');
    }

    /**
     * Store a newly created student.
     */
    public function store(\App\Http\Requests\Teacher\StoreStudentRequest $request)
    {
        // teacher_id is auto-set by CreatedByScope trait logic on creation
        \App\Models\Student::create($request->validated());

        return redirect()->route('teacher.students.index')
            ->with('success', 'Student added successfully.');
    }

    /**
     * Show the form for editing the student.
     */
    public function edit(Student $student)
    {
        return view('teacher.students.edit', compact('student'));
    }

    /**
     * Update the student.
     */
    public function update(\App\Http\Requests\Teacher\UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('teacher.students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the student.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('teacher.students.index')
            ->with('success', 'Student removed successfully.');
    }
}
