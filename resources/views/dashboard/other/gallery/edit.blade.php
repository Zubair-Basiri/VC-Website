@extends('dashboard.dashMaster')

@section('title','gallery')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Re-Upload a new Image</h5>
                <button type="button" class="btn"><a href="{{ route('gallery.index') }}">Back</a></button>
            </div>
              <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12 mt-3 mb-3">
                    <button> <a href="{{ asset('storage/' . $gallery->image) }}" target="_blank">View Old Image</a></button>
                </div>
                
                <div class="col-12 mb-1">
                    <label for="image" class="form-label">Upload New Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                @error('image')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

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