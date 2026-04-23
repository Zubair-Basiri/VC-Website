@extends('dashboard.dashMaster')

@section('title', 'Conference')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
<div class="pagetitle">
    <h1>Announcement Section</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Announcement</li>
            <li class="breadcrumb-item active">Conference</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            @session('success')
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endsession

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Conference</h5>
                        <button type="button" class="btn"><a href="{{ route('conference.create') }}">Add Conference</a></button>
                    </div>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>General Description</th>
                                <th>English Link</th>
                                <th>Pashto Link</th>
                                <th>Dari Link</th>
                                <th>Arabic Link</th>
                                <th>Poster English Link</th>
                                <th>Poster Pashto Link</th>
                                <th>Poster Dari Link</th>
                                <th>Poster Arabic Link</th>
                                <th>Image</th>
                                <th>Posters</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($conferences as $conference)
                                <tr>
                                    <td>{{ $conference->id }}</td>
                                    <td>{!! Purifier::clean($conference->genDescription) !!}</td>
                                    <td>
                                        @if($conference->enLink)
                                            <a href="{{ $conference->enLink }}" target="_blank">Link</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if($conference->psLink)
                                            <a href="{{ $conference->psLink }}" target="_blank">Link</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if($conference->daLink)
                                            <a href="{{ $conference->daLink }}" target="_blank">Link</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if($conference->arLink)
                                            <a href="{{ $conference->arLink }}" target="_blank">Link</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if($conference->posterEnLink)
                                            <a href="{{ $conference->posterEnLink }}" target="_blank">Link</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if($conference->posterPsLink)
                                            <a href="{{ $conference->posterPsLink }}" target="_blank">Link</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if($conference->posterDaLink)
                                            <a href="{{ $conference->posterDaLink }}" target="_blank">Link</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if($conference->posterArLink)
                                            <a href="{{ $conference->posterArLink }}" target="_blank">Link</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $conference->image) }}" width="80" height="50" style="object-fit: cover;">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#posterModal{{ $conference->id }}">
                                            View Posters
                                        </button>
                                    </td>
                                    <td>
                                        <b><a href="{{ route('conference.edit', $conference->id) }}">Edit</a></b>
                                        <form action="{{ route('conference.destroy', $conference->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background:none; border:none; padding:0; color:#ea1010; font-weight: bold;" onclick="return confirm('Are you sure you want to delete this conference?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Modal for posters --}}
                                <div class="modal fade" id="posterModal{{ $conference->id }}" tabindex="-1" aria-labelledby="posterModalLabel{{ $conference->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="posterModalLabel{{ $conference->id }}">The Images for Call for Papers</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @php
                                                    $posters = is_array($conference->posterImage) ? $conference->posterImage : json_decode($conference->posterImage, true);
                                                @endphp
                                                @if(!empty($posters))
                                                    <div class="row">
                                                        @foreach($posters as $poster)
                                                            <div class="col-md-6 mb-3">
                                                                <img src="{{ asset('storage/' . $poster) }}" class="img-fluid rounded shadow" alt="Poster">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <p class="text-muted">No posters uploaded for this conference.</p>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection