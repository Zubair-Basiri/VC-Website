@extends('website.master')

@section('title','about')

@section('header')
    @include('website.header')
@endsection

@section('content')
@include('website.about.aboutDetails') 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">About</span>
      </div>
    </div>

    <div class="container pt-4 mb-5">
      <div class="row justify-content-center" data-aos="zoom-out" data-aos-delay="400">
        <div class="col-lg-10 text-center">
          <h2 class="section-title-underline" style="margin-bottom: 1.5rem;">
            <span><strong>About Us</strong></span>
          </h2>
          <p>{!! $abouts->description !!}</p>
        </div>
      </div>
    </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection