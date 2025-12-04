@extends('dashboard.dashMaster')

@section('title','Policies')

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
          <li class="breadcrumb-item active">Policy</li>
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
                <h5 class="card-title">Policies</h5>

                <button type="button" class="btn"><a href="{{ route('genPolicy.create') }}">Add Policy</a></button>
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
                    @foreach ($genPolicies as $genPolicy)
                        <tr>
                            <td>{{ $genPolicy->id }}</td>
                            <td>{{ $genPolicy->title }}</td>
                            <td>
                                @if (!empty($genPolicy->pdf_files))
                                    @foreach ($genPolicy->pdf_files as $file)
                                        <a 
                                            href="{{ asset('storage/documents/' . $file) }}" 
                                            target="_blank"
                                            class="d-block"
                                        >
                                            {{ $file }}
                                        </a>
                                    @endforeach
                                @else
                                    <span class="text-muted">No files</span>
                                @endif
                            </td>

                            <td>
                                <b><a href="{{ route('genPolicy.edit', $genPolicy->id) }}">Edit</a></b>

                                <form action="{{ route('genPolicy.destroy', $genPolicy->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            style="background:none; border:none; padding:0; color:#ea1010; font-weight: bold;"
                                            onclick="return confirm('Are you sure you want to delete this Policy?')">
                                        Delete
                                    </button>
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