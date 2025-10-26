<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
    </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>


<div class="py-2" style="background-color: #064d94">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-lg-9 d-none d-lg-block">
            <img src="{{ asset('images/headerLogo.jpg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-lg-3 text-right">
        <a href="{{ route('login') }}" class="small btn btn-primary bgColorbtn px-4 py-2 rounded-0"><span class="icon-unlock-alt"></span> Log In</a>
        </div>
    </div>
    </div>
</div>
<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container">
    <div class="d-flex align-items-center">
        <div class="site-logo">
            <a href="index.html" class="d-block">
                <img src="{{ asset('images/VCLogo.jpg') }}" alt="Image" class="img-fluid">
            </a>
        </div>
        <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                    <a href="{{ route('home') }}" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                    <a href="#" class="nav-link text-left">About Us</a>
                    <ul class="dropdown">
                    <li><a href="{{ route('ourVision') }}">Our Vision</a></li>
                    <li><a href="{{ route('ourMission') }}">Our Mission</a></li>
                    <li><a href="{{ route('policies') }}">Policy</a></li>
                    <li><a href="{{ route('objective') }}">Objectives</a></li>
                    <li><a href="{{ route('priority') }}">Priorities</a></li>
                    <li><a href="{{ route('strategicPlans') }}">Strategic Plan</a></li>
                    <li><a href="{{ route('administrativeStaff') }}">Administrative Staffs</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#" class="nav-link text-left">Departments</a>
                    <ul class="dropdown">
                    <li><a href="{{ route('academicJournals') }}">Academic Journals</a></li>
                    <li><a href="{{ route('lab') }}">Laboratory</a></li>
                    <li><a href="{{ route('lib') }}">Library</a></li>
                    <li><a href="{{ route('rc') }}">Research Center</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#" class="nav-link text-left">Journals</a>
                    <ul class="dropdown">
                    <li><a href="https://ajss.kdru.edu.af/" target="_blank">Arghand Journal of Social Sciences</a></li>
                    <li><a href="https://gandhara.kdru.edu.af/" target="_blank">Gandhara Journal of Natural Sciences</a></li>
                    <li><a href="#">Mandigak Journal of Social Sciences</a></li>
                    <li><a href="#">Narang Journal of Natural Sciences</a></li>
                    <li><a href="https://rimj.org/pubs/index.php/journal">Razi Journal of Medical Sciences</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#" class="nav-link text-left">Announcement</a>
                    <ul class="dropdown">
                    <li><a href="{{ route('conferences') }}">Conferences</a></li>
                    <li><a href="{{ route('grants') }}">Grants</a></li>
                    <li><a href="{{ route('seminars') }}">Seminars</a></li>
                    <li><a href="{{ route('workshops') }}">Workshops</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#" class="nav-link text-left">Resources</a>
                    <ul class="dropdown">
                    <li><a href="{{ route('forums') }}">Forms</a></li>
                    <li><a href="{{ route('plans') }}">Plans</a></li>
                    <li><a href="{{ route('reports') }}">Reports</a></li>
                    <li><a href="{{ route('statistics') }}">Statistics</a></li>
                    <li class="has-children">
                        <a href="#" class="nav-link text-left">Publications</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('theses') }}">Theses</a></li>
                            <li><a href="{{ route('monographs') }}">Monograph</a></li>
                            <li><a href="{{ route('facultyLogo') }}">Academic Staffs Publications</a></li>
                            <li><a href="{{ route('digitalLibraries') }}">Digital Library</a></li>
                            <li><a href="{{ route('databases') }}">Free Research Databases</a></li>
                        </ul>
                    </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="nav-link text-left">Contact</a>
                </li>
                </ul>                                                                                                                                                                                                                                                                                          </ul>
            </nav>

        </div>
        <div class="ml-auto">
            <div class="social-wrap">
                <a href="#"><span class="icon-facebook"></span></a>
                <a href="#"><span class="fab fa-x-twitter"></span></a>
                <a href="#"><span class="fab fa-youtube"></span></a>

                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
        </div>
        
    </div>
    </div>

</header>