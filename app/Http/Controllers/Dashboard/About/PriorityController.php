<?php

namespace App\Http\Controllers\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index(){

        $priorities = Priority::all();
        return view('dashboard.about.priorities.index',[
            'priorities'=>$priorities
        ]);
        
    }

    public function create(){
        return view('dashboard.about.priorities.create');
    }

    public function store(Request $request){
        $request->validate([
            'description'=>'required'
        ]);

        Priority::create([
            'description'=>$request->description
        ]);

        return redirect()->route('priorities.index')->with('success','Priority added successfully.');

    }

    public function show(Priority $priority){
        //
    }

    public function edit(Priority $priority){
        return view('dashboard.about.priorities.edit', compact('priority'));
    }

    public function update(Request $request, Priority $priority){
        $request->validate([
            'description'=>'required'
        ]);

        $priority->update([
            'description'=>$request->description
        ]);

        return redirect()->route('priorities.index')->with('success','Priority updated successfully.');
    }

    public function destroy(Priority $priority){
        $priority->delete();
        return redirect()->route('priorities.index')->with('success','Priority deleted successfully.');
    }
}
