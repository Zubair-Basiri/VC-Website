<?php

namespace App\Http\Controllers\Dashboard\Resource;

use App\Http\Controllers\Controller;
use App\Models\AcademicStaffPublication;
use App\Models\FacultyLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffPublicationController extends Controller
{

    public function index()
    {
        $publications = AcademicStaffPublication::all();
        return view('dashboard.resource.academicStaffs.index', compact('publications'));
    }

    public function create()
    {
        return view('dashboard.resource.academicStaffs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'lecturer' => 'required|string|max:255',
            'faculty' => 'required',
            'category' => 'required',
            'file' => 'required|mimes:pdf|max:5120',
        ], [
            'file.max' => 'File must not be greater than 5MB',
        ]);

        $filePath = $request->file('file')->store('documents','public');

        AcademicStaffPublication::create([
            'title' => $request->title,
            'lecturer' => $request->lecturer,
            'faculty' => $request->faculty,
            'category' => $request->category,
            'file' => $filePath,
        ]);

        return redirect()->route('publication.index')->with('Success', 'Publication Added Successfully');
    }

    public function show(AcademicStaffPublication $publication)
    {
        //
    }

    public function edit(AcademicStaffPublication $publication)
    {
        return view('dashboard.resource.academicStaffs.edit', compact('publication'));
    }

    public function update(Request $request, AcademicStaffPublication $publication)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'lecturer' => 'required|string|max:255',
            'faculty' => 'required',
            'category' => 'required',
            'file' => 'nullable|mimes:pdf|max:5120',
        ], [
            'file.max' => 'File must not be greater than 5MB',
        ]);

        if($request->hasFile('file')) {
            $filePath = $request->file('file')->store('documents','public');

            if (Storage::disk('public')->exists($publication->file)) {
                Storage::disk('public')->delete($publication->file);
            }
            
            $publication->file = $filePath;
        }

        $publication->update([
            'title' => $request->title,
            'lecturer' => $request->lecturer,
            'faculty' => $request->faculty,
            'category' => $request->category,
            'file' => $publication->file,
        ]);

        return redirect()->route('publication.index')->with('Success','Oblication Updated Successfully');
    }

    public function destroy(AcademicStaffPublication $publication)
    {
        $publication->delete();
        return redirect()->route('publication.index')->with('Success','Publication Deleted Successfully');
    }


    public function showLogo()
    {
        return view('dashboard.resource.academicStaffs.showLogo', [
            'logos' => FacultyLogo::all(),
        ]);
    }

    public function addLogo()
    {
        return view('dashboard.resource.academicStaffs.addLogo');
    }

    public function storeLogo(Request $request)
    {
        $request->validate([
            'faculty' => 'required',
            'logo' => 'required|mimes:jpg,jepg,png|max:5120',
        ], [
            'logo.max' => 'Logo must not be greater than 5MB',
        ]);

        $logoPath = $request->file('logo')->store('images','public');

        FacultyLogo::create([
            'faculty' => $request->faculty,
            'logo' => $logoPath,
        ]);

        return redirect()->route('showLogo')->with('Success', 'Logo Added Successfully');
    }

    public function editLogo(FacultyLogo $logo)
    {
        return view('dashboard.resource.academicStaffs.editLogo', compact('logo'));
    }

    public function updateLogo(Request $request, FacultyLogo $facultyLogo)
    {
        $request->validate([
            'faculty' => 'required',
            'logo' => 'nullable|mimes:jpg,jepg,png|max:5120',
        ], [
            'logo.max' => 'Logo must not be greater than 5MB',
        ]);

        if($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('images','public');

            if (Storage::disk('public')->exists($facultyLogo->logo)) {
                Storage::disk('public')->delete($facultyLogo->logo);
            }
            
            $facultyLogo->logo = $logoPath;
        }

        $facultyLogo->update([
            'faculty' => $request->faculty,
            'logo' => $facultyLogo->logo,
        ]);

        return redirect()->route('showLogo')->with('Success','Logo Updated Successfully');
    }

    public function deleteLogo(FacultyLogo $facultyLogo)
    {
        $facultyLogo->delete();
        return redirect()->route('showLogo')->with('Success','Logo Deleted Successfully');
    }   
}
