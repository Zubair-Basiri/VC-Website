<?php

namespace App\Http\Controllers\Dashboard\Other;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->first();
        return view('dashboard.other.video.index', compact('videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,mov,ogg,webm|max:50000',
        ]);

        $path = $request->file('video')->store('videos', 'public');

        Video::create([
            'video' => $path,
        ]);

        return redirect()->back()->with('success', 'Video uploaded successfully!');
    }
}
