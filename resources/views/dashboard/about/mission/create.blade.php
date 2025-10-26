@extends('dashboard.dashMaster')

@section('title','mission')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <form action="{{ route('mission.store') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-between">
                  <h5 class="card-title">Add Description for Our Mission</h5>
                  <button type="button" class="btn"><a href="{{ route('mission.index') }}">Back</a></button>
                </div>
                <!-- TinyMCE Editor -->
                <textarea name="description" class="tinymce-editor">

                </textarea><!-- End TinyMCE Editor -->

                @error('description')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
              @enderror

              <div class="text-center mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
          </div>
@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection