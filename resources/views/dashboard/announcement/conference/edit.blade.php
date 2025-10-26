@extends('dashboard.dashMaster')

@section('title','conference')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <form action="{{ route('conference.update', $conference->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-between">
                  <h5 class="card-title">Edit Description for Conference</h5>
                  <button type="button" class="btn"><a href="{{ route('conference.index') }}">Back</a></button>
                </div>

                <div class="col-12 mb-1">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$conference->title}}">
                </div>
                @error('title')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <!-- TinyMCE Editor -->
                <textarea name="description" class="tinymce-editor">
                  {{ $conference->description }}
                </textarea><!-- End TinyMCE Editor -->
                <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>

            </div>
          </div>
@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection