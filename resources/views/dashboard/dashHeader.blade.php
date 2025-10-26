  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{ asset('images/VCLogo.png') }}" alt="">
        <span class="d-none d-lg-block">VC Research</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/img/avatar.jpg') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

  </header>

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashHome') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>About</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('about.index')}}">
              <i class="bi bi-circle"></i><span>About Us</span>
            </a>
          </li>
          <li>
            <a href="{{ route('vision.index')}}">
              <i class="bi bi-circle"></i><span>Vision</span>
            </a>
          </li>
          <li>
            <a href="{{ route('mission.index')}}">
              <i class="bi bi-circle"></i><span>Mission</span>
            </a>
          </li>
          <li>
            <a href="{{ route('objectives.index')}}">
              <i class="bi bi-circle"></i><span>Objectives</span>
            </a>
          </li>
          <li>
            <a href="{{ route('policy.index')}}">
              <i class="bi bi-circle"></i><span>Policies</span>
            </a>
          </li>
          <li>
            <a href="{{ route('priorities.index')}}">
              <i class="bi bi-circle"></i><span>Priorities</span>
            </a>
          </li>
          <li>
            <a href="{{ route('strategicPlan.index')}}">
              <i class="bi bi-circle"></i><span>Strategic Plan</span>
            </a>
          </li>
          <li>
            <a href="{{ route('staff.index')}}">
              <i class="bi bi-circle"></i><span>Administrative Staffs</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Announcements</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('announcement.index') }}">
              <i class="bi bi-circle"></i><span>Announcements</span>
            </a>
          </li>
          <li>
            <a href="{{ route('conference.index') }}">
              <i class="bi bi-circle"></i><span>Conferences</span>
            </a>
          </li>
          <li>
            <a href="{{ route('grant.index') }}">
              <i class="bi bi-circle"></i><span>Grants</span>
            </a>
          </li>
          <li>
            <a href="{{ route('seminar.index') }}">
              <i class="bi bi-circle"></i><span>Seminars</span>
            </a>
          </li>
          <li>
            <a href="{{ route('workshop.index') }}">
              <i class="bi bi-circle"></i><span>Workshops</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Departments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('academic.index') }}">
              <i class="bi bi-circle"></i><span>Academic Journals</span>
            </a>
          </li>
          <li>
            <a href="{{ route('laboratory.index') }}">
              <i class="bi bi-circle"></i><span>Laboratory</span>
            </a>
          </li>
          <li>
            <a href="{{ route('library.index') }}">
              <i class="bi bi-circle"></i><span>Library</span>
            </a>
          </li>
          <li>
            <a href="{{ route('research.index') }}">
              <i class="bi bi-circle"></i><span>Research Center</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Resources</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('forum.index') }}">
              <i class="bi bi-circle"></i><span>Forums</span>
            </a>
          </li>
          <li>
            <a href="{{ route('plan.index') }}">
              <i class="bi bi-circle"></i><span>Plans</span>
            </a>
          </li>
          <li>
            <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#publications-submenu" href="#">
              <i class="bi bi-circle"></i><span>Publications</span><i class="bi bi-chevron-down ms-auto fs-5"></i>
            </a>
            <ul id="publications-submenu" class="nav-content collapse ps-4">
              <li>
                <a href="{{ route('paper.index') }}"><i class="bi bi-circle"></i><span>Theses or Monograph</span></a>
              </li>
              <li>
                <a href="{{ route('publication.index') }}"><i class="bi bi-circle"></i><span>Academic Staff Publications</span></a>
              </li>
              <li>
                <a href="{{ route('digital.index') }}"><i class="bi bi-circle"></i><span>Digital Library</span></a>
              </li>
              <li>
                <a href="{{ route('database.index') }}"><i class="bi bi-circle"></i><span>Free Databases</span></a>
              </li>
              <li>
                <a href="{{ route('showLogo') }}"><i class="bi bi-circle"></i><span>Faculty Logos</span></a>
              </li>
            </ul>
          </li>
          <li>
            <a href="{{ route('report.index') }}">
              <i class="bi bi-circle"></i><span>Reports</span>
            </a>
          </li>
          <li>
            <a href="{{ route('statistic.index') }}">
              <i class="bi bi-circle"></i><span>Statistics</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-list"></i><span>Others</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('carousel.index') }}">
              <i class="bi bi-circle"></i><span>Carousel</span>
            </a>
          </li>
          <li>
            <a href="{{ route('testimonial.index') }}">
              <i class="bi bi-circle"></i><span>Testimonial</span>
            </a>
          </li>
          <li>
            <a href="{{ route('gallery.index') }}">
              <i class="bi bi-circle"></i><span>Gallery</span>
            </a>
          </li>
          <li>
            <a href="{{ route('achievement.index') }}">
              <i class="bi bi-circle"></i><span>Achievements</span>
            </a>
          </li>
          <li>
            <a href="{{ route('video.index') }}">
              <i class="bi bi-circle"></i><span>Viedo</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-heading">General</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('messages') }}">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard.userList') }}">
          <i class="bi bi-card-list"></i>
          <span>Users</span>
        </a>
      </li>

    </ul>

  </aside>