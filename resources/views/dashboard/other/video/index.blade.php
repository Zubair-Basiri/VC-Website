@extends('dashboard.dashMaster')

@section('title','video')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
<div class="container mt-5">
    <h2>Upload Home Page Video</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Upload Video (MP4, MOV, WEBM)</label>
            <input type="file" name="video" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Upload</button>
    </form>

    <hr>

    <h3>Uploaded Videos</h3>
    <ul>
        <video autoplay muted loop playsinline style="width: 1000px; height: 550px; object-fit: cover;">
            <source src="{{ asset('storage/' . $videos->video) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </ul>
</div>
@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection