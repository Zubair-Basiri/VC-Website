<?php

namespace App\Http\Controllers\Dashboard\Announcement;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::latest()->paginate(10);
        return view('dashboard.announcement.conference.index', compact('conferences'));
    }

    public function create()
    {
        return view('dashboard.announcement.conference.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'genDescription'       => 'required|string',
            'enLink'               => 'nullable|url',
            'psLink'               => 'nullable|url',
            'daLink'               => 'nullable|url',
            'arLink'               => 'nullable|url',
            'posterEnLink'         => 'nullable|url',
            'posterPsLink'         => 'nullable|url',
            'posterDaLink'         => 'nullable|url',
            'posterArLink'         => 'nullable|url',
            'image'                => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'posterImage.*'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'posterImage'          => 'nullable|array|max:4',
        ]);

        // Store main conference image
        $imagePath = $request->file('image')->store('conferences/images', 'public');

        // Store poster images (up to 4)
        $posterPaths = [];
        if ($request->hasFile('posterImage')) {
            foreach ($request->file('posterImage') as $poster) {
                $posterPaths[] = $poster->store('conferences/posters', 'public');
            }
        }

        Conference::create([
            'genDescription'         => $request->genDescription,
            'enLink'                 => $request->enLink,
            'psLink'                 => $request->psLink,
            'daLink'                 => $request->daLink,
            'arLink'                 => $request->arLink,
            'posterEnLink'           => $request->posterEnLink,
            'posterPsLink'           => $request->posterPsLink,
            'posterDaLink'           => $request->posterDaLink,
            'posterArLink'           => $request->posterArLink,
            'image'                  => $imagePath,
            'posterImage'            => json_encode($posterPaths),
        ]);

        return redirect()->route('conference.index')->with('success', 'Conference created successfully.');
    }

    public function show(Conference $conference)
    {
        //
    }

    public function edit(Conference $conference)
    {
        return view('dashboard.announcement.conference.edit', compact('conference'));
    }

    public function update(Request $request, Conference $conference)
    {
        $request->validate([
            'genDescription'       => 'required|string',
            'enLink'               => 'nullable|url',
            'psLink'               => 'nullable|url',
            'daLink'               => 'nullable|url',
            'arLink'               => 'nullable|url',
            'posterEnLink'         => 'nullable|url',
            'posterPsLink'         => 'nullable|url',
            'posterDaLink'         => 'nullable|url',
            'posterArLink'         => 'nullable|url',
            'image'                => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'posterImage.*'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'posterImage'          => 'nullable|array|max:4',
        ]);

        // Update main image if a new one is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            if (Storage::disk('public')->exists($conference->image)) {
                Storage::disk('public')->delete($conference->image);
            }
            $imagePath = $request->file('image')->store('conferences/images', 'public');
            $conference->image = $imagePath;
        }

        // Update poster images (replace entirely)
        if ($request->hasFile('posterImage')) {
            // Delete old poster images
            $oldPosters = json_decode($conference->posterImage, true) ?? [];
            foreach ($oldPosters as $oldPoster) {
                if (Storage::disk('public')->exists($oldPoster)) {
                    Storage::disk('public')->delete($oldPoster);
                }
            }
            // Store new ones
            $posterPaths = [];
            foreach ($request->file('posterImage') as $poster) {
                $posterPaths[] = $poster->store('conferences/posters', 'public');
            }
            $conference->posterImage = json_encode($posterPaths);
        }

        // Update other fields
        $conference->genDescription       = $request->genDescription;
        $conference->enLink               = $request->enLink;
        $conference->psLink               = $request->psLink;
        $conference->daLink               = $request->daLink;
        $conference->arLink               = $request->arLink;
        $conference->posterEnLink         = $request->posterEnLink;
        $conference->posterPsLink         = $request->posterPsLink;
        $conference->posterDaLink         = $request->posterDaLink;
        $conference->posterArLink         = $request->posterArLink;
        $conference->save();

        return redirect()->route('conference.index')->with('success', 'Conference updated successfully.');
    }

    public function destroy(Conference $conference)
    {
        // Delete main image
        if (Storage::disk('public')->exists($conference->image)) {
            Storage::disk('public')->delete($conference->image);
        }
        // Delete poster images
        $posters = json_decode($conference->posterImage, true) ?? [];
        foreach ($posters as $poster) {
            if (Storage::disk('public')->exists($poster)) {
                Storage::disk('public')->delete($poster);
            }
        }
        $conference->delete();
        return redirect()->route('conference.index')->with('success', 'Conference deleted successfully.');
    }
}