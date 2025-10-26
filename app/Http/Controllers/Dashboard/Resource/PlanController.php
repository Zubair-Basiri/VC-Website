<?php

namespace App\Http\Controllers\Dashboard\Resource;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlanController extends Controller
{

    public function index()
    {
        $plans = Plan::all();
        return view('dashboard.resource.plan.index', compact('plans'));
    }

    public function create()
    {
        return view('dashboard.resource.plan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'pdfFile'=>'required|mimes:pdf|max:5120',
        ], [
            'pdfFile.max' => 'The uploaded file must not be larger than 5MB.',
            'pdfFile.mimes' => 'The uploaded file must be a PDF.',
        ]);

        $filePath = $request->file('pdfFile')->store('documents','public');

        Plan::create([
            'title'=>$request->title,
            'pdfFile'=>$filePath,
        ]);

        return redirect()->route('plan.index')->with('success','Plan added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    public function edit(Plan $plan)
    {
        return view('dashboard.resource.plan.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'title'=>'required',
            'pdfFile'=>'nullable|mimes:pdf|max:5120',
        ], [
            'pdfFile.max' => 'The uploaded file must not be larger than 5MB.',
            'pdfFile.mimes' => 'The uploaded file must be a PDF.',
        ]);

        if($request->hasFile('pdfFile')) {
            $filePath = $request->file('pdfFile')->store('documents','public');

            if (Storage::disk('public')->exists($plan->pdfFile)) {
                Storage::disk('public')->delete($plan->pdfFile);
            }
            
            $plan->pdfFile = $filePath;
        }

        $plan->update([
            'title'=>$request->title,
            'pdfFile'=>$plan->pdfFile,
        ]);

        return redirect()->route('plan.index')->with('success','Plan updated successfully');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('plan.index')->with('success','Plan deleted successfully');
    }
}
