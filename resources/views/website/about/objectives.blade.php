@extends('website.master')

@section('title','objectives')

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
                  <span>Our Objectives</span>
                </h2>
              </div>
              @if(isset($objectives) && $objectives && ($objectives->description ?? false))
                    <p>{!! Purifier::clean($objectives->description) !!}</p>
                @else
                    <p class="text-muted">No objectives data available.</p>
                @endif
            </div>
          </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection