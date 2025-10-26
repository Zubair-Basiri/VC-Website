@extends('dashboard.dashMaster')

@section('title','academicStaffs')

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
          <li class="breadcrumb-item active">Academic Staffs Publication</li>
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
                <h5 class="card-title">Academic Staffs Publications</h5>

                <button type="button" class="btn"><a href="{{ route('publication.create') }}">Add Staffs Publication</a></button>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Lecturers</th>
                    <th>Faculties</th>
                    <th>Category</th>
                    <th>PDF</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($publications as $publication)
                    <tr>
                      <td>{{$publication->id}}</td>
                      <td>{{$publication->title}}</td>
                      <td>{{$publication->lecturer}}</td>
                      <td>{{$publication->faculty}}</td>
                      <td>{{$publication->category}}</td>
                      <td><a href="{{ asset('storage/' . $publication->file) }}" target="_blank">View File</a></td>
                      <td><b><a href="{{ route('publication.edit', $publication->id) }}">Edit</a></b>
                        <form action="{{ route('publication.destroy', $publication->id) }}" method="POST" class="d-inline">
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