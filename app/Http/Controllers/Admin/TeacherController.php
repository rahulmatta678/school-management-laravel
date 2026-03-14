<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = \App\Models\User::where('role', \App\Enums\UserRole::Teacher->value)->latest()->paginate(10);
        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\StoreTeacherRequest $request)
    {
        \App\Models\User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role'     => \App\Enums\UserRole::Teacher,
        ]);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher account created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Overview of teacher's students/parents can go here if needed
        $teacher = \App\Models\User::teachers()->findOrFail($id);
        return view('admin.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = \App\Models\User::teachers()->findOrFail($id);
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\UpdateTeacherRequest $request, string $id)
    {
        $teacher = \App\Models\User::teachers()->findOrFail($id);
        
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $teacher->update($data);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = \App\Models\User::teachers()->findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher account deleted successfully.');
    }
}
