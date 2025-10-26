@extends('website.master')

@section('title','publications')

@section('header')
    @include('website.header')
@endsection

@section('content')

    @include('website.resource.resourceDetails')
    
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Resources</span>
      </div>
    </div>

    <div class="container pt-3 mb-5">
            <div class="row">
              <div class="col-lg-12" data-aos="fade-right" data-aos-delay="400">
                <h2 class="section-title-underline text-center" style="margin-bottom: 3rem;">
                  <span><strong>Academic Staffs Publications</strong></span>
                </h2>
              </div>
              @foreach ($logos as $logo)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-left" data-aos-delay="400">
                  <div class="image-container position-relative">
                    <a href="{{ route('showLecturer', $logo->faculty) }}">
                    <img src="{{ asset('storage/' . $logo->logo) }}" alt="Image" class="img-fluid">
                    </a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection