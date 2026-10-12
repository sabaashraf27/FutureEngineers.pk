<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $listing->title }} - FutureEngineers.pk</title>

  <meta name="description"
    content="View detailed engineering job and internship opportunities on FutureEngineers.pk.">

  <meta name="keywords"
    content="engineering jobs Pakistan, engineering internships, job details, engineering careers">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>

  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Main CSS -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

</head>

<body class="job-details-page">

  <!-- =====================================================
       HEADER
  ====================================================== -->

  <header id="header" class="header sticky-top">

    <div class="container-fluid container-xl position-relative">

      <div class="top-row d-flex align-items-center justify-content-between">

        <a href="{{ url('/') }}" class="logo d-flex align-items-center">

          <h1 class="sitename" style="color: #FFFFFF;">
            FutureEngineers<span style="color: #F4C542;">.pk</span>
          </h1>

        </a>

        <div class="header-actions d-flex align-items-center">

          <a href="#" class="search-toggle"
            aria-label="Search FutureEngineers.pk">

            <i class="bi bi-search"></i>

          </a>

          <a href="https://chat.whatsapp.com/E6kjTG90j5VDZ4G5TMfj6V" target="_blank" rel="noopener" class="btn-join">
            Join Community
          </a>

        </div>

      </div>

    </div>

    <!-- Navigation -->

    <div class="nav-wrap">

      <div class="container d-flex justify-content-center position-relative">

        <nav id="navmenu"
          class="navmenu"
          aria-label="Primary navigation">

          <ul>

            <li>
              <a href="{{ url('/') }}">
                Home
              </a>
            </li>

            <li>
              <a href="{{ route('jobs') }}" class="active">
                Jobs &amp; Internships
              </a>
            </li>

            <li>
              <a href="{{ route('scholarships') }}">
                Scholarships
              </a>
            </li>

            <li>
              <a href="{{ route('courses') }}">
                Courses &amp; Certifications
              </a>
            </li>

            <li>
              <a href="{{ route('cv-templates.index') }}">
                CV Templates
              </a>
            </li>

            <li>
              <a href="{{ route('articles.index') }}">
                Industry News &amp; Trends
              </a>
            </li>

            <li>
              <a href="#">
                About
              </a>
            </li>

            <li>
              <a href="#">
                Contact
              </a>
            </li>

          </ul>

          <i
            class="mobile-nav-toggle d-xl-none bi bi-list"
            role="button"
            tabindex="0"
            aria-label="Toggle navigation menu"
            aria-controls="navmenu"
            aria-expanded="false">
          </i>

        </nav>

      </div>

    </div>

  </header>


  <!-- =====================================================
       MAIN
  ====================================================== -->

  
    <main class="main">

      <!-- Page Title -->
      <div class="page-title">
        <div class="breadcrumbs">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ url('/') }}">
                  <i class="bi bi-house"></i>
                  Home
                </a>
              </li>

              <li class="breadcrumb-item">
                <a href="{{ route('jobs') }}">
                  Jobs &amp; Internships
                </a>
              </li>

              <li class="breadcrumb-item active current">
                Job Details
              </li>
            </ol>
          </nav>
        </div>

        <div class="title-wrapper">
          <h1 id="page-job-title">
            {{ $listing->title }}
          </h1>

          <p>
            Explore the opportunity details and application information.
          </p>
        </div>
      </div>

      <!-- JOB DETAILS SECTION -->
      <section class="job-details section">
        <div class="container">

          <div class="row gy-5">

            <!-- LEFT CONTENT -->
            <div class="col-lg-8">

              <!-- Job Header -->
              <div class="job-detail-header">

                <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

                  <div>

                    <span
                      id="job-type-badge"
                      class="opportunity-badge {{ $listing->type === 'internship' ? 'badge-internship' : 'badge-job' }}">
                      {{ ucfirst($listing->type) }}
                    </span>

                    <h2 id="job-title" class="job-detail-title mt-3">
                      {{ $listing->title }}
                    </h2>

                    @if($listing->company_name)
                      <p id="job-company" class="opportunity-company">
                        {{ $listing->company_name }}
                      </p>
                    @endif

                  </div>

                </div>

                <!-- Job Meta -->
                <ul class="job-detail-meta">

                  @if($listing->location)
                  <li>
                    <i class="bi bi-geo-alt"></i>
                    <span id="job-location">
                      {{ $listing->location }}
                    </span>
                  </li>
                  @endif

                  <li>
                    <i class="bi bi-briefcase"></i>
                    <span id="job-employment">
                      {{ $listing->details['employment'] ?? 'Not specified' }}
                    </span>
                  </li>

                  <li>
                    <i class="bi bi-clock"></i>
                    <span id="job-posted">
                      {{ $listing->details['posted'] ?? ('Posted ' . $listing->created_at->diffForHumans()) }}
                    </span>
                  </li>

                </ul>

              </div>

              <!-- Description -->
              <div class="job-detail-content">

                <h3>Job Description</h3>

                <p id="job-description">
                  {{ $listing->details['description'] ?? $listing->description }}
                </p>

                @if(!empty($listing->details['responsibilities']))
                  <h3>Key Responsibilities</h3>
                  <ul id="job-responsibilities">
                    @foreach($listing->details['responsibilities'] as $item)
                      <li>{{ $item }}</li>
                    @endforeach
                  </ul>
                @endif

                @if(!empty($listing->details['requirements']))
                  <h3>Requirements</h3>
                  <ul id="job-requirements">
                    @foreach($listing->details['requirements'] as $item)
                      <li>{{ $item }}</li>
                    @endforeach
                  </ul>
                @endif

                @if(!empty($listing->details['skills']))
                  <h3>Preferred Skills</h3>
                  <div id="job-skills" class="job-skills">
                    @foreach($listing->details['skills'] as $skill)
                      <span>{{ $skill }}</span>
                    @endforeach
                  </div>
                @endif

                <div class="job-apply-box">
                  <h3>How to Apply</h3>

                  <p id="job-application">
                    {{ $listing->details['application'] ?? 'Interested candidates can apply using the application link below.' }}
                  </p>

                  @if($listing->apply_link && $listing->apply_link !== '#')
                    <a id="apply-button"
                       href="{{ $listing->apply_link }}"
                       target="_blank"
                       rel="noopener"
                       class="btn opportunity-btn">
                      Apply Now
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  @else
                    <a id="apply-button"
                       href="mailto:Futureengineers.pk@gmail.com?subject={{ rawurlencode('Application: ' . $listing->title) }}&body={{ rawurlencode('Hi FutureEngineers.pk team,' . "\n\n" . 'I would like to apply for the ' . $listing->title . ' position at ' . ($listing->company_name ?? 'the listed organization') . '.' . "\n\n" . 'Please find my CV attached.' . "\n\n" . 'Thank you.') }}"
                       class="btn opportunity-btn">
                      Apply Now
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  @endif

                </div>

              </div>
            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="col-lg-4">
              <aside class="jobs-sidebar widgets-container">

                <!-- Job Summary -->
                <div class="widget-item">

                  <h3 class="widget-title">Job Summary</h3>

                  <ul class="job-summary-list">

                    @if($listing->company_name)
                    <li>
                      <i class="bi bi-building"></i>
                      <div>
                        <strong>Company</strong>
                        <span id="summary-company">
                          {{ $listing->company_name }}
                        </span>
                      </div>
                    </li>
                    @endif

                    @if($listing->location)
                    <li>
                      <i class="bi bi-geo-alt"></i>
                      <div>
                        <strong>Location</strong>
                        <span id="summary-location">
                          {{ $listing->location }}
                        </span>
                      </div>
                    </li>
                    @endif

                    <li>
                      <i class="bi bi-briefcase"></i>
                      <div>
                        <strong>Employment</strong>
                        <span id="summary-employment">
                          {{ $listing->details['employment'] ?? 'Not specified' }}
                        </span>
                      </div>
                    </li>

                    <li>
                      <i class="bi bi-calendar"></i>
                      <div>
                        <strong>Posted</strong>
                        <span id="summary-posted">
                          {{ $listing->details['posted'] ?? $listing->created_at->diffForHumans() }}
                        </span>
                      </div>
                    </li>

                    <li>
                      <i class="bi bi-clock"></i>
                      <div>
                        <strong>Deadline</strong>
                        <span id="summary-deadline">
                          {{ $listing->deadline ? $listing->deadline->format('d F Y') : 'Not specified' }}
                        </span>
                      </div>
                    </li>

                  </ul>
                </div>

                <!-- Career Resources -->
                <div class="widget-item categories-widget">
                  <h3 class="widget-title">Career Resources</h3>

                  <ul>
                    <li>
                      <a href="{{ route('cv-templates.index') }}">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>CV Templates</span>
                      </a>
                    </li>

                    <li>
                      <a href="{{ route('courses') }}">
                        <i class="bi bi-mortarboard"></i>
                        <span>Courses &amp; Certifications</span>
                      </a>
                    </li>

                    <li>
                      <a href="{{ route('scholarships') }}">
                        <i class="bi bi-award"></i>
                        <span>Scholarships</span>
                      </a>
                    </li>

                    <li>
                      <a href="{{ route('articles.index') }}">
                        <i class="bi bi-newspaper"></i>
                        <span>Industry News &amp; Trends</span>
                      </a>
                    </li>
                  </ul>
                </div>

                <!-- CTA -->
                <div class="widget-item cta-widget">
                  <h3 class="widget-title">Find More Opportunities</h3>

                  <p>
                    Explore more engineering jobs and internships
                    across Pakistan.
                  </p>

                  <a href="{{ route('jobs') }}" class="btn">
                    Browse Jobs
                  </a>
                </div>

              </aside>
            </div>

          </div>
        </div>
      </section>

    </main>



  <!-- =====================================================
       FOOTER
  ====================================================== -->

  <footer id="footer" class="footer">

    <div class="container footer-top">

      <div class="row gy-4">


        <!-- About -->

        <div class="col-lg-4 col-md-6 footer-about">

          <a href="{{ url('/') }}"
            class="logo d-flex align-items-center">

            <span class="sitename">
              FutureEngineers.pk
            </span>

          </a>

          <div class="footer-contact pt-3">

            <p>
              Career development platform helping students &amp; fresh graduates become job-ready in Pakistan
            </p>

            <p class="mt-3">

              <strong>Phone:</strong>

              <span>
                +92 326 8462395
              </span>

            </p>

            <p>

              <strong>Email:</strong>

              <span>
                Futureengineers.pk@gmail.com
              </span>

            </p>

          </div>


          <div class="social-links d-flex mt-4">

            <a href="https://www.instagram.com/futureengineers.pk?igsh=M2Zxa3UxcWxxaW03&utm_source=qr"
              target="_blank" rel="noopener" aria-label="Instagram">

              <i class="bi bi-instagram"></i>

            </a>

            <a href="https://www.linkedin.com/company/futureengineers-pk/"
              target="_blank" rel="noopener" aria-label="LinkedIn">

              <i class="bi bi-linkedin"></i>

            </a>

          </div>

        </div>


        <!-- Explore -->

        <div class="col-lg-4 col-md-6 footer-links">

          <h4>
            Explore
          </h4>

          <ul>

            <li>
              <a href="{{ url('/') }}">
                Home
              </a>
            </li>

            <li>
              <a href="{{ route('jobs') }}">
                Jobs &amp; Internships
              </a>
            </li>

            <li>
              <a href="{{ route('scholarships') }}">
                Scholarships
              </a>
            </li>

            <li>
              <a href="{{ route('courses') }}">
                Courses &amp; Certifications
              </a>
            </li>

            <li>
              <a href="{{ route('cv-templates.index') }}">
                CV Templates
              </a>
            </li>

          </ul>

        </div>


        <!-- Company -->

        <div class="col-lg-4 col-md-12 footer-links">

          <h4>
            Company
          </h4>

          <ul>

            <li>
              <a href="#">
                About Us
              </a>
            </li>

            <li>
              <a href="#">
                Contact Us
              </a>
            </li>

            <li>
              <a href="#">
                Terms of Service
              </a>
            </li>

            <li>
              <a href="#">
                Privacy Policy
              </a>
            </li>

          </ul>

        </div>

      </div>

    </div>


    <div class="container copyright text-center mt-4">

      <p>

        ©
        <span>Copyright</span>

        <strong class="px-1 sitename">
          FutureEngineers.pk
        </strong>

        <span>
          All Rights Reserved
        </span>

      </p>

      <div class="credits">

        Built on a template by
        <a href="https://bootstrapmade.com/">
          BootstrapMade
        </a>

      </div>

    </div>

  </footer>


  <!-- Scroll Top -->

  <a href="#"
    id="scroll-top"
    class="scroll-top d-flex align-items-center justify-content-center">

    <i class="bi bi-arrow-up-short"></i>

  </a>


  <!-- Preloader -->

  <div id="preloader"></div>


  <!-- Vendor JS -->

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>


  <!-- Main JS -->

  <script src="{{ asset('assets/js/main.js') }}"></script>


  
</body>
</html>
