@extends('dashboard.dashMaster')

@section('title','statistic')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Edit Statistic required fields</h5>
                <button type="button" class="btn"><a href="{{ route('statistic.index') }}">Back</a></button>
            </div>
              <form action="{{ route('statistic.update', $statistic->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12 mb-1">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $statistic->title }}">
                </div>
                @error('title')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mt-3 mb-3">
                    <button> <a href="{{ asset('storage/' . $statistic->imageFile) }}" target="_blank">View Old Image</a></button>
                </div>
                
                <div class="col-12 mb-1">
                    <label for="imageFile" class="form-label">Upload New Image</label>
                    <input type="file" class="form-control" name="imageFile">
                </div>
                @error('imageFile')
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