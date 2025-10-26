@extends('dashboard.dashMaster')

@section('title','research')

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
          <li class="breadcrumb-item active">Research</li>
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
                <h5 class="card-title">Research</h5>

                <button type="button" class="btn"><a href="{{ route('research.create') }}">Add Research Info</a></button>
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
                  @foreach ($researches as $research)
                    <tr>
                      <td>{{$research->id}}</td>
                      <td>{{$research->title}}</td>
                      <td>{{$research->description}}</td>
                      <td>{{$research->info}}</td>
                      <td><a href="{{$research->link}}" target="_blank">{{$research->link}}</a></td>
                      <td><b><a href="{{ route('research.edit', $research->id) }}">Edit</a></b>
                        <form action="{{ route('research.destroy', $research->id) }}" method="POST" class="d-inline">
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