<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\Seminar;
use App\Models\Workshop;
use App\Models\Grant;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function conferences(){
        $conferences = Conference::latest()->take(10)->get();
        return view('website.announcement.conference', compact('conferences'));
    }

    public function seminars(){
        $seminars = Seminar::latest()->take(10)->get();
        return view('website.announcement.seminar', compact('seminars'));
    }

    public function workshops(){
        $workshops = Workshop::latest()->take(10)->get();
        return view('website.announcement.workshop', compact('workshops'));
    }

    public function grants(){
        $grants = Grant::latest()->take(10)->get();
        return view('website.announcement.grants', compact('grants'));
    }
}
