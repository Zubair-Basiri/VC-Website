@extends('website.master')

@section('title', 'Policies')

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
        <div class="row">
            <div class="col-lg-2 d-flex align-items-start" data-aos="fade-right" data-aos-delay="400">
                <h2 class="section-title-underline">
                    <span>Policies</span>
                </h2>
            </div>
            <div class="col-lg-10">
                @if(isset($genPolicies) && $genPolicies->count() > 0)
                    <div class="row">
                        @foreach ($genPolicies as $genPolicy)
                            <div class="col-md-4 mb-4" data-aos="fade-left" data-aos-delay="400">
                                <ul>
                                    <li><strong>{{ $genPolicy->title }}</strong></li>

                                    @if(!empty($genPolicy->pdf_files))
                                        @foreach($genPolicy->pdf_files as $file)
                                            <li>
                                                <a href="{{ asset('storage/documents/' . $file) }}" download target="_blank">
                                                    {{ $file }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>No files available</li>
                                    @endif
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No policies available at the moment.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection