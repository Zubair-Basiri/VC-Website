@extends('website.master')

@section('title','allLecturers')

@section('header')
    @include('website.header')
@endsection

@section('content')

    @include('website.department.departmentDetails')
    
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Resources</span>
      </div>
    </div>

    <div class="container pt-4 mb-5">
        <div class="text-center">
            <h2 class="section-title-underline">
                  <span><strong>Lecturer List</strong></span>
            </h2>
        </div>
        <table class="table table-striped table-bordered mt-4">
            <thead style="background-color: #45b3e0; color: white;">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Lecturer Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lecturers as $index => $lecturer)
                    <tr data-aos="zoom-in" data-aos-delay="400">
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center"><a href="{{ route('showPublication', $lecturer->lecturer)}}">{{ $lecturer->lecturer }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
          </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection