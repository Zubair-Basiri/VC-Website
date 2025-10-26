@extends('dashboard.dashMaster')

@section('title','forum')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Edit Forum required fields</h5>
                <button type="button" class="btn"><a href="{{ route('forum.index') }}">Back</a></button>
            </div>
              <form action="{{ route('forum.update', $forum->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12 mb-1">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $forum->title }}">
                </div>
                @error('title')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mt-3 mb-3">
                    <button> <a href="{{ asset('storage/' . $forum->pdfFile) }}" target="_blank">View Old File</a></button>
                </div>
                
                <div class="col-12 mb-1">
                    <label for="pdfFile" class="form-label">Upload New File</label>
                    <input type="file" class="form-control" name="pdfFile">
                </div>
                @error('pdfFile')
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