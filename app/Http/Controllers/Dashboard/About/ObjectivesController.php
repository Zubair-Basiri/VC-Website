<?php

namespace App\Http\Controllers\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectivesController extends Controller
{
    public function index(){

        $objectives = Objective::paginate(10);

        return view('dashboard.about.objectives.index', [
            'objectives' => $objectives,
        ]);
    }

    public function create(){
        return view('dashboard.about.objectives.create');
    }

    public function store(Request $request){

        $request->validate([
            'description' => 'required',
        ]);

        Objective::create([
            'description' => $request->description,
        ]);

        return redirect()->route('objectives.index')->with('success', 'Objective added successfully.');
    }

    public function show(Objective $objective){
        //
    }

    public function edit(Objective $objective){
        return view('dashboard.about.objectives.edit', compact('objective'));
    }

    public function update(Request $request, Objective $objective){

        $request->validate([
            'description' => 'required',
        ]);

        $objective->update([
            'description' => $request->description,
        ]);

        return redirect()->route('objectives.index')->with('success', 'Objective updated successfully.');
    }

    public function destroy(Objective $objective){
        $objective->delete();
        return redirect()->route('objectives.index')->with('success', 'Objective deleted successfully.');
    }
}
