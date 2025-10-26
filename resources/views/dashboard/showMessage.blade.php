@extends('dashboard.dashMaster')

@section('title','messages')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
 <div class="pagetitle">
      <h1>Message Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Message</li>
          <li class="breadcrumb-item active">User List</li>
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
                <h5 class="card-title">Messages</h5>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($messages as $msg)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $msg->fname }} {{ $msg->lname }}</td>
                    <td>{{ $msg->email }}</td>
                    <td>{{ $msg->phone }}</td>
                    <td><textarea class="form-control" cols="15" rows="10" readonly>{{ $msg->message }}</textarea></td>
                    <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                      <form action="{{ route('messages.destroy', $msg->id) }}" method="POST" class="d-inline">
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