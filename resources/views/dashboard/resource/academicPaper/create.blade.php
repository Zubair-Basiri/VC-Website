@extends('dashboard.dashMaster')

@section('title','academicPapers')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Add Paper required fields</h5>
                <button type="button" class="btn"><a href="{{ route('paper.index') }}">Back</a></button>
            </div>
              <form action="{{ route('paper.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                @error('title')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mb-3">
                    <label for="master_bachelor" class="form-label">Master/Bachelor</label>
                    <select class="form-select" name="master_bachelor" id="master_bachelor">
                        <option value="" disabled selected>Select an option</option>
                        <option value="Master">Master</option>
                        <option value="Bachelor">Bachelor</option>
                    </select>
                </div>
                @error('master_bachelor')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <div class="col-12 mb-3">
                    <label for="category" class="form-label">category</label>
                    <select class="form-select" name="category" id="category">
                        <option value="" disabled selected>Select an option</option>
                        <option value="Thesis">Thesis</option>
                        <option value="Monograph">Monograph</option>
                    </select>
                </div>
                @error('category')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

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