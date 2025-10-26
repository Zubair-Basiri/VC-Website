@extends('dashboard.dashMaster')

@section('title','achievement')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Fill fields for Achievement</h5>
                <button type="button" class="btn"><a href="{{ route('achievement.index') }}">Back</a></button>
            </div>
            <form action="{{route('achievement.store')}}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                @error('title')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description">
                </div>
                @error('description')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                @error('image')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection