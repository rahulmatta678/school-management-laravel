<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {
        $students = \App\Models\Student::with('teacher')->latest()->paginate(10, ['*'], 'students_page');
        $parents  = \App\Models\ParentModel::with('student.teacher')->latest()->paginate(10, ['*'], 'parents_page');
        
        // Show teacher announcements to the admin
        $teacherAnnouncements = \App\Models\Announcement::where('user_id', '!=', auth()->id())
            ->with('user')
            ->latest()
            ->paginate(10, ['*'], 'announcements_page');

        return view('admin.overview.index', compact('students', 'parents', 'teacherAnnouncements'));
    }
}
