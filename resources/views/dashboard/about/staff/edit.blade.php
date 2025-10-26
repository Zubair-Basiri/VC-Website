@extends('dashboard.dashMaster')

@section('title','Administrative Staffs')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Please edit staff info</h5>
                <button type="button" class="btn"><a href="{{ route('staff.index') }}">Back</a></button>
            </div>

            <form action="{{route('staff.update', $staff->id)}}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$staff->name}}">
                </div>
                @error('name')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" class="form-control" name="position" value="{{$staff->position}}">
                </div>
                @error('position')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="{{$staff->description}}">
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$staff->email}}">
                </div>
                @error('email')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12">
                    <label for="academic_profile" class="form-label">Academic Profile</label>
                    <input type="text" class="form-control" name="academic_profile" value="{{$staff->academic_profile}}">
                </div>
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