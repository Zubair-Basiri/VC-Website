@extends('dashboard.dashMaster')

@section('title','research')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Edit research information</h5>
                <button type="button" class="btn"><a href="{{ route('research.index') }}">Back</a></button>
            </div>

            <form action="{{route('research.update', $research->id)}}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-12 mb-1">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$research->title}}">
                </div>
                @error('title')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mb-1">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="{{$research->description}}">
                </div>
                @error('description')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mb-1">
                    <label for="info" class="form-label">info</label>
                    <input type="text" class="form-control" name="info" value="{{$research->info}}">
                </div>
                @error('info')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mb-1">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" class="form-control" name="link" value="{{$research->link}}">
                </div>
                @error('link')
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