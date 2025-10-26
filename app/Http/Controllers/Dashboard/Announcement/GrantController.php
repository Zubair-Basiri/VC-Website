<?php

namespace App\Http\Controllers\Dashboard\Announcement;

use App\Http\Controllers\Controller;
use App\Models\Grant;

use Illuminate\Http\Request;

class GrantController extends Controller
{
    public function index()
    {
        $grants = Grant::all();
        return view('dashboard.announcement.grant.index', compact('grants'));
    }

    public function create()
    {
        return view('dashboard.announcement.grant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Grant::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('grant.index')->with('success', 'Grant created successfully.');
    }

    public function show(Grant $grant)
    {
        //
    }

    public function edit(Grant $grant)
    {
        return view('dashboard.announcement.grant.edit', compact('grant'));
    }

    public function update(Request $request, Grant $grant)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $grant->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('grant.index')->with('success', 'Grant updated successfully.');
    }

    public function destroy(Grant $grant)
    {
        $grant->delete();
        return redirect()->route('grant.index')->with('success', 'Grant deleted successfully.');
    }
}
