@extends('website.master')

@section('title','forum')

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
                  <span>Forums</span>
                </h2>
              </div>
              <div class="col-lg-4" data-aos="fade-left" data-aos-delay="400">
                <ul>
                    <li><strong>title</strong></li>
                    <a href="#" target="_blank">form pdf</a>
                    <li><strong>title</strong></li>
                    <a href="#" target="_blank">form pdf</a>
                    <li><strong>title</strong></li>
                    <a href="#" target="_blank">form pdf</a>
                </ul>
              </div>
            </div>
          </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection