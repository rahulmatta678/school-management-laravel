<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = \App\Models\Announcement::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);
            
        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\StoreAnnouncementRequest $request)
    {
        \App\Models\Announcement::create([
            'user_id'         => auth()->id(),
            'title'           => $request->title,
            'body'            => $request->body,
            'target_audience' => \App\Enums\AnnouncementAudience::Teachers,
        ]);

        // Email dispatch is skipped for admin->teacher as per PDF requirements
        
        return redirect()->route('admin.announcements.index')
            ->with('success', 'Announcement posted to teachers successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $announcement = \App\Models\Announcement::where('user_id', auth()->id())->findOrFail($id);
        $announcement->delete();

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Announcement deleted successfully.');
    }
}
