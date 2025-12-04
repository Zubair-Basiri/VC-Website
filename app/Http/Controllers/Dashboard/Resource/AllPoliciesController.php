<?php

namespace App\Http\Controllers\Dashboard\Resource;

use App\Http\Controllers\Controller;
use App\Models\GenPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AllPoliciesController extends Controller
{
    public function index()
    {
        $genPolicies = GenPolicy::all();
        return view('dashboard.resource.allPolicy.index', compact('genPolicies'));
    }

    public function create()
    {
        return view('dashboard.resource.allPolicy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required',
        'pdfFile.*' => 'nullable|mimes:pdf|max:20480',
        ], [
            'pdfFile.*.max' => 'Each uploaded file must not be larger than 20MB.',
            'pdfFile.*.mimes' => 'Each uploaded file must be a PDF.',
        ]);

        $filePaths = [];

        if ($request->hasFile('pdf_files')) {
            foreach ($request->file('pdf_files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('documents', $filename, 'public');
                $filePaths[] = $filename;
            }
        }

        GenPolicy::create([
            'title' => $request->title,
            'pdf_files' => $filePaths,   // store JSON array
        ]);

        return redirect()->route('genPolicy.index')->with('success', 'Policy added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(GenPolicy $genPolicy)
    {
        //
    }

    public function edit(GenPolicy $genPolicy)
    {
        return view('dashboard.resource.allPolicy.edit', compact('genPolicy'));
    }

    public function update(Request $request, GenPolicy $genPolicy)
    {
        $request->validate([
        'title' => 'required',
        'pdfFile.*' => 'nullable|mimes:pdf|max:20480',
        ]);

        $existingFiles = $genPolicy->pdf_files ?? [];

        if ($request->has('delete_files')) {

            foreach ($request->delete_files as $deleteFile) {

                if (Storage::disk('public')->exists('documents/' . $deleteFile)) {
                    Storage::disk('public')->delete('documents/' . $deleteFile);
                }

                $existingFiles = array_filter($existingFiles, function ($file) use ($deleteFile) {
                    return $file !== $deleteFile;
                });
            }
        }

        if ($request->hasFile('pdf_files')) {

            foreach ($request->file('pdf_files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('documents', $filename, 'public');

                $existingFiles[] = $filename;
            }
        }

        $genPolicy->update([
            'title' => $request->title,
            'pdf_files' => array_values($existingFiles),
        ]);

        return redirect()->route('genPolicy.index')->with('success', 'Policy updated successfully');
    }

    public function destroy(GenPolicy $genPolicy)
    {
        if (!empty($genPolicy->pdf_files))
        {
            foreach ($genPolicy->pdf_files as $file)
            {
                $path = 'documents/' . $file;

                if (Storage::disk('public')->exists($path)){
                    Storage::disk('public')->delete($path);
                }
            }
        }

        $genPolicy->delete();
        return redirect()->route('genPolicy.index')->with('success', 'Policy deleted successfully');
    }
}
