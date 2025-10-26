@extends('website.master')

@section('title','theses')

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
            <div class="row">
              <div class="col-lg-4" data-aos="fade-right" data-aos-delay="400">
                <h2 class="section-title-underline">
                  <span>Master Theses</span>
                </h2>
              </div>
              @foreach ($theses as $t)
                <div class="col-lg-4" data-aos="fade-left" data-aos-delay="400">
                  <ul>
                      <li><strong>{{$t->title}}</strong></li>
                      <a href="{{ asset('storage/' . $t->file) }}" download target="_blank">Download PDF</a>
                  </ul>
                </div>
              @endforeach
            </div>
          </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection