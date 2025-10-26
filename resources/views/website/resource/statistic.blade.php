@extends('website.master')

@section('title','statistic')

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
                  <span><strong>Statistics</strong></span>
                </h2>
              </div>
              @foreach ($statistics as $statistic)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-left" data-aos-delay="400">
                  <h4 class="text-center">{{$statistic->title}}</h4>
                  <div class="image-container position-relative">
                    <a href="{{ asset('storage/' . $statistic->imageFile) }}" class="glightbox" data-gallery="gallery1">
                    <img src="{{ asset('storage/' . $statistic->imageFile) }}" alt="Image" class="img-fluid">
                    <div class="overlay">
                      <i class="fas fa-eye"></i>
                    </div>
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