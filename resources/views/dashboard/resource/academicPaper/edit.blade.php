@extends('dashboard.dashMaster')

@section('title','academicPapers')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Edit Paper required fields</h5>
                <button type="button" class="btn"><a href="{{ route('paper.index') }}">Back</a></button>
            </div>
              <form action="{{ route('paper.update', $paper->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12 mb-1">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $paper->title }}">
                </div>
                @error('title')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mb-1">
                    <label for="master_bachelor" class="form-label">Master/Bachelor</label>
                    <input type="text" class="form-control" name="master_bachelor" value="{{ $paper->master_bachelor }}">
                </div>
                @error('master_bachelor')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mb-1">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" name="category" value="{{ $paper->category }}">
                </div>
                @error('category')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mt-3 mb-3">
                    <button> <a href="{{ asset('storage/' . $paper->file) }}" target="_blank">View Old File</a></button>
                </div>
                
                <div class="col-12 mb-1">
                    <label for="file" class="form-label">Upload New File</label>
                    <input type="file" class="form-control" name="file">
                </div>
                @error('file')
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