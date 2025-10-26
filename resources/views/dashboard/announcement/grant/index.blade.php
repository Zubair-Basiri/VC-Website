@extends('dashboard.dashMaster')

@section('title','grants')

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
          <li class="breadcrumb-item active">Grants</li>
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
                <h5 class="card-title">Grants</h5>

                <button type="button" class="btn"><a href="{{ route('grant.create') }}">Add Grants</a></button>
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
                  @foreach ($grants as $grant)
                    <tr>
                      <td>{{$grant->id}}</td>
                      <td>{{$grant->title}}</td>
                      <td>{!!$grant->description!!}</td>
                      <td><b><a href="{{ route('grant.edit', $grant->id) }}">Edit</a></b>
                        <form action="{{ route('grant.destroy', $grant->id) }}" method="POST" class="d-inline">
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