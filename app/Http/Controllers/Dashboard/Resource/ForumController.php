<?php

namespace App\Http\Controllers\Dashboard\Resource;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ForumController extends Controller
{

    public function index()
    {
        $forums = Forum::all();
        return view('dashboard.resource.forum.index', compact('forums'));
    }

    public function create()
    {
        return view('dashboard.resource.forum.create');
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

        Forum::create([
            'title'=>$request->title,
            'pdfFile'=>$filePath,
        ]);

        return redirect()->route('forum.index')->with('success','Forum added successfully');
    }

    public function show(Forum $forum)
    {
        //
    }

    public function edit(Forum $forum)
    {
        return view('dashboard.resource.forum.edit', compact('forum'));
    }

    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'title'=>'required',
            'pdfFile'=>'nullable|mimes:pdf|max:5120',
        ], [
            'pdfFile.max' => 'The uploaded file must not be larger than 5MB.',
            'pdfFile.mimes' => 'The uploaded file must be a PDF.',
        ]);

        $find = Forum::find($forum->id);

        if($request->hasFile('pdfFile')) {
            $filePath = $request->file('pdfFile')->store('documents','public');

            if (Storage::disk('public')->exists($forum->pdfFile)) {
                Storage::disk('public')->delete($forum->pdfFile);
            }

            $forum->pdfFile = $filePath;
        }

        $forum->update([
            'title'=>$request->title,
            'pdfFile'=>$forum->pdfFile,
        ]);

        return redirect()->route('forum.index')->with('success','Forum updated successfully');
    }

    public function destroy(Forum $forum)
    {
        $forum->delete();
        return redirect()->route('forum.index')->with('success','Forum deleted successfully');
    }
}
