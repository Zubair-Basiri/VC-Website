<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;

use App\Models\About;
use App\Models\Carousel;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $carousels = Carousel::latest()->take(5)->get();
        $galleries = Gallery::latest()->take(3)->get();
        $testimonials = Testimonial::all();
        $achievements = Achievement::latest()->take(3)->get();
        $announcements = Announcement::latest()->take(3)->get();
        $abouts = About::latest()->first();
        $video = Video::latest()->first();

        return view('website.home', compact('carousels', 'galleries', 'testimonials', 'achievements', 'announcements', 'abouts', 'video'));
    }

    public function galleryCollection()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        return view('website.allGallery', compact('galleries'));
    }

    public function news()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->get();
        return view('website.news', compact('announcements'));
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function login()
    {
        return view('website.login');
    }
}
