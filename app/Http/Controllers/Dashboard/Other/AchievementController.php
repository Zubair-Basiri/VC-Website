<?php

namespace App\Http\Controllers\Dashboard\Other;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::all();
        return view('dashboard.other.achievement.index', compact('achievements'));
    }

    public function create()
    {
        return view('dashboard.other.achievement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png|max:5120'
        ],[
            'image.max' => 'The uploaded image must not be larger than 5MB.'
        ]);

        $imagePath = $request->file('image')->store('images','public');

        Achievement::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$imagePath
        ]);
        
        return redirect()->route('achievement.index')->with('success','Achievement added successfully');
    }

    public function show(Achievement $achievement)
    {
        //
    }

    public function edit(Achievement $achievement)
    {
        return view("dashboard.other.achievement.edit", compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'nullable|mimes:jpg,jpeg,png,gif,webp|max:5120'
        ],[
            'image.max' => 'The uploaded image must not be larger than 5MB.'
        ]);

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images','public');

            if (Storage::disk('public')->exists($achievement->image)) {
                Storage::disk('public')->delete($achievement->image);
            }
            
            $achievement->image = $imagePath;
        }

        $achievement->update([
            'title'=>$achievement->title,
            'description'=>$achievement->description,
            'image'=>$achievement->image,
        ]);

        return redirect()->route('achievement.index')->with('success','Achievement updated successfully');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return redirect()->route('achievement.index')->with('success','Achievement deleted successfully');
    }
}
