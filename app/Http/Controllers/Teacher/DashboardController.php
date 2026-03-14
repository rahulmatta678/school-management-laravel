<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Announcement;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the teacher dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $stats = [
            'my_students' => Student::count(),
            'my_announcements' => Announcement::count(),
        ];
        
        $adminAnnouncements = Announcement::withoutGlobalScope('creator')
            ->whereHas('user', fn($q) => $q->where('role', \App\Enums\UserRole::Admin->value))
            ->where('target_audience', \App\Enums\AnnouncementAudience::Teachers)
            ->latest()
            ->take(5)
            ->get();

        return view('teacher.dashboard', compact('stats', 'adminAnnouncements'));
    }
}
