@extends('website.master')

@section('title', 'Home')

@section('header')
    @include('website.header')
@endsection

@section('content')
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('images/VCLogomax.png') }}')">
        <div class="container">
            <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Latest News & Announcements</h2>
                <p>Find our latest news and announcements.</p>
            </div>
            </div>
        </div>
    </div> 

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{ route('home') }}">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">Latest News & Announcements</span>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="mb-4"></h2>
        @foreach ($announcements as $announcement)
            <div class="card news-card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{asset('storage/' . $announcement->image)}}" class="img-fluid rounded-start" alt="News Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$announcement->title}}</h5>
                            <p class="text-muted mb-2">Date: {{$announcement->created_at}}</p>
                            <p class="card-text news-description collapsed-text" id="desc1">
                                {{$announcement->description}}
                            </p>
                            <a href="javascript:void(0);" class="btn btn-link p-0" onclick="toggleDescription('desc1', this)">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('footer')
    @include('website.footer')
@endsection