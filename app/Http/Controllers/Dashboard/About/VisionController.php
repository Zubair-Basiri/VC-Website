<?php

namespace App\Http\Controllers\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function index(){

        $visions = Vision::paginate(10);

        return view('dashboard.about.vision.index', [
            'visions' => $visions,
        ]);
    }

    public function create(){
        return view('dashboard.about.vision.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        Vision::create([
            'description' => $request->description,
        ]);

        return redirect()->route('vision.index')->with('success', 'Vision added successfully.');
    }

    public function show(Vision $vision)
    {
        //
    }

    public function edit(Vision $vision){
        return view('dashboard.about.vision.edit', compact('vision'));
    }

    public function update(Request $request, Vision $vision)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $vision->update([
            'description' => $request->description,
        ]);

        return redirect()->route('vision.index')->with('success', 'Vision updated successfully.');
    }
    
    public function destroy(Vision $vision)
    {
        $vision->delete();

        return redirect()->route('vision.index')->with('success', 'Vision deleted successfully.');
    }
}
