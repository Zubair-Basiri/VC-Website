<?php

namespace App\Http\Controllers\Dashboard\Other;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('dashboard.other.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('dashboard.other.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ], [
            'image.max' => 'The uploaded image must not be larger than 5MB.',
        ]);

        $imagePath = $request->file('image')->store('images','public');

        Gallery::create([
            'image'=>$imagePath,
        ]);

        return redirect()->route('gallery.index')->with('success','Image added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    public function edit(Gallery $gallery)
    {
        return view('dashboard.other.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image'=>'nullable|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ], [
            'image.max' => 'The uploaded image must not be larger than 5MB.',
        ]);

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images','public');

            if (Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            
            $gallery->image = $imagePath;
        }

        $gallery->update([
            'image'=>$gallery->image,
        ]);

        return redirect()->route('gallery.index')->with('success','Image updated successfully');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success','Image deleted successfully');
    }
}
