<?php

namespace App\Http\Controllers\Dashboard\Announcement;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Seminar::all();
        return view('dashboard.announcement.seminar.index', compact('seminars'));
    }

    public function create()
    {
        return view('dashboard.announcement.seminar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Seminar::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('seminar.index')->with('success', 'Seminar created successfully.');
    }

    public function show(Seminar $seminar)
    {
        //
    }

    public function edit(Seminar $seminar)
    {
        return view('dashboard.announcement.seminar.edit', compact('seminar'));
    }

    public function update(Request $request, Seminar $seminar)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $seminar->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('seminar.index')->with('success', 'Seminar updated successfully.');
    }

    public function destroy(Seminar $seminar)
    {
        $seminar->delete();
        return redirect()->route('seminar.index')->with('success', 'Seminar deleted successfully.');
    }
}
