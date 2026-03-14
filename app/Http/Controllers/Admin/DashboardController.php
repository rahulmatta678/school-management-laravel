<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stats = [
            'teachers'      => \App\Models\User::teachers()->count(),
            'students'      => \App\Models\Student::count(),
            'parents'       => \App\Models\ParentModel::count(),
            'announcements' => \App\Models\Announcement::where('user_id', auth()->id())->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
