@extends('dashboard.dashMaster')

@section('title','academicJournals')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
 <div class="pagetitle">
      <h1>Departments Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Departments</li>
          <li class="breadcrumb-item active">Academic Journals</li>
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
                <h5 class="card-title">Journals</h5>

                <button type="button" class="btn"><a href="{{ route('academic.create') }}">Add Journal</a></button>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Info</th>
                    <th>Link</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($academics as $academic)
                    <tr>
                      <td>{{$academic->id}}</td>
                      <td>{{$academic->title}}</td>
                      <td>{{$academic->description}}</td>
                      <td>{{$academic->info}}</td>
                      <td><a href="{{$academic->link}}" target="_blank">{{$academic->link}}</a></td>
                      <td><b><a href="{{ route('academic.edit', $academic->id) }}">Edit</a></b>
                        <form action="{{ route('academic.destroy', $academic->id) }}" method="POST" class="d-inline">
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