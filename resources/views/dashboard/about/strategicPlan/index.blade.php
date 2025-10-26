@extends('dashboard.dashMaster')

@section('title','strategicPlan')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
 <div class="pagetitle">
      <h1>About Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">About</li>
          <li class="breadcrumb-item active">Strategic Plan</li>
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
                <h5 class="card-title">Strategic Plan</h5>

                <button type="button" class="btn"><a href="{{ route('strategicPlan.create') }}">Add Strategic Plan</a></button>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Description</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($strategicPlans as $strategicPlan)
                    <tr>
                      <td>{{$strategicPlan->id}}</td>
                      <td>{!!$strategicPlan->description!!}</td>
                      <td><b><a href="{{ route('strategicPlan.edit', $strategicPlan->id) }}">Edit</a></b></td>
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