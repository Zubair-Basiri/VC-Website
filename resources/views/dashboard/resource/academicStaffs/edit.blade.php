@extends('dashboard.dashMaster')

@section('title','academicStaffs')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Edit Staff Publication required fields</h5>
                <button type="button" class="btn"><a href="{{ route('publication.index') }}">Back</a></button>
            </div>
              <form action="{{ route('publication.update', $publication->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$publication->title}}">
                </div>
                @error('title')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mb-3">
                    <label for="lecturer" class="form-label">Lecturer Name</label>
                    <input type="text" class="form-control" name="lecturer" value="{{$publication->lecturer}}">
                </div>
                @error('lecturer')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mb-3">
                    <label for="faculty" class="form-label">Faculty</label>
                    <select class="form-select" name="faculty" id="faculty">
                        <option>{{$publication->faculty}}</option>
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
                    <label for="category" class="form-label">category</label>
                    <select class="form-select" name="category" id="category">
                        <option>{{ $publication->category }}</option>
                        <option value="Thesis">Thesis</option>
                        <option value="Monograph">Monograph</option>
                    </select>
                </div>
                @error('category')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mt-3 mb-3">
                    <button> <a href="{{ asset('storage/' . $publication->file) }}" target="_blank">View Old File</a></button>
                </div>

                <div class="col-12 mb-3">
                    <label for="file" class="form-label">PDF File</label>
                    <input type="file" class="form-control" name="file">
                </div>
                @error('file')
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