@extends('dashboard.dashMaster')

@section('title','freeDatabase')

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
          <li class="breadcrumb-item active">Free Database</li>
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
                <h5 class="card-title">Free Databases</h5>

                <button type="button" class="btn"><a href="{{ route('database.create') }}">Add Free Database Link</a></button>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>info</th>
                    <th>Link</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($databases as $database)
                    <tr>
                      <td>{{$database->id}}</td>
                      <td>{{$database->title}}</td>
                      <td>{{$database->description}}</td>
                      <td>{{$database->info}}</td>
                      <td>{{$database->Link}}</td>
                      <td><b><a href="{{ route('database.edit', $database->id) }}">Edit</a></b>
                        <form action="{{ route('database.destroy', $database->id) }}" method="POST" class="d-inline">
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