@extends('dashboard.dashMaster')

@section('title','achievement')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
 <div class="pagetitle">
      <h1>General Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Others</li>
          <li class="breadcrumb-item active">Achievement</li>
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
                <h5 class="card-title">Achievements</h5>

                <button type="button" class="btn"><a href="{{ route('achievement.create') }}">Add Achievement</a></button>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($achievements as $achievement)
                  <tr>
                    <td>{{$achievement->id}}</td>
                    <td>{{$achievement->title}}</td>
                    <td>{{$achievement->description}}</td>
                    <td><img src="{{ asset('storage/' . $achievement->image) }}" width="100" height="60"></td>
                    <td><b><a href="{{ route('achievement.edit', $achievement->id) }}">Edit</a></b>
                      <form action="{{ route('achievement.destroy', $achievement->id) }}" method="POST" class="d-inline">
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