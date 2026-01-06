<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * List of public announcements.
     * Visible only if published and approved.
     */
    public function index()
    {
        $announcements = Announcement::where('is_published', true)
            ->where('is_approved', true)
            ->latest()
            ->paginate(10);

        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show a single public announcement.
     */
    public function show(Announcement $announcement)
    {
        // If not approved or published → 404
        if (!$announcement->is_published || !$announcement->is_approved) {
            abort(404);
        }

        return view('announcements.show', compact('announcement'));
    }

    /**
     * Announcement creation form (authenticated users only).
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Save a new announcement.
     * The announcement is published but NOT approved.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'body'  => 'required|min:10',
        ]);

        Announcement::create([
            'title'        => $request->title,
            'body'         => $request->body,
            'user_id'      => auth()->id(),
            'is_published' => true,   // user publishes it
            'is_approved'  => false,  // admin must approve it
        ]);

        return redirect()->route('announcements.mine')
            ->with('status', '✅ Announcement created! Pending approval.');
    }

    /**
     * List of user's personal announcements.
     * Shows ALL user announcements.
     */
    public function myAnnouncements()
    {
        $announcements = Announcement::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('announcements.mine', compact('announcements'));
    }

    /**
     * List of announcements for admin.
     * Shows ONLY unapproved ones.
     */
    public function adminIndex()
    {
        $announcements = Announcement::where('is_approved', false)
            ->latest()
            ->get();

        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Approve an announcement (admin).
     */
    public function approve(Announcement $announcement)
    {
        $announcement->update([
            'is_approved' => true,
        ]);

        return back()->with('status', '✅ Announcement approved!');
    }

    /**
     * Delete an announcement (admin).
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return back()->with('status', '🗑️ Announcement deleted.');
    }
}