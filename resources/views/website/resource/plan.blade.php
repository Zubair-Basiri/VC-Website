@extends('website.master')

@section('title', 'Plan')

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
                    <span>Plans</span>
                </h2>
            </div>
            <div class="col-lg-10">
                @if(isset($plans) && $plans->count() > 0)
                    <div class="row">
                        @foreach ($plans as $plan)
                            <div class="col-md-4 mb-4" data-aos="fade-left" data-aos-delay="400">
                                <ul>
                                    <li><strong>{{ $plan->title }}</strong></li>
                                    <li>
                                        <a href="{{ asset('storage/' . $plan->pdfFile) }}" download target="_blank">Download PDF</a>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No plans available at the moment.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection