@extends('website.master')

@section('title','show publication')

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

    <div class="container pt-5 mb-5">
            <div class="mb-5 text-center">
                <h2 class="section-title-underline">
                    <span><strong>All Publications of {{ $lecturer }}</strong></span>
                </h2>
            </div>
            <div class="row">
                @foreach ($thesesPublications as $thesesPublication)
                    <div class="col-lg-4" data-aos="fade-right" data-aos-delay="400">
                        <h4 class="section-title-underline">
                        <span>Theses</span>
                        </h4>
                    </div>
                    <div class="col-lg-4" data-aos="fade-left" data-aos-delay="400">
                    <ul>
                        <li><strong>{{$thesesPublication->title}}</strong></li>
                        <a href="{{ asset('storage/' . $thesesPublication->file) }}" download target="_blank">Download PDF</a>
                    </ul>
                    </div>
                @endforeach
                <hr class="my-4" style="border: 0; border-top: 2px solid #808481; width: 100%; margin: auto;">
                @foreach ($monographsPublications as $monographsPublication)
                    <div class="col-lg-4" data-aos="fade-right" data-aos-delay="400">
                        <h4 class="section-title-underline">
                            <span>Monographs</span>
                        </h4>
                    </div>
                    <div class="col-lg-4" data-aos="fade-left" data-aos-delay="400">
                        <ul>
                            <li><strong>{{$monographsPublication->title}}</strong></li>
                            <a href="{{ asset('storage/' . $monographsPublication->file) }}" download target="_blank">Download PDF</a>
                        </ul>
                    </div>
                @endforeach
            </div>
          </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection