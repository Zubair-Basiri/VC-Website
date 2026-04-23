@extends('website.master')

@section('title', 'Contact Us')

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
            <a href="{{ url('/') }}">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">Contact</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            {{-- COMMENTED OUT FORM SECTION
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
                    <div class="col-md-6 form-group" data-aos="fade-left" data-aos-delay="600">
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
            -- END COMMENTED OUT FORM SECTION --}}

            {{-- NEW CONTACT INFO & MAP SECTION --}}
            <div class="row">
                <div class="col-lg-6 mx-auto text-center mb-5" data-aos="fade-up">
                    <h3 class="section-title-underline">
                        <span>Contact Information</span>
                    </h3>
                    <div class="mt-4">
                        <p class="mb-3">
                            <i class="fas fa-envelope fa-lg text-primary mr-2"></i>
                            <a href="mailto:vicechancellor@kdru.edu.af">vicechancellor@kdru.edu.af</a>
                        </p>
                        <p>
                            <i class="fas fa-phone-alt fa-lg text-primary mr-2"></i>
                            <a href="tel:+93700450402">+93 700450402</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe 
                            class="embed-responsive-item" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1698.5286937423182!2d65.69604943856716!3d31.632279077260225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ed671899cf34771%3A0x2946be6523a86c78!2sKandahar%20university!5e0!3m2!1sen!2s!4v1774457858141!5m2!1sen!2s"
                            width="100%" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('website.footer')
@endsection