<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\AcademicJournal;
use App\Models\Laboratory;
use App\Models\Library;
use App\Models\Research;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function academicJournals(){
        $academicJournals = AcademicJournal::all();
        return view('website.department.academicJournal', compact('academicJournals'));
    }

    public function lab()
    {
        $laboratories = Laboratory::all();
        return view('website.department.laboratory', compact('laboratories'));
    }

    public function lib()
    {
        $libraries = Library::all();
        return view('website.department.library', compact('libraries'));
    }

    public function rc()
    {
        $researches = Research::all();
        return view('website.department.research', compact('researches'));
    }
}
