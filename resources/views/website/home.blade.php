@extends('website.master')

@section('title', 'Home')

@section('header')
    @include('website.header')
@endsection

@section('content')

<div class="site-section video-section">
    <video autoplay muted loop playsinline>
        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

<div class="hero-slide owl-carousel site-blocks-cover">
    @foreach ($carousels as $carousel)
        <div>
            <img src="{{ asset('storage/' . $carousel->image) }}" class="intro-section"/>
        </div>
    @endforeach
</div>

<div class="site-section" data-aos="fade-up">
    <div class="container">
    <div class="row mb-4 justify-content-center text-center" data-aos="fade-down" data-aos-delay="600">
        <div class="col-lg-4 mb-4">
        <h2 class="section-title-underline mb-5">
            <span>What We Provide?</span>
        </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="zoom-in" data-aos-delay="800">

        <div class="feature-1 border">
            <div class="icon-wrapper bg-color">
            <span class="flaticon-library text-white"></span>
            </div>
            <div class="feature-1-content">
            <h2>Research Development & Grants</h2>
            <p>Facilitates research projects, funding opportunities, and academic collaborations to strengthen the university's research ecosystem.</p>
            </div>
        </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="zoom-in" data-aos-delay="1000">
        <div class="feature-1 border">
            <div class="icon-wrapper bg-color">
            <span class="flaticon-books text-white"></span>
            </div>
            <div class="feature-1-content">
            <h2>Journals and Publications</h2>
            <p>Oversees academic journals, peer-review systems, indexing and supports faculty in publishing high quality research.</p>
            </div>
        </div> 
        </div>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="zoom-in" data-aos-delay="1200">
        <div class="feature-1 border">
            <div class="icon-wrapper bg-color">
            <span class="flaticon-university text-white"></span>
            </div>
            <div class="feature-1-content">
            <h2>Innovation and Capacity Building</h2>
            <p>Promotes research centers, innovation hubs, and training programs to enhance faculty and student research skills.</p>
            </div>
        </div> 
        </div>
    </div>
    </div>
</div>


<div class="site-section" data-aos="fade-up">
    <div class="container">
    <div class="row justify-content-center text-center" data-aos="fade-down" data-aos-delay="600">
        <div class="col-lg-12">
        <h2 class="section-title-underline mb-3">
            <span>Achievements</span>
        </h2>
        <p>The <strong>Vice Chancellory of Academic Research</strong> proudly hosts <strong>two national</strong> and <strong>two international research journals</strong>, maintains a <strong>comprehensive research publications database</strong> for all academic staff, and oversees the <strong>Central Library</strong>, <strong>Central Laboratory</strong>, and <strong>Research Parks</strong> serving as key pillars in advancing research, innovation, and academic excellence at Kandahar University.</p>
        </div>
    </div>

    <div class="row" data-aos="fade-up">
        <div class="col-12">
            <div class="owl-slide-3 owl-carousel">
                @foreach ($achievements as $achievement)
                    <div class="course-1-item" data-aos="flip-left">
                        <figure class="thumnail">
                            <a href="course-single.html"><img src="{{ asset('storage/' . $achievement->image) }}" alt="Image" class="img-fluid"></a>
                            <div class="category"><h3>{{$achievement->title}}</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                            <p class="desc mb-4">{{$achievement->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>




<div class="section-bg style-1" style="background-image: url('images/about_1.jpg');" data-aos="fade-up">
    <div class="container">
    <div class="row">
        <div class="col-lg-4" data-aos="fade-right" data-aos-delay="400">
        <h2 class="section-title-underline style-2">
            <span>About The Vice-Chancellery of Research</span>
        </h2>
        </div>
        <div class="col-lg-8" data-aos="fade-left" data-aos-delay="600">
        <p style="color:white;">{{ \Illuminate\Support\Str::limit(strip_tags($abouts->description), 500, '...') }}</p>
        <p><a href="{{ route('aboutUs') }}">Read more</a></p>
        </div>
    </div>
    </div>
</div>

<div class="site-section" data-aos="fade-up">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-4" data-aos="fade-right" data-aos-delay="400">
            <h2 class="section-title-underline">
                <span>Testimonials</span>
            </h2>
            </div>
        </div>
        <div class="owl-slide owl-carousel">
            @foreach ($testimonials as $testimonial)
                <div class="ftco-testimonial-1" data-aos="zoom-in" data-aos-delay="600">
                    <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                        <img src="{{ asset('images/avatar.jpg') }}" alt="Image" class="img-fluid mr-3">
                        <div>
                        <h3>{{$testimonial->name}}</h3>
                        <span>{{$testimonial->position}}</span>
                        </div>
                    </div>
                    <div>
                        <p>&ldquo;{{$testimonial->message}}&rdquo;</p>
                    </div>
                </div>
            @endforeach
        </div> 
    </div>
</div>


<div class="section-bg style-1" style="background-image: url('{{ asset('images/VCLogomax.png') }}');" data-aos="fade-up">
    <div class="container">
        <h2 style="color:white; z-index: 1; position: absolute; margin-top: -40px;">Gallary</h2>
    <div class="row">
        @php $var = 600; @endphp
        @foreach ($galleries as $gallery)
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0" data-aos="zoom-out" data-aos-delay="{{$var}}">
                <img src="{{ asset('storage/' . $gallery->image) }}" class="img-fluid">
            </div>
            @php $var += 200; @endphp
        @endforeach
    </div>
    <p style="color: #51be78; position: absolute; float: right;"><a href="{{ route('galleryCollection') }}">See More ...</a></p>
    </div>
</div>

<div class="news-updates" data-aos="fade-up">
    <div class="container">
        
    <div class="row">
        <div class="col-lg-12" data-aos="fade-down" data-aos-delay="200">
            <div class="section-heading">
            <h2 class="text-black">Announcements</h2>
            <a href="{{ route('news') }}">Read All News</a>
        </div>
        <div class="row d-flex">
            @foreach ($announcements as $announcement)
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="600">
                    <div class="post-entry-big horizontal">
                        <div class="image-container position-relative">
                            <a href="{{ asset('storage/' . $announcement->image) }}" class="glightbox" data-gallery="gallery1">
                                <img src="{{ asset('storage/' . $announcement->image) }}" alt="Image" class="img-fluid">
                                <div class="overlay">
                                <i class="fas fa-eye"></i>
                                </div>
                            </a>
                        </div>
                        <div class="post-content">
                        <div class="post-meta">
                            <a>{{$announcement->created_at}}</a>
                            <span class="mx-1">/</span>
                            <a href="#">{{$announcement->title}}</a>
                        </div>
                        <h3 class="post-heading"><a>{{ \Illuminate\Support\Str::limit(strip_tags($announcement->description), 100, '...') }}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        </div>
    </div>
    </div>
</div> 
@endsection

@section('footer')
    @include('website.footer')
@endsection