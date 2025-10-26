@extends('website.master')

@section('title','gallery')

@section('header')
    @include('website.header')
@endsection

@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('images/VCLogomax.png') }}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Gallery</h2>
              <p>Observe our work through our gallery.</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Gallary</span>
      </div>
    </div>

    <div class="container pt-3 mb-5">
            <div class="row">
              <div class="col-lg-12" data-aos="fade-right" data-aos-delay="400">
                <h2 class="section-title-underline text-center" style="margin-bottom: 3rem;">
                  <span><strong>Our Gallery</strong></span>
                </h2>
              </div>
              @foreach ($galleries as $gallery)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-left" data-aos-delay="400">
                  <div class="image-container position-relative">
                    <a href="{{ asset('storage/' . $gallery->image) }}" class="glightbox" data-gallery="gallery1">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="Image" class="img-fluid">
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