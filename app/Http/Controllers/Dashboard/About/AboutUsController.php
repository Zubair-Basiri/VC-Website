<?php

namespace App\Http\Controllers\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = About::paginate(10);
        return view('dashboard.about.aboutUs.index', [
            'aboutUs' => $aboutUs,
        ]);
    }

    public function create()
    {
        return view('dashboard.about.aboutUs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        About::create([
            'description' => $request->description,
        ]);

        return redirect()->route('about.index')->with('success', 'About Us description added successfully.');
    }

    public function show(About $about)
    {
        //
    }
    
    public function edit(About $about)
    {
        return view('dashboard.about.aboutUs.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $about->update([
            'description' => $request->description,
        ]);

        return redirect()->route('about.index')->with('success', 'About Us description updated successfully.');
    }

    public function destroy(About $about)
    {
        //
    }
}
