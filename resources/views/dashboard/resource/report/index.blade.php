@extends('dashboard.dashMaster')

@section('title','report')

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
          <li class="breadcrumb-item active">Report</li>
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
                <h5 class="card-title">Reports</h5>

                <button type="button" class="btn"><a href="{{ route('report.create') }}">Add Report</a></button>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>PDF Files</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($reports as $report)
                    <tr>
                      <td>{{$report->id}}</td>
                      <td>{{$report->title}}</td>
                      <td><a href="{{ asset('storage/' . $report->pdfFile) }}" target="_blank">View File</a></td>
                      <td><b><a href="{{ route('report.edit', $report->id) }}">Edit</a></b>
                        <form action="{{ route('report.destroy', $report->id) }}" method="POST" class="d-inline">
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