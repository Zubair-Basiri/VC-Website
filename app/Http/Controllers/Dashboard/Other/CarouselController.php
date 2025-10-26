<?php

namespace App\Http\Controllers\Dashboard\Other;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        return view('dashboard.other.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('dashboard.other.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ], [
            'image.max' => 'The uploaded image must not be larger than 5MB.',
        ]);

        $imagePath = $request->file('image')->store('images','public');

        Carousel::create([
            'image'=>$imagePath,
        ]);

        return redirect()->route('carousel.index')->with('success','Image added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carousel $carousel)
    {
        //
    }

    public function edit(Carousel $carousel)
    {
        return view('dashboard.other.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'image'=>'nullable|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ], [
            'image.max' => 'The uploaded image must not be larger than 5MB.',
        ]);

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images','public');

            if (Storage::disk('public')->exists($carousel->image)) {
                Storage::disk('public')->delete($carousel->image);
            }
            
            $carousel->image = $imagePath;
        }

        $carousel->update([
            'image'=>$carousel->image,
        ]);

        return redirect()->route('carousel.index')->with('success','Image updated successfully');
    }

    public function destroy(Carousel $carousel)
    {
        $carousel->delete();
        return redirect()->route('carousel.index')->with('success','Image deleted successfully');
    }
}
