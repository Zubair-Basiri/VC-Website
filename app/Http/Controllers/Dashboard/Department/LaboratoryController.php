<?php

namespace App\Http\Controllers\Dashboard\Department;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratories = Laboratory::paginate(10);
        return view('dashboard.department.laboratory.index', compact('laboratories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.department.laboratory.create');
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

        Laboratory::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('laboratory.index')->with('success','Laboratory added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratory $laboratory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratory $laboratory)
    {
        return view('dashboard.department.laboratory.edit', compact('laboratory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laboratory $laboratory)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'info'=>'required',
            'link'=>'required',
        ]);

        $laboratory->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('laboratory.index')->with('success','Laboratory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratory $laboratory)
    {
        $laboratory->delete();
        return redirect()->route('laboratory.index')->with('success','Laboratory deleted successfully');
    }
}
