@extends('website.master')

@section('title','laboratory')

@section('header')
    @include('website.header')
@endsection

@section('content')

    @include('website.department.departmentDetails')
    
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Departments</span>
      </div>
    </div>

    <div class="container pt-4 mb-5">
        <div class="text-center">
            <h2 class="section-title-underline">
                  <span><strong>Research Center</strong></span>
            </h2>
        </div>
        @foreach ($researches as $research)
            <div class="row">
              <hr class="my-4" style="border: 0; border-top: 2px solid #808481; width: 100%; margin: auto;">  
              <div class="col-lg-4 d-flex align-items-center justify-content-center" style="color:black;" data-aos="zoom-in" data-aos-delay="400">
                <h4>
                  <span>{{$research->title}}</span>
                </h4>
              </div>
              <div class="col-lg-4" data-aos="zoom-out" data-aos-delay="400">
                <p>{{$research->description}}</p>
              </div>
              <div class="col-lg-4" data-aos="fade-left" data-aos-delay="400">
                <p>{{$research->info}}</p>
                <a href="{{$research->link}}" target="_blank" class="btn btn-primary bgColorbtn rounded-0 px-2">Click Here</a>
              </div>
            </div>
        @endforeach
          </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection