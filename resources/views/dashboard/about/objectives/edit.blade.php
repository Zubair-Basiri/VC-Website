@extends('dashboard.dashMaster')

@section('title','objectives')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <form action="{{ route('objectives.update', $objective->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-between">
                  <h5 class="card-title">Edit Description for Objectives</h5>
                  <button type="button" class="btn"><a href="{{ route('objectives.index') }}">Back</a></button>
                </div>
                <!-- TinyMCE Editor -->
                <textarea name="description" class="tinymce-editor">
                  {{ $objective->description }}
                </textarea><!-- End TinyMCE Editor -->
                <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection