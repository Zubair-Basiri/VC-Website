<?php

namespace App\Http\Controllers\Dashboard\Resource;

use App\Http\Controllers\Controller;
use App\Models\AcademicPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicPaperController extends Controller
{
    public function index()
    {
        $academicPapers = AcademicPaper::all();
        return view('dashboard.resource.academicPaper.index', compact('academicPapers'));
    }

    public function create()
    {
        return view('dashboard.resource.academicPaper.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'master_bachelor' => 'required',
            'category' => 'required',
            'file' => 'required|mimes:pdf|max:5120',
        ], [
            'file.max' => 'File must not be greater than 5MB',
        ]);

        $filePath = $request->file('file')->store('documents','public');

        AcademicPaper::create([
            'title' => $request->title,
            'master_bachelor' => $request->master_bachelor,
            'category' => $request->category,
            'file' => $filePath,
        ]);

        return redirect()->route('paper.index')->with('Success', 'Paper Added Successfully');
    }

    public function show(AcademicPaper $academicPaper)
    {
        //
    }

    public function edit(AcademicPaper $paper)
    {
        return view('dashboard.resource.academicPaper.edit', compact('paper'));
    }

    public function update(Request $request, AcademicPaper $paper)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'master_bachelor' => 'required',
            'category' => 'required',
            'file' => 'nullable|mimes:pdf|max:5120',
        ], [
            'file.max' => 'File must not be greater than 5MB',
        ]);

        if($request->hasFile('file')) {
            $filePath = $request->file('file')->store('documents','public');

            if (Storage::disk('public')->exists($paper->file)) {
                Storage::disk('public')->delete($paper->file);
            }
            
            $paper->file = $filePath;
        }

        $paper->update([
            'title' => $request->title,
            'master_bachelor' => $request->master_bachelor,
            'category' => $request->category,
            'file' => $paper->file,
        ]);

        return redirect()->route('paper.index')->with('Success','Paper Updated Successfully');
    }

    public function destroy(AcademicPaper $paper)
    {
        $paper->delete();
        return redirect()->route('paper.index')->with('Success','Paper Deleted Successfully');
    }
}
