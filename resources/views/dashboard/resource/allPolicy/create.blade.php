@extends('dashboard.dashMaster')

@section('title','Policy')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Add Policy required fields</h5>
                <button type="button" class="btn"><a href="{{ route('genPolicy.index') }}">Back</a></button>
            </div>
              <form action="{{ route('genPolicy.store') }}" method="POST" enctype="multipart/form-data">
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

                <div id="file-upload-container">
                    <div class="mb-2">
                        <input type="file" class="form-control" name="pdf_files[]">
                    </div>
                </div>
                @error('pdf_files.*')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror

                <button type="button" id="add-file-btn" class="btn btn-sm btn-secondary mt-2">
                    Add Another File
                </button>

                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
@endsection

@section('footer')
    @include('dashboard.dashFooter')
    <script>
      document.getElementById('add-file-btn').addEventListener('click', function() {
          let container = document.getElementById('file-upload-container');

          let newInputDiv = document.createElement('div');
          newInputDiv.classList.add('mb-2');

          let newInput = document.createElement('input');
          newInput.type = 'file';
          newInput.name = 'pdf_files[]';
          newInput.classList.add('form-control');

          newInputDiv.appendChild(newInput);
          container.appendChild(newInputDiv);
      });
    </script>
@endsection