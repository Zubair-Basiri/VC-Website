@extends('dashboard.dashMaster')

@section('title','testimonial')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
 <div class="pagetitle">
      <h1>General Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Others</li>
          <li class="breadcrumb-item active">Testimonial</li>
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
                <h5 class="card-title">Testimonials</h5>

                <button type="button" class="btn"><a href="{{ route('testimonial.create') }}">Add testimonial</a></button>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Message</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($testimonials as $testimonial)
                  <tr>
                    <td>{{$testimonial->id}}</td>
                    <td>{{$testimonial->name}}</td>
                    <td>{{$testimonial->position}}</td>
                    <td>{{$testimonial->message}}</td>
                    <td><b><a href="{{ route('testimonial.edit', $testimonial->id) }}">Edit</a></b>
                      <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST" class="d-inline">
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