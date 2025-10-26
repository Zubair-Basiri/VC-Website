<?php

namespace App\Http\Controllers\Dashboard\Resource;

use App\Http\Controllers\Controller;
use App\Models\FreeDatabase;
use Illuminate\Http\Request;

class FreeDatabasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $databases = FreeDatabase::paginate(10);
        return view('dashboard.resource.freeDatabase.index', compact('databases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.resource.freeDatabase.create');
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

        FreeDatabase::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('database.index')->with('success','Free Database link added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(FreeDatabase $database)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FreeDatabase $database)
    {
        return view('dashboard.resource.freeDatabase.edit', compact('database'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FreeDatabase $database)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'info'=>'required',
            'link'=>'required',
        ]);

        $database->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'info'=>$request->info,
            'link'=>$request->link,
        ]);

        return redirect()->route('database.index')->with('success','Free Database link updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FreeDatabase $database)
    {
        $database->delete();
        return redirect()->route('database.index')->with('success','Free Database link deleted successfully');
    }
}