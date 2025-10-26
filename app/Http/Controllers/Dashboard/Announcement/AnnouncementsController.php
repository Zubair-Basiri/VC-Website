<?php

namespace App\Http\Controllers\Dashboard\Announcement;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        return view('dashboard.announcement.announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('dashboard.announcement.announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image'=>'required|mimes:jpg,jpeg,png|max:5120'
        ],[
            'image.max'=>'Image nust not be larger than 5MB.'
        ]);

        $imagePath = $request->file('image')->store('images','public');

        Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'image'=>$imagePath
        ]);

        return redirect()->route('announcement.index')->with('success', 'Announcement created successfully.');
    }

    public function show(Announcement $announcement)
    {
        //
    }

    public function edit(Announcement $announcement)
    {
        return view('dashboard.announcement.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image'=>'nullable|mimes:jpg,jpeg,png|max:5120'
        ],[
            'image.max'=>'Image nust not be larger than 5MB.'
        ]);

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images','public');

            if (Storage::disk('public')->exists($announcement->image)) {
                Storage::disk('public')->delete($announcement->image);
            }
            
            $announcement->image = $imagePath;
        }

        $announcement->update([
            'title' => $request->title,
            'description' => $request->description,
            'image'=>$announcement->image
        ]);

        return redirect()->route('announcement.index')->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('announcement.index')->with('success', 'Announcement deleted successfully.');
    }
}
