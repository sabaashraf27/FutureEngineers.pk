<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'FutureEngineers.pk')</title>
  <meta name="description" content="@yield('meta_description', 'FutureEngineers.pk connects engineering students and graduates in Pakistan with jobs, internships, scholarships, courses and CV resources.')">
  <meta name="keywords" content="engineering jobs Pakistan, engineering internships, scholarships for engineers, engineering courses, CV templates">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <!-- FutureEngineers.pk Custom CSS (header/navigation only) -->
  <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Website: FutureEngineers.pk
  * Base Template: Blogy by BootstrapMade (https://bootstrapmade.com/blogy-bootstrap-blog-template/)
  * Base template license: https://bootstrapmade.com/license/
  * Customized for FutureEngineers.pk - a static frontend for engineering
  * jobs, internships, scholarships, courses and CV resources in Pakistan.
  ======================================================== -->
</head>

<body class="@yield('body_class', '')">

  <header id="header" class="header sticky-top">
    <div class="container-fluid container-xl position-relative">

      <div class="top-row d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="{{ asset('assets/img/logo.webp') }}" alt=""> -->
         <h1 class="sitename" style="color: #FFFFFF;"> FutureEngineers<span style="color: #F4C542;">.pk</span></h1>

        </a>

        <div class="header-actions d-flex align-items-center">
          <a href="#" class="search-toggle" aria-label="Search FutureEngineers.pk"><i class="bi bi-search"></i></a>
          <a href="https://chat.whatsapp.com/E6kjTG90j5VDZ4G5TMfj6V" target="_blank" rel="noopener" class="btn-join">Join Community</a>
        </div>
      </div>

    </div>

    <div class="nav-wrap">
      <div class="container d-flex justify-content-center position-relative">
        <nav id="navmenu" class="navmenu" aria-label="Primary navigation">
          <ul>
            <li><a href="{{ url('/') }}" @class(['active' => request()->routeIs('home')]) @if(request()->routeIs('home')) aria-current="page" @endif>Home</a></li>
            <li><a href="{{ route('jobs') }}" @class(['active' => request()->routeIs('jobs*')]) @if(request()->routeIs('jobs*')) aria-current="page" @endif>Jobs &amp; Internships</a></li>
            <li><a href="{{ route('scholarships') }}" @class(['active' => request()->routeIs('scholarships*')]) @if(request()->routeIs('scholarships*')) aria-current="page" @endif>Scholarships</a></li>
            <li><a href="{{ route('courses') }}" @class(['active' => request()->routeIs('courses*')]) @if(request()->routeIs('courses*')) aria-current="page" @endif>Courses &amp; Certifications</a></li>
            <li><a href="{{ route('cv-templates.index') }}" @class(['active' => request()->routeIs('cv-templates*')]) @if(request()->routeIs('cv-templates*')) aria-current="page" @endif>CV Templates</a></li>
            <li><a href="{{ route('articles.index') }}" @class(['active' => request()->routeIs('articles*')]) @if(request()->routeIs('articles*')) aria-current="page" @endif>Industry News &amp; Trends</a></li>
            <li><a href="{{ route('about') }}" @class(['active' => request()->routeIs('about')]) @if(request()->routeIs('about')) aria-current="page" @endif>About</a></li>
            <li><a href="{{ route('contact') }}" @class(['active' => request()->routeIs('contact')]) @if(request()->routeIs('contact')) aria-current="page" @endif>Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list" role="button" tabindex="0" aria-label="Toggle navigation menu" aria-controls="navmenu" aria-expanded="false"></i>
        </nav>
      </div>
    </div>

  </header>

  
    @yield('content')


  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <span class="sitename">FutureEngineers.pk</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Career development platform helping students &amp; fresh graduates become job-ready in Pakistan</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+92 326 8462395</span></p>
            <p><strong>Email:</strong> <span>Futureengineers.pk@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="https://www.instagram.com/futureengineers.pk?igsh=M2Zxa3UxcWxxaW03&utm_source=qr" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/company/futureengineers-pk/" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
          <h4>Explore</h4>
          <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('jobs') }}">Jobs &amp; Internships</a></li>
            <li><a href="{{ route('scholarships') }}">Scholarships</a></li>
            <li><a href="{{ route('courses') }}">Courses &amp; Certifications</a></li>
            <li><a href="{{ route('cv-templates.index') }}">CV Templates</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-links">
          <h4>Company</h4>
          <ul>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li><a href="{{ route('terms') }}">Terms of Service</a></li>
            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">FutureEngineers.pk</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- Base template: Blogy by BootstrapMade (https://bootstrapmade.com/) -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        Built on a template by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>



</body>

</html>
