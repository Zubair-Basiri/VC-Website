<?php

namespace App\Http\Controllers\Dashboard\Resource;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::all();
        return view('dashboard.resource.statistic.index', compact('statistics'));
    }

    public function create()
    {
        return view('dashboard.resource.statistic.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'imageFile'=>'required|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ], [
            'imageFile.max' => 'The uploaded image must not be larger than 5MB.',
        ]);

        $imagePath = $request->file('imageFile')->store('images','public');

        Statistic::create([
            'title'=>$request->title,
            'imageFile'=>$imagePath,
        ]);

        return redirect()->route('statistic.index')->with('success','Statistic added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistic $statistic)
    {
        //
    }

    public function edit(Statistic $statistic)
    {
        return view('dashboard.resource.statistic.edit', compact('statistic'));
    }

    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'title'=>'required',
            'imageFile'=>'nullable|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ], [
            'imageFile.max' => 'The uploaded image must not be larger than 5MB.',
        ]);

        if($request->hasFile('imageFile')) {
            $imagePath = $request->file('imageFile')->store('images','public');

            if (Storage::disk('public')->exists($statistic->imageFile)) {
                Storage::disk('public')->delete($statistic->imageFile);
            }
            
            $statistic->imageFile = $imagePath;
        }

        $statistic->update([
            'title'=>$request->title,
            'imageFile'=>$statistic->imageFile,
        ]);

        return redirect()->route('statistic.index')->with('success','Statistic updated successfully');
    }

    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        return redirect()->route('statistic.index')->with('success','Statistic deleted successfully');
    }
}
