<?php

namespace App\Http\Controllers\Dashboard\Announcement;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        $workshops = Workshop::all();
        return view('dashboard.announcement.workshop.index', compact('workshops'));
    }

    public function create()
    {
        return view('dashboard.announcement.workshop.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Workshop::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('workshop.index')->with('success', 'Workshop created successfully.');
    }

    public function show(Workshop $workshop)
    {
        //
    }

    public function edit(Workshop $workshop)
    {
        return view('dashboard.announcement.workshop.edit', compact('workshop'));
    }

    public function update(Request $request, Workshop $workshop)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $workshop->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('workshop.index')->with('success', 'Workshop updated successfully.');
    }

    public function destroy(Workshop $workshop)
    {
        $workshop->delete();
        return redirect()->route('workshop.index')->with('success', 'Workshop deleted successfully.');
    }
}
