@extends('dashboard.dashMaster')

@section('title', 'Dashboard')

@section('header')
    @include('dashboard.dashHeader')
@endsection

@section('content')
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-2">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form action="{{ route('registerForm') }}" method="POST" class="row g-3 needs-validation" novalidate>
                    @csrf

                    <div class="col-12">
                      <label for="name" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="name" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    @error('name')
                      <div class="alert alert-danger mt-2">
                          {{ $message }}
                      </div>
                    @enderror

                    <div class="col-12">
                      <label for="email" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                    @error('email')
                      <div class="alert alert-danger mt-2">
                          {{ $message }}
                      </div>
                    @enderror

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required minlength="8">
                      <div class="invalid-feedback">Please enter your password minimum 8 characters!</div>
                    </div>

                    <div class="col-12">
                      <label for="password_confirmation" class="form-label">Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" required id="password_confirmation">
                      <div class="invalid-feedback">Please re-enter your password for Confirmation!</div>
                    </div>
                    @error('password')
                      <div class="alert alert-danger mt-2">
                          {{ $message }}
                      </div>
                    @enderror

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>

@endsection

@section('footer')
    @include('dashboard.dashFooter')
@endsection