<?php

namespace App\Http\Controllers\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index(){

        $policies = Policy::paginate(10);
        return view('dashboard.about.Policy.index', [
            'policies' => $policies,
        ]);
    }

    public function create(){
        return view('dashboard.about.Policy.create');
    }

    public function store(Request $request){

        $request->validate([
            'description' => 'required',
        ]);

        Policy::create([
            'description' => $request->description,
        ]);

        return redirect()->route('policy.index')->with('success', 'Policy added successfully.');
    }

    public function show(Policy $policy){
        //
    }

    public function edit(Policy $policy){
        return view('dashboard.about.Policy.edit', compact('policy'));
    }

    public function update(Request $request, Policy $policy){

        $request->validate([
            'description' => 'required',
        ]);

        $policy->update([
            'description' => $request->description,
        ]);

        return redirect()->route('policy.index')->with('success', 'Policy updated successfully.');
    }

    public function destroy(Policy $policy){
        $policy->delete();
        return redirect()->route('policy.index')->with('success', 'Policy deleted successfully.');
    }
}
