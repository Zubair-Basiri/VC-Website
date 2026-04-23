@extends('website.master')

@section('title','priorities')

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
                  <span>Our Priorities</span>
                </h2>
              </div>
              @if(isset($priorities) && $priorities && ($priorities->description ?? false))
                    <p>{!! Purifier::clean($priorities->description) !!}</p>
                @else
                    <p class="text-muted">No priorities data available.</p>
                @endif
            </div>
          </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection