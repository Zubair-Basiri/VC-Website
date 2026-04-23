@extends('website.master')

@section('title', 'Free Databases')

@section('header')
    @include('website.header')
@endsection

@section('content')
    @include('website.resource.resourceDetails')
    
    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{ url('/') }}">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">Resources</span>
        </div>
    </div>

    <div class="container pt-4 mb-5">
        <div class="text-center">
            <h2 class="section-title-underline">
                <span><strong>Free Research Databases</strong></span>
            </h2>
        </div>

        @if(isset($databases) && $databases->count() > 0)
            @foreach ($databases as $database)
                <div class="row">
                    <hr class="my-4" style="border: 0; border-top: 2px solid #808481; width: 100%; margin: auto;">  
                    <div class="col-lg-4 d-flex align-items-center justify-content-center" style="color:black;" data-aos="zoom-in" data-aos-delay="400">
                        <h4>
                            <span>{{ $database->title }}</span>
                        </h4>
                    </div>
                    <div class="col-lg-4" data-aos="zoom-out" data-aos-delay="400">
                        <p>{{ $database->description }}</p>
                    </div>
                    <div class="col-lg-4" data-aos="fade-left" data-aos-delay="400">
                        <p>{{ $database->info }}</p>
                        <a href="{{ $database->link }}" target="_blank" class="btn btn-primary bgColorbtn rounded-0 px-2">Click Here</a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-muted">No free research databases available at the moment.</p>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection