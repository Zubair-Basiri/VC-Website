<?php

namespace App\Http\Controllers\Dashboard\Department;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $researches = Research::paginate(10);
        return view('dashboard.department.research.index', compact('researches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.department.research.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'info'=>'required',
            'link'=>'required',
        ]);

        Research::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('research.index')->with('success','Research added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Research $research)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Research $research)
    {
        return view('dashboard.department.research.edit', compact('research'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Research $research)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'info'=>'required',
            'link'=>'required',
        ]);

        $research->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('research.index')->with('success','Research updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Research $research)
    {
        $research->delete();
        return redirect()->route('research.index')->with('success','Research deleted successfully');
    }
}
