@extends('dashboard.dashMaster')

@section('title','achievement')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Edit Achievement Fields</h5>
                <button type="button" class="btn"><a href="{{ route('achievement.index') }}">Back</a></button>
            </div>

            <form action="{{route('achievement.update', $achievement->id)}}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$achievement->title}}">
                </div>
                @error('name')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="{{$achievement->description}}">
                </div>
                @error('description')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mt-3 mb-1">
                    <button> <a href="{{ asset('storage/' . $achievement->image) }}" target="_blank">View Old Image</a></button>
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