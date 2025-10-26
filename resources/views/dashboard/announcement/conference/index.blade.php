@extends('dashboard.dashMaster')

@section('title','conference')

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
                    <th>Title</th>
                    <th>Description</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($conferences as $conference)
                    <tr>
                      <td>{{$conference->id}}</td>
                      <td>{{$conference->title}}</td>
                      <td>{!!$conference->description!!}</td>
                      <td><b><a href="{{ route('conference.edit', $conference->id) }}">Edit</a></b>
                        <form action="{{ route('conference.destroy', $conference->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; padding:0; color:#ea1010; font-weight: bold;" onclick="return confirm('Are you sure you want to delete this staff?')">Delete</button>
                      </form>
                      </td>
                    </tr>
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