@extends('dashboard.dashMaster')

@section('title','laboratory')

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
          <li class="breadcrumb-item active">Laboratory</li>
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
                <h5 class="card-title">Laboratory</h5>

                <button type="button" class="btn"><a href="{{ route('laboratory.create') }}">Add Laboratory Info</a></button>
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
                  @foreach ($laboratories as $laboratory)
                    <tr>
                      <td>{{$laboratory->id}}</td>
                      <td>{{$laboratory->title}}</td>
                      <td>{{$laboratory->description}}</td>
                      <td>{{$laboratory->info}}</td>
                      <td><a href="{{$laboratory->link}}" target="_blank">{{$laboratory->link}}</a></td>
                      <td><b><a href="{{ route('laboratory.edit', $laboratory->id) }}">Edit</a></b>
                        <form action="{{ route('laboratory.destroy', $laboratory->id) }}" method="POST" class="d-inline">
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