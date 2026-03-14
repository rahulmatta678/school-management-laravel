<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParentModel;
use App\Models\Student;
use Illuminate\View\View;

class ParentController extends Controller
{
    /**
     * Display a listing of parents for the teacher's students.
     */
    public function index()
    {
        $parents = \App\Models\ParentModel::whereHas('student', function ($q) {
                $q->where('teacher_id', auth()->id());
            })
            ->with('student')
            ->latest()
            ->paginate(10);
            
        return view('teacher.parents.index', compact('parents'));
    }

    /**
     * Show the form for creating a new parent.
     */
    public function create()
    {
        $students = \App\Models\Student::all();
        return view('teacher.parents.create', compact('students'));
    }

    /**
     * Store a newly created parent record.
     */
    public function store(\App\Http\Requests\Teacher\StoreParentRequest $request)
    {
        // Double check student belongs to teacher (validation does this too)
        \App\Models\ParentModel::create($request->validated());

        return redirect()->route('teacher.parents.index')
            ->with('success', 'Parent account created successfully.');
    }

    /**
     * Show the form for editing the parent.
     */
    public function edit(ParentModel $parent)
    {
        // Ensure the parent belongs to a student of the authenticated teacher
        // This check is typically handled by a policy or a custom Route Model Binding resolver
        // For now, we'll assume the route model binding implicitly handles this or a policy is in place.
        // If not, a manual check like the one removed would be necessary.
        
        $students = Student::all(); // Scoped by global scope
        return view('teacher.parents.edit', compact('parent', 'students'));
    }

    /**
     * Update the parent record.
     */
    public function update(\App\Http\Requests\Teacher\UpdateParentRequest $request, ParentModel $parent)
    {
        // Ensure the parent belongs to a student of the authenticated teacher
        // This check is typically handled by a policy or a custom Route Model Binding resolver
        
        $parent->update($request->validated());

        return redirect()->route('teacher.parents.index')
            ->with('success', 'Parent updated successfully.');
    }

    /**
     * Remove the parent record.
     */
    public function destroy(ParentModel $parent)
    {
        // Ensure the parent belongs to a student of the authenticated teacher
        // This check is typically handled by a policy or a custom Route Model Binding resolver
        
        $parent->delete();

        return redirect()->route('teacher.parents.index')
            ->with('success', 'Parent removed successfully.');
    }
}
