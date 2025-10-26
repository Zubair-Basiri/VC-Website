@extends('dashboard.dashMaster')

@section('title','strategicPlan')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')

          <div class="card">
            <div class="card-body">
              <form action="{{ route('strategicPlan.store') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-between">
                  <h5 class="card-title">Add Description for Strategic Plan</h5>
                  <button type="button" class="btn"><a href="{{ route('strategicPlan.index') }}">Back</a></button>
                </div>
                <!-- TinyMCE Editor -->
                <textarea name="description" class="tinymce-editor">

                </textarea><!-- End TinyMCE Editor -->

                <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection