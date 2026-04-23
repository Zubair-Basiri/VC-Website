@extends('website.master')

@section('title', 'Show Publication')

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

    <div class="container pt-5 mb-5">
        <div class="mb-5 text-center">
            <h2 class="section-title-underline">
                <span><strong>All Publications of {{ $lecturer }}</strong></span>
            </h2>
        </div>

        {{-- Theses Section --}}
        <div class="row mb-5">
            <div class="col-12" data-aos="fade-right" data-aos-delay="400">
                <h4 class="section-title-underline">
                    <span>Theses</span>
                </h4>
            </div>
            <div class="col-12" data-aos="fade-left" data-aos-delay="400">
                @if(isset($thesesPublications) && $thesesPublications->count() > 0)
                    <ul>
                        @foreach ($thesesPublications as $thesesPublication)
                            <li class="mb-3">
                                <strong>{{ $thesesPublication->title }}</strong><br>
                                <a href="{{ asset('storage/' . $thesesPublication->file) }}" download target="_blank">Download PDF</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">No theses available for this lecturer.</p>
                @endif
            </div>
        </div>

        <hr class="my-4" style="border: 0; border-top: 2px solid #808481; width: 100%; margin: auto;">

        {{-- Monographs Section --}}
        <div class="row mt-4">
            <div class="col-12" data-aos="fade-right" data-aos-delay="400">
                <h4 class="section-title-underline">
                    <span>Monographs</span>
                </h4>
            </div>
            <div class="col-12" data-aos="fade-left" data-aos-delay="400">
                @if(isset($monographsPublications) && $monographsPublications->count() > 0)
                    <ul>
                        @foreach ($monographsPublications as $monographsPublication)
                            <li class="mb-3">
                                <strong>{{ $monographsPublication->title }}</strong><br>
                                <a href="{{ asset('storage/' . $monographsPublication->file) }}" download target="_blank">Download PDF</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">No monographs available for this lecturer.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection