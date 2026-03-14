<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of teacher's own announcements.
     */
    public function index()
    {
        $announcements = \App\Models\Announcement::where('user_id', auth()->id())->latest()->paginate(10);
        return view('teacher.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new announcement.
     */
    public function create()
    {
        return view('teacher.announcements.create');
    }

    /**
     * Store a newly created announcement and dispatch email job.
     */
    public function store(\App\Http\Requests\Teacher\StoreAnnouncementRequest $request)
    {
        $announcement = \App\Models\Announcement::create([
            'user_id'         => auth()->id(),
            'title'           => $request->title,
            'body'            => $request->body,
            'target_audience' => \App\Enums\AnnouncementAudience::from($request->target_audience),
        ]);

        // Dispatch the queued job for email notifications
        \App\Jobs\SendAnnouncementEmailJob::dispatch($announcement);

        return redirect()->route('teacher.announcements.index')
            ->with('success', 'Announcement posted and emails are being sent in the background.');
    }

    /**
     * Remove the announcement.
     */
    public function destroy(string $id)
    {
        $announcement = \App\Models\Announcement::where('user_id', auth()->id())->findOrFail($id);
        $announcement->delete();

        return redirect()->route('teacher.announcements.index')
            ->with('success', 'Announcement deleted successfully.');
    }
}
