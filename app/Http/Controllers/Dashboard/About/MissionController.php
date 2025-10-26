<?php

namespace App\Http\Controllers\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::paginate(10);
        return view('dashboard.about.mission.index', [
            'missions' => $missions,
        ]);
    }

    public function create()
    {
        return view('dashboard.about.mission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        Mission::create([
            'description' => $request->description,
        ]);

        return redirect()->route('mission.index')->with('success', 'Mission added successfully.');
    }

    public function show(Mission $mission)
    {
        //
    }
    
    public function edit(Mission $mission)
    {
        return view('dashboard.about.mission.edit', compact('mission'));
    }

    public function update(Request $request, Mission $mission)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $mission->update([
            'description' => $request->description,
        ]);

        return redirect()->route('mission.index')->with('success', 'Mission updated successfully.');
    }

    public function destroy(Mission $mission)
    {
        //
    }
    
}
