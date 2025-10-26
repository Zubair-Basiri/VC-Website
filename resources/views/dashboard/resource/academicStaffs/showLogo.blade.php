@extends('dashboard.dashMaster')

@section('title','faculty Logo')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
 <div class="pagetitle">
      <h1>Resource Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Resources</li>
          <li class="breadcrumb-item active">Faculty Logo</li>
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
                <h5 class="card-title">Faculty Logos</h5>

                <button type="button" class="btn"><a href="{{ route('addLogo') }}">Add Faculty Logo</a></button>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Faculty Name</th>
                    <th>Logo</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($logos as $logo)
                    <tr>
                      <td>{{$logo->id}}</td>
                      <td>{{$logo->faculty}}</td>
                      <td><img src="{{ asset('storage/' . $logo->logo) }}" width="100" height="60"></td>
                      <td><b><a href="{{ route('editLogo', $logo->id) }}">Edit</a></b>
                        <form action="{{ route('deleteLogo', $logo->id) }}" method="POST" class="d-inline">
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