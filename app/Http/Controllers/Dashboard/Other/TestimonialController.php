<?php

namespace App\Http\Controllers\Dashboard\Other;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Test;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('dashboard.other.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('dashboard.other.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'message' => 'required'
        ]);

        Testimonial::create([
            'name'=>$request->name,
            'position'=>$request->position,
            'message'=>$request->message
        ]);

        return redirect()->route('testimonial.index')->with('success','Testimonial added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.other.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'message' => 'required'
        ]);

        $testimonial->update([
            'name'=>$request->name,
            'position'=>$request->position,
            'message'=>$request->message
        ]);

        return redirect()->route('testimonial.index')->with('success','Testimonial updated successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with('success','Testimonial deleted successfully');
    }
}
