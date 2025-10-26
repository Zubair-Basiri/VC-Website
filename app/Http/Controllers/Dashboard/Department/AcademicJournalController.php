<?php

namespace App\Http\Controllers\Dashboard\Department;

use App\Http\Controllers\Controller;
use App\Models\AcademicJournal;
use Illuminate\Http\Request;

class AcademicJournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academics = AcademicJournal::paginate(10);
        return view('dashboard.department.academic.index', compact('academics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.department.academic.create');
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

        AcademicJournal::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('academic.index')->with('success','Journal added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicJournal $academic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicJournal $academic)
    {
        return view('dashboard.department.academic.edit', compact('academic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicJournal $academic)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'info'=>'required',
            'link'=>'required',
        ]);

        $academic->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('academic.index')->with('success','Journal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicJournal $academic)
    {
        $academic->delete();
        return redirect()->route('academic.index')->with('success','Journal deleted successfully');
    }
}
