<?php

namespace App\Http\Controllers\Dashboard\Announcement;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();
        return view('dashboard.announcement.conference.index', compact('conferences'));
    }

    public function create()
    {
        return view('dashboard.announcement.conference.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Conference::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('conference.index')->with('success', 'Conference created successfully.');
    }

    public function show(Conference $conference)
    {
        //
    }

    public function edit(Conference $conference)
    {
        return view('dashboard.announcement.conference.edit', compact('conference'));
    }

    public function update(Request $request, Conference $conference)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $conference->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('conference.index')->with('success', 'Conference updated successfully.');
    }

    public function destroy(Conference $conference)
    {
        $conference->delete();
        return redirect()->route('conference.index')->with('success', 'Conference deleted successfully.');
    }
}
