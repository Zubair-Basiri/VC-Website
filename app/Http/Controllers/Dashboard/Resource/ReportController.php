<?php

namespace App\Http\Controllers\Dashboard\Resource;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('dashboard.resource.report.index', compact('reports'));
    }

    public function create()
    {
        return view('dashboard.resource.report.create');
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

        Report::create([
            'title'=>$request->title,
            'pdfFile'=>$filePath,
        ]);

        return redirect()->route('report.index')->with('success','Report added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    public function edit(Report $report)
    {
        return view('dashboard.resource.report.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
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

            if (Storage::disk('public')->exists($report->pdfFile)) {
                Storage::disk('public')->delete($report->pdfFile);
            }
            
            $report->pdfFile = $filePath;
        }

        $report->update([
            'title'=>$request->title,
            'pdfFile'=>$report->pdfFile,
        ]);

        return redirect()->route('report.index')->with('success','Report updated successfully');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('report.index')->with('success','Report deleted successfully');
    }
}
