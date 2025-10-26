<?php

namespace App\Http\Controllers\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {

        $staffs = Staff::paginate(10);
        return view('dashboard.about.staff.index',[
            'staffs' => $staffs
        ]);

    }

    public function create()
    {
        return view('dashboard.about.staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'email' => 'required|email',
        ]);

        Staff::create([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'email' => $request->email,
            'academic_profile' => $request->academic_profile,
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff member added successfully.');
    }

    public function edit(Staff $staff)
    {
        return view('dashboard.about.staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'email' => 'required|email',
        ]);

        $staff->update([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'email' => $request->email,
            'academic_profile' => $request->academic_profile,
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff member updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
