@extends('dashboard.dashMaster')

@section('title','carousel')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Upload the Image</h5>
                <button type="button" class="btn"><a href="{{ route('carousel.index') }}">Back</a></button>
            </div>
              <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                </div>
              </form>
            </div>
          </div>
@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection