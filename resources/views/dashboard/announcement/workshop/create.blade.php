@extends('dashboard.dashMaster')

@section('title','workshop')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <form action="{{ route('workshop.store') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-between">
                  <h5 class="card-title">Add Description for Workshop</h5>
                  <button type="button" class="btn"><a href="{{ route('workshop.index') }}">Back</a></button>
                </div>
                <div class="col-12 mb-1">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                @error('title')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror
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