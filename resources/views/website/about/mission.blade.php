@extends('website.master')

@section('title','mission')

@section('header')
    @include('website.header')
@endsection

@section('content')

    @include('website.about.aboutDetails') 
    
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">About Us</span>
      </div>
    </div>

    <div class="container pt-5 mb-5">
            <div class="row">
              <div class="col-lg-4" data-aos="fade-right" data-aos-delay="400">
                <h2 class="section-title-underline">
                  <span>Our Mission</span>
                </h2>
              </div>
              @if(isset($missions) && $missions && ($missions->description ?? false))
                    <p>{!! Purifier::clean($missions->description) !!}</p>
                @else
                    <p class="text-muted">No mission data available.</p>
                @endif
            </div>
          </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection