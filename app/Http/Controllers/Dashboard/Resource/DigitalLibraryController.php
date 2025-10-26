<?php

namespace App\Http\Controllers\Dashboard\Resource;

use App\Http\Controllers\Controller;
use App\Models\DigitalLibrary;
use Illuminate\Http\Request;

class DigitalLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $digitals = DigitalLibrary::paginate(10);
        return view('dashboard.resource.digitalLibrary.index', compact('digitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.resource.digitalLibrary.create');
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

        DigitalLibrary::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('digital.index')->with('success','Digital Library added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(DigitalLibrary $digital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DigitalLibrary $digital)
    {
        return view('dashboard.resource.digitalLibrary.edit', compact('digital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DigitalLibrary $digital)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'info'=>'required',
            'link'=>'required',
        ]);

        $digital->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('digital.index')->with('success','Digital Library updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DigitalLibrary $digital)
    {
        $digital->delete();
        return redirect()->route('digital.index')->with('success','Digital Library deleted successfully');
    }
}

