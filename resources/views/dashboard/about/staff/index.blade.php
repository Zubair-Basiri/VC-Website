@extends('dashboard.dashMaster')

@section('title','staff')

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
          <li class="breadcrumb-item active">Administrative Staffs</li>
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
                <h5 class="card-title">Administrative Staffs</h5>

                <button type="button" class="btn"><a href="{{ route('staff.create') }}">Add Staff</a></button>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Description</th>
                    <th>Email</th>
                    <th>Academic Profile</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($staffs as $staff)
                  <tr>
                    <td>{{$staff->id}}</td>
                    <td>{{$staff->name}}</td>
                    <td>{{$staff->position}}</td>
                    <td>{!!$staff->description!!}</td>
                    <td>{{$staff->email}}</td>
                    <td>{{$staff->academic_profile}}</td>
                    <td><b><a href="{{ route('staff.edit', $staff->id) }}">Edit</a></b>
                      <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" class="d-inline">
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