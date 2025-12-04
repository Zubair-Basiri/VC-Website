@extends('website.master')

@section('title','Reports')

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
          <div class="col-lg-2 d-flex align-items-start" data-aos="fade-right" data-aos-delay="400">
              <h2 class="section-title-underline">
                  <span>Reports</span>
              </h2>
          </div>

          <div class="col-lg-10">
              <div class="row">
                  @foreach ($reports as $report)
                      <div class="col-md-4 mb-4" class="col-lg-4" data-aos="fade-left" data-aos-delay="400">
                          <ul>
                              <li><strong>{{ $report->title }}</strong></li>

                              @if(!empty($report->pdfFile))
                                      <li>
                                          <a href="{{ asset('storage/documents/' . $report->pdfFile) }}" download target="_blank">
                                              Download PDF
                                          </a>
                                      </li>
                              @else
                                  <li>No files available</li>
                              @endif
                          </ul>
                      </div>
                  @endforeach
              </div>
          </div>
      </div>

    </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection