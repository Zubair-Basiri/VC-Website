@extends('dashboard.dashMaster')

@section('title','testimonial')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Edit Testimonial Fields</h5>
                <button type="button" class="btn"><a href="{{ route('testimonial.index') }}">Back</a></button>
            </div>

            <form action="{{route('testimonial.update', $testimonial->id)}}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$testimonial->name}}">
                </div>
                @error('name')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" class="form-control" name="position" value="{{$testimonial->position}}">
                </div>

                <div class="col-12">
                    <label for="message" class="form-label">Message</label>
                    <input type="text" class="form-control" name="message" value="{{$testimonial->message}}">
                </div>
                @error('message')
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