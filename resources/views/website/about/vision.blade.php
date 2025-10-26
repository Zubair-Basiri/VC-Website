@extends('website.master')

@section('title','vision')

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
                  <span>Our Vision</span>
                </h2>
              </div>
              <div class="col-lg-6" data-aos="fade-left" data-aos-delay="400">
                <p>{!!$visions->description!!}</p>
              </div>
            </div>
          </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection