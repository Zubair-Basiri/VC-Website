@extends('website.master')

@section('title','grants')

@section('header')
    @include('website.header')
@endsection

@section('content')

    @include('website.announcement.announcementDetails')
    
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Announcements</span>
      </div>
    </div>

    <div class="container pt-4 mb-5">
            <div class="text-center">
                <h2 class="section-title-underline" style="margin-bottom: 1.5rem;">
                  <span><strong>Grants</strong></span>
                </h2>
            </div>
            @foreach ($grants as $grant)
              <div class="row">
                <div class="col-lg-10 container-fluid" data-aos="zoom-out" data-aos-delay="400">
                  <div class="text-left">
                  <h5 class="section-title-underline" style="margin-bottom: 1rem;">
                    <span><strong>{{$grant->title}}</strong></span>
                  </h5>
                  <p></p>
                  <p>{!!$grant->description!!}</p>
                  <hr style="border: 1px solid #333;" class="mt-3 mb-3">
                </div>
                </div>
              </div>
            @endforeach
          </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection