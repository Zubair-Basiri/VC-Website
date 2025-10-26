<?php

namespace App\Http\Controllers\Dashboard\Department;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Illuminate\Http\Request;
use Termwind\Components\Li;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libraries = Library::paginate(10);
        return view('dashboard.department.library.index', compact('libraries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.department.library.create');
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

        Library::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('library.index')->with('success','Library added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Library $library)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Library $library)
    {
        return view('dashboard.department.library.edit', compact('library'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Library $library)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'info'=>'required',
            'link'=>'required',
        ]);

        $library->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('library.index')->with('success','Library updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Library $library)
    {
        $library->delete();
        return redirect()->route('library.index')->with('success','Library deleted successfully');
    }
}
