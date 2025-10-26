<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\Plan;
use App\Models\Report;
use App\Models\Statistic;
use App\Models\AcademicStaffPublication;
use App\Models\DigitalLibrary;
use App\Models\AcademicPaper;
use App\Models\FacultyLogo;
use App\Models\FreeDatabase;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function forums()
    {
        $forums = Forum::all();
        return view('website.resource.forum', compact('forums'));
    }

    public function plans()
    {
        $plans = Plan::all();
        return view('website.resource.plan', compact('plans'));
    }

    public function reports()
    {
        $reports = Report::all();
        return view('website.resource.report', compact('reports'));
    }

    public function statistics()
    {
        $statistics = Statistic::all();
        return view('website.resource.statistic', compact('statistics'));
    }

    public function databases()
    {
        $databases = FreeDatabase::all();
        return view('website.resource.databases', compact('databases'));
    }

    public function thesis()
    {
        $theses = AcademicPaper::where('master_bachelor', 'master')
                        ->where('category', 'thesis')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('website.resource.theses', compact('theses'));
    }

    public function monographs()
    {
        $monographs = AcademicPaper::where('master_bachelor', 'bachelor')
                        ->where('category', 'monograph')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return view('website.resource.monograph', compact('monographs'));
    }

    public function digitalLibraries()
    {
        $digitals = DigitalLibrary::all();
        return view('website.resource.digitalLibrary', compact('digitals'));
    }

    public function facultyLogo()
    {
        $logos = FacultyLogo::all();
        return view('website.resource.facultyLogo', compact('logos'));
    }

    public function showLecturer(string $faculty)
    {
        $lecturers = AcademicStaffPublication::where('faculty', $faculty)
                    ->select('lecturer', 'faculty')->distinct()->get();
        return view('website.resource.showLecturer', compact('lecturers'));
    }

    public function showPublication(string $lecturer)
    {
        $thesesPublications = AcademicStaffPublication::where('lecturer', $lecturer)
                        ->where('category', 'thesis')
                        ->select('title', 'category', 'file')->get();

        $monographsPublications = AcademicStaffPublication::where('lecturer', $lecturer)
                        ->where('category', 'monograph')
                        ->select('title', 'category', 'file')->get();

        return view('website.resource.showPublication', compact('thesesPublications', 'monographsPublications', 'lecturer'));
    }
}
