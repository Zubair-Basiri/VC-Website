@extends('dashboard.dashMaster')

@section('title','Policies')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Please Edit Policy required fields</h5>
                <button type="button" class="btn"><a href="{{ route('report.index') }}">Back</a></button>
            </div>
              <form action="{{ route('genPolicy.update', $genPolicy->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="col-12 mb-1">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $genPolicy->title }}">
                </div>

                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror


                <!-- OLD FILES + DELETE OPTIONS -->
                <div class="col-12 mt-3">
                    <label class="form-label">Existing PDF Files</label>

                    @if (!empty($genPolicy->pdf_files))
                        @foreach ($genPolicy->pdf_files as $index => $file)
                            <div class="d-flex justify-content-between align-items-center mb-2 border p-2 rounded">
                                <a href="{{ asset('storage/documents/' . $file) }}" target="_blank">
                                    {{ $file }}
                                </a>

                                <!-- checkbox for delete -->
                                <label class="text-danger">
                                    <input type="checkbox" name="delete_files[]" value="{{ $file }}">
                                    Delete
                                </label>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">No PDF files uploaded.</p>
                    @endif
                </div>


                <!-- UPLOAD NEW FILES -->
                <div class="col-12 mb-3">
                    <label class="form-label">Upload New PDF Files</label>
                    <div id="file-upload-container">
                        <div class="mb-2">
                            <input type="file" class="form-control" name="pdf_files[]">
                        </div>
                    </div>
                    <button type="button" id="add-file-btn" class="btn btn-sm btn-secondary mt-2">Add Another File</button>
                </div>

                @error('pdf_files.*')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror


                <!-- SUBMIT -->
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Save</button>
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

          newInputDiv.innerHTML = '<input type="file" class="form-control" name="pdf_files[]">';
          
          container.appendChild(newInputDiv);
      });
    </script>
@endsection