@extends('website.master')

@section('title','contactUs')

@section('header')
    @include('website.header')
@endsection

@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('images/VCLogomax.png') }}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-10">
              <h2 class="mb-0">Contact</h2>
              <p>For inquiries, collaborations, or support, please reach out to the VCAR through our official communication channels, we value your engagement in advancing research and innovation at Kandahar University.</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Contact</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('submitMessage') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 form-group" data-aos="fade-left" data-aos-delay="600">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-6 form-group" data-aos="fade-right" data-aos-delay="600">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group"data-aos="fade-left" data-aos-delay="600">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-6 form-group" data-aos="fade-right" data-aos-delay="600">
                        <label for="phone">Mobile No.</label>
                        <input type="text" name="phone" id="phone" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group" data-aos="zoom-in" data-aos-delay="1000">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Send Message" class="btn btn-primary btn-lg px-5">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection