<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\Objective;
use App\Models\Policy;
use App\Models\Priority;
use App\Models\StrategicPlan;
use App\Models\Staff;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutUs()
    {
        $abouts = About::latest()->first();
        return view('website.about.about', compact('abouts'));
    }
    public function ourVision()
    {
        $visions = Vision::latest()->first();
        return view('website.about.vision', compact('visions'));
    }

    public function ourMission()
    {
        $missions = Mission::latest()->first();
        return view('website.about.mission', compact('missions'));
    }

    public function policies()
    {
        $policies = Policy::latest()->first();
        return view('website.about.policy', compact('policies'));
    }

    public function objective()
    {
        $objectives = Objective::latest()->first();
        return view('website.about.objectives', compact('objectives'));
    }

    public function priority()
    {
        $priorities = Priority::latest()->first();
        return view('website.about.priorities', compact('priorities'));
    }

    public function strategicPlans()
    {
        $strategicPlans = StrategicPlan::latest()->first();
        return view('website.about.strategicPlan', compact('strategicPlans'));
    }

    public function forum()
    {
        return view('website.about.forum');
    }

    public function administrativeStaff()
    {
        $staffs = Staff::all();
        return view('website.about.administrativeStaff', compact('staffs'));
    }

}
