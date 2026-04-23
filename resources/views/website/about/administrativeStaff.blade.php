@extends('website.master')

@section('title', 'Administrative Staff')

@section('header')
    @include('website.header')
@endsection

@section('content')
    @include('website.about.aboutDetails') 
    
    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{ url('/') }}">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">About Us</span>
        </div>
    </div>

    <div class="container pt-5 mb-5">
        <div class="row">
            <div class="col-lg-4" data-aos="fade-right" data-aos-delay="400">
                <h2 class="section-title-underline">
                    <span>Administrative Staff</span>
                </h2>
                <p class="text-muted">Dedicated professionals ensuring smooth operations every day.</p>
            </div>
            <div class="col-lg-8" data-aos="fade-left" data-aos-delay="400">
                <div class="staff-list">
                    @if(isset($staffs) && $staffs->count() > 0)
                        @foreach ($staffs as $staff)
                            <div class="staff-item">
                                <div class="staff-title">{{ $staff->name }}</div>
                                <div class="staff-position">{{ $staff->Position }}</div>
                                <div class="staff-description">{{ $staff->description }}</div>
                                <div class="staff-email">
                                    <a href="mailto:{{ $staff->email }}">📧 {{ $staff->email }}</a>
                                </div>
                                <div class="staff-academic-profile">{{ $staff->academic_profile }}</div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">No staff data available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection