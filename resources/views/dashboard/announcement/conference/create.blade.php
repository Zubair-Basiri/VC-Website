@extends('dashboard.dashMaster')

@section('title', 'conference')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('conference.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Add Conference</h5>
                <button type="button" class="btn"><a href="{{ route('conference.index') }}">Back</a></button>
            </div>

            {{-- General Description --}}
            <div class="col-12 mb-3">
                <label for="genDescription" class="form-label">General Description</label>
                <textarea name="genDescription" rows="5" class="form-control" placeholder="General Description"></textarea>
            </div>
            @error('genDescription')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            {{-- Language Links --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="enLink" class="form-label">English Link</label>
                    <input type="text" class="form-control" name="enLink">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="psLink" class="form-label">Pashto Link</label>
                    <input type="text" class="form-control" name="psLink">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="daLink" class="form-label">Dari Link</label>
                    <input type="text" class="form-control" name="daLink">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="arLink" class="form-label">Arabic Link</label>
                    <input type="text" class="form-control" name="arLink">
                </div>
            </div>

            {{-- Poster Language Links --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="posterEnLink" class="form-label">Poster English Link</label>
                    <input type="text" class="form-control" name="posterEnLink">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="posterPsLink" class="form-label">Poster Pashto Link</label>
                    <input type="text" class="form-control" name="posterPsLink">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="posterDaLink" class="form-label">Poster Dari Link</label>
                    <input type="text" class="form-control" name="posterDaLink">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="posterArLink" class="form-label">Poster Arabic Link</label>
                    <input type="text" class="form-control" name="posterArLink">
                </div>
            </div>

            {{-- Main Image --}}
            <div class="col-12 mb-3">
                <label for="image" class="form-label">Conference Image</label>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>
            @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            {{-- Poster Images (multiple) --}}
            <div class="col-12 mb-3">
                <label for="posterImage" class="form-label">Poster Images (Max 4)</label>
                <input type="file" class="form-control" name="posterImage[]" accept="image/*" multiple>
                <small class="text-muted">You can select up to 4 images. Hold Ctrl (Windows) or Cmd (Mac) to select multiple.</small>
            </div>
            @error('posterImage.*')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            @error('posterImage')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection