@extends('dashboard.dashMaster')

@section('title', 'Conference')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('conference.update', $conference->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Edit Conference</h5>
                <button type="button" class="btn"><a href="{{ route('conference.index') }}">Back</a></button>
            </div>

            {{-- General Description --}}
            <div class="col-12 mb-3">
                <label for="genDescription" class="form-label">General Description</label>
                <textarea name="genDescription" rows="5" class="form-control">{{ old('genDescription', $conference->genDescription) }}</textarea>
            </div>
            @error('genDescription')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            {{-- Language Links --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="enLink" class="form-label">English Link</label>
                    <input type="text" class="form-control" name="enLink" value="{{ old('enLink', $conference->enLink) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="psLink" class="form-label">Pashto Link</label>
                    <input type="text" class="form-control" name="psLink" value="{{ old('psLink', $conference->psLink) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="daLink" class="form-label">Dari Link</label>
                    <input type="text" class="form-control" name="daLink" value="{{ old('daLink', $conference->daLink) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="arLink" class="form-label">Arabic Link</label>
                    <input type="text" class="form-control" name="arLink" value="{{ old('arLink', $conference->arLink) }}">
                </div>
            </div>

            {{-- Poster Language Links --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="posterEnLink" class="form-label">Poster English Link</label>
                    <input type="text" class="form-control" name="posterEnLink" value="{{ old('posterEnLink', $conference->posterEnLink) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="posterPsLink" class="form-label">Poster Pashto Link</label>
                    <input type="text" class="form-control" name="posterPsLink" value="{{ old('posterPsLink', $conference->posterPsLink) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="posterDaLink" class="form-label">Poster Dari Link</label>
                    <input type="text" class="form-control" name="posterDaLink" value="{{ old('posterDaLink', $conference->posterDaLink) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="posterArLink" class="form-label">Poster Arabic Link</label>
                    <input type="text" class="form-control" name="posterArLink" value="{{ old('posterArLink', $conference->posterArLink) }}">
                </div>
            </div>

            {{-- Current Main Image --}}
            <div class="col-12 mb-3">
                <label class="form-label">Current Conference Image</label><br>
                <img src="{{ asset('storage/' . $conference->image) }}" width="150" height="100" style="object-fit: cover;" class="border rounded">
            </div>

            {{-- Upload New Main Image --}}
            <div class="col-12 mb-3">
                <label for="image" class="form-label">Upload New Image (optional)</label>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>
            @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            {{-- Current Poster Images --}}
            @php
                $posters = is_array($conference->posterImage) ? $conference->posterImage : json_decode($conference->posterImage, true);
            @endphp
            @if(!empty($posters))
                <div class="col-12 mb-3">
                    <label class="form-label">Current Poster Images</label>
                    <div class="row">
                        @foreach($posters as $poster)
                            <div class="col-md-3 mb-2">
                                <img src="{{ asset('storage/' . $poster) }}" class="img-fluid rounded border" style="height: 100px; object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                    <small class="text-warning">Uploading new posters will replace all existing ones.</small>
                </div>
            @endif

            {{-- Upload New Posters (up to 4) --}}
            <div class="col-12 mb-3">
                <label for="posterImage" class="form-label">Upload New Posters (Max 4, optional)</label>
                <input type="file" class="form-control" name="posterImage[]" accept="image/*" multiple>
                <small class="text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple. New uploads will replace old posters.</small>
            </div>
            @error('posterImage.*')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            @error('posterImage')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection