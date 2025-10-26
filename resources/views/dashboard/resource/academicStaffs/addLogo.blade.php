@extends('dashboard.dashMaster')

@section('title','facultyLogo')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Please fill required fields</h5>
                <button type="button" class="btn"><a href="{{ route('showLogo') }}">Back</a></button>
            </div>
              <form action="{{ route('storeLogo') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-12 mb-3">
                    <label for="faculty" class="form-label">Faculty</label>
                    <select class="form-select" name="faculty" id="faculty">
                        <option value="" disabled selected>Select Your Faculty</option>
                        <option value="Computer Science">Computer Sciense</option>
                        <option value="Economics">Economics</option>
                        <option value="Education">Education</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Journalism">Journalism</option>
                        <option value="Language & Literature">Language & Literature</option>
                        <option value="Law & Political Science">Law & Political Science</option>
                        <option value="Medical">Medical</option>
                        <option value="Pharmacy">Pharmacy</option>
                        <option value="Public Administration & Policy">Public Administration & Policy</option>
                        <option value="Sharia">Sharia</option>
                    </select>
                </div>
                @error('faculty')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mb-3">
                    <label for="logo" class="form-label">Faculty Logo</label>
                    <input type="file" class="form-control" name="logo">
                </div>
                @error('logo')
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