@extends('dashboard.dashMaster')

@section('title','mission')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
 <div class="pagetitle">
      <h1>About Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">About</li>
          <li class="breadcrumb-item active">Mission</li>
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
                <h5 class="card-title">Our Mission</h5>

                <button type="button" class="btn"><a href="{{ route('mission.create') }}">Add Mission</a></button>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Description</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($missions as $mission)
                    <tr>
                      <td>{{$mission->id}}</td>
                      <td>{!!$mission->description!!}</td>
                      <td><b><a href="{{ route('mission.edit', $mission->id) }}">Edit</a></b></td>
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