@extends('layouts.app')

@section('title', 'Home - FutureEngineers.pk')
@section('meta_description', 'FutureEngineers.pk connects engineering students and graduates in Pakistan with jobs, internships, scholarships, courses and CV resources.')
@section('body_class', 'index-page')

@php
    // Small helper: which "show" route + label a listing belongs to.
    $routeForType = function ($type) {
        return match ($type) {
            'job', 'internship' => 'jobs.show',
            'scholarship' => 'scholarships.show',
            'course' => 'courses.show',
            default => 'jobs.show',
        };
    };
    $labelForType = function ($type) {
        return match ($type) {
            'job' => 'Job',
            'internship' => 'Internship',
            'scholarship' => 'Scholarship',
            'course' => 'Course',
            default => ucfirst($type),
        };
    };

    $recentlyAdded = $recentListings->slice(0, 6);
    $popularResources = $recentListings->slice(6, 6);
@endphp

@section('content')

    <!-- Hero / Featured Opportunities Section -->
    <section id="blog-hero" class="blog-hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="hero-intro-band">
          <p class="hero-intro-eyebrow">FutureEngineers<span>.pk</span></p>
          <h1 class="hero-intro-title">Engineering Careers <span class="dot">•</span> Opportunities <span class="dot">•</span> Industry Insights</h1>
          <p class="hero-intro-sub">Verified jobs, internships, scholarships and courses for Pakistan's engineering students and graduates &mdash; updated every week.</p>
          <div class="hero-intro-actions">
            <a href="{{ route('jobs') }}" class="btn btn-primary">Browse Opportunities</a>
            <a href="{{ route('about') }}" class="btn btn-outline-light">Our Mission</a>
          </div>
        </div>

        <div class="blog-grid">

          <!-- Featured Item (Large) -->
          <article class="blog-item featured" data-aos="fade-up">
            <img src="{{ asset('assets/img/blog/blog-post-3.webp') }}" alt="Engineering internship opportunities" class="img-fluid">
            <div class="blog-content">
              <div class="post-meta">
                <span class="date">Updated Weekly</span>
                <span class="category">Internships</span>
              </div>
              <h2 class="post-title">
                @if($latestJob)
                  <a href="{{ route($routeForType($latestJob->type), $latestJob->id) }}" title="{{ $latestJob->title }}">{{ $latestJob->title }}</a>
                @else
                  <a href="{{ route('jobs') }}" title="Summer internship openings for engineering students">Summer internship openings for engineering students across Pakistan</a>
                @endif
              </h2>
            </div>
          </article><!-- End Featured Item -->

          <!-- Regular Items -->
          <article class="blog-item" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('assets/img/blog/blog-post-portrait-1.webp') }}" alt="Entry level engineering jobs" class="img-fluid">
            <div class="blog-content">
              <div class="post-meta">
                <span class="date">This Week</span>
                <span class="category">Jobs</span>
              </div>
              <h3 class="post-title">
                <a href="{{ route('jobs') }}" title="Entry-level engineering jobs">{{ $counts['jobs'] }} jobs &amp; internships open right now</a>
              </h3>
            </div>
          </article><!-- End Item -->

          <article class="blog-item" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('assets/img/blog/blog-post-9.webp') }}" alt="Engineering scholarships in Pakistan" class="img-fluid">
            <div class="blog-content">
              <div class="post-meta">
                <span class="date">Deadlines Soon</span>
                <span class="category">Scholarships</span>
              </div>
              <h3 class="post-title">
                @if($latestScholarship)
                  <a href="{{ route('scholarships.show', $latestScholarship->id) }}" title="{{ $latestScholarship->title }}">{{ $latestScholarship->title }}</a>
                @else
                  <a href="{{ route('scholarships') }}" title="Fully funded scholarships for engineering students">Fully funded scholarships for engineering students</a>
                @endif
              </h3>
            </div>
          </article><!-- End Item -->

          <article class="blog-item" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ asset('assets/img/blog/blog-post-7.webp') }}" alt="Engineering certification courses" class="img-fluid">
            <div class="blog-content">
              <div class="post-meta">
                <span class="date">New</span>
                <span class="category">Courses</span>
              </div>
              <h3 class="post-title">
                @if($latestCourse)
                  <a href="{{ route('courses.show', $latestCourse->id) }}" title="{{ $latestCourse->title }}">{{ $latestCourse->title }}</a>
                @else
                  <a href="{{ route('courses') }}" title="Industry recognised certification courses">Industry-recognised certification courses for engineers</a>
                @endif
              </h3>
            </div>
          </article><!-- End Item -->

          <article class="blog-item" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('assets/img/blog/blog-post-6.webp') }}" alt="Free CV templates for engineers" class="img-fluid">
            <div class="blog-content">
              <div class="post-meta">
                <span class="date">Free</span>
                <span class="category">CV Templates</span>
              </div>
              <h3 class="post-title">
                <a href="{{ route('cv-templates.index') }}" title="Free downloadable CV templates">Free, ready-to-use CV templates built for engineers</a>
              </h3>
            </div>
          </article><!-- End Item -->

        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- Latest Updates Section -->
    <section id="featured-posts" class="featured-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Latest Updates</h2>
        <div><span>Stay Informed With Our</span> <span class="description-title">Latest Updates</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="blog-posts-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 800,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 3,
              "spaceBetween": 30,
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 20
                },
                "768": {
                  "slidesPerView": 2,
                  "spaceBetween": 20
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 30
                }
              }
            }
          </script>

          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="blog-post-item">
                <img src="{{ asset('assets/img/blog/blog-post-portrait-1.webp') }}" alt="New internship listings">
                <div class="blog-post-content">
                  <div class="post-meta">
                    <span><i class="bi bi-briefcase"></i> Jobs &amp; Internships</span>
                    <span><i class="bi bi-clock"></i> {{ $counts['jobs'] }} open now</span>
                  </div>
                  <h2><a href="{{ route('jobs') }}">New internship listings added from leading engineering firms</a></h2>
                  <p>Browse verified internship openings from manufacturing, construction, energy and tech companies hiring engineering students.</p>
                  <a href="{{ route('jobs') }}" class="read-more">View Listings <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div><!-- End slide item -->

            <div class="swiper-slide">
              <div class="blog-post-item">
                <img src="{{ asset('assets/img/blog/blog-post-portrait-2.webp') }}" alt="Scholarship deadlines">
                <div class="blog-post-content">
                  <div class="post-meta">
                    <span><i class="bi bi-mortarboard"></i> Scholarships</span>
                    <span><i class="bi bi-clock"></i> {{ $counts['scholarships'] }} open now</span>
                  </div>
                  <h2><a href="{{ route('scholarships') }}">Undergraduate and postgraduate scholarships now open</a></h2>
                  <p>A curated list of merit-based and need-based scholarships for engineering students studying in Pakistan and abroad.</p>
                  <a href="{{ route('scholarships') }}" class="read-more">View Scholarships <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div><!-- End slide item -->

            <div class="swiper-slide">
              <div class="blog-post-item">
                <img src="{{ asset('assets/img/blog/blog-post-portrait-3.webp') }}" alt="New certification courses">
                <div class="blog-post-content">
                  <div class="post-meta">
                    <span><i class="bi bi-mortarboard"></i> Courses</span>
                    <span><i class="bi bi-clock"></i> {{ $counts['courses'] }} available</span>
                  </div>
                  <h2><a href="{{ route('courses') }}">Short courses and certifications to strengthen your resume</a></h2>
                  <p>From CAD software to project management, explore courses that help engineering graduates stand out.</p>
                  <a href="{{ route('courses') }}" class="read-more">View Courses <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div><!-- End slide item -->

            <div class="swiper-slide">
              <div class="blog-post-item">
                <img src="{{ asset('assets/img/blog/blog-post-portrait-4.webp') }}" alt="CV templates for engineers">
                <div class="blog-post-content">
                  <div class="post-meta">
                    <span><i class="bi bi-file-earmark-text"></i> CV Templates</span>
                    <span><i class="bi bi-clock"></i> Free downloads</span>
                  </div>
                  <h2><a href="{{ route('cv-templates.index') }}">Professionally formatted CV templates for every discipline</a></h2>
                  <p>Editable templates designed for civil, electrical, mechanical and software engineering applicants.</p>
                  <a href="{{ route('cv-templates.index') }}" class="read-more">Get Templates <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div><!-- End slide item -->

            <div class="swiper-slide">
              <div class="blog-post-item">
                <img src="{{ asset('assets/img/blog/blog-post-portrait-5.webp') }}" alt="About FutureEngineers.pk">
                <div class="blog-post-content">
                  <div class="post-meta">
                    <span><i class="bi bi-info-circle"></i> About Us</span>
                    <span><i class="bi bi-clock"></i> Our mission</span>
                  </div>
                  <h2><a href="{{ route('about') }}">Helping Pakistan's engineering students build their careers</a></h2>
                  <p>Learn more about why we built FutureEngineers.pk and how we vet every listing on the platform.</p>
                  <a href="{{ route('about') }}" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div><!-- End slide item -->
          </div>

        </div>

      </div>

    </section><!-- /Latest Updates Section -->

    <!-- Explore by Category Section -->
    <section id="category-section" class="category-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Explore by Category</h2>
        <div><span>Find What You</span> <span class="description-title">Need</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <!-- Featured Categories -->
        <div class="row gy-4 mb-4">
          <div class="col-lg-4">
            <article class="featured-post">
              <div class="post-img">
                <img src="{{ asset('assets/img/blog/blog-post-6.webp') }}" alt="Jobs and internships" class="img-fluid" loading="lazy">
              </div>
              <div class="post-content">
                <div class="category-meta">
                  <span class="post-category">Careers</span>
                </div>
                <h2 class="title">
                  <a href="{{ route('jobs') }}">{{ $counts['jobs'] }} Jobs &amp; Internships for engineering graduates and students</a>
                </h2>
              </div>
            </article>
          </div>

          <div class="col-lg-4">
            <article class="featured-post">
              <div class="post-img">
                <img src="{{ asset('assets/img/blog/blog-post-7.webp') }}" alt="Scholarships for engineering students" class="img-fluid" loading="lazy">
              </div>
              <div class="post-content">
                <div class="category-meta">
                  <span class="post-category">Funding</span>
                </div>
                <h2 class="title">
                  <a href="{{ route('scholarships') }}">{{ $counts['scholarships'] }} Scholarships to fund your engineering education</a>
                </h2>
              </div>
            </article>
          </div>

          <div class="col-lg-4">
            <article class="featured-post">
              <div class="post-img">
                <img src="{{ asset('assets/img/blog/blog-post-5.webp') }}" alt="Courses and certifications" class="img-fluid" loading="lazy">
              </div>
              <div class="post-content">
                <div class="category-meta">
                  <span class="post-category">Skills</span>
                </div>
                <h2 class="title">
                  <a href="{{ route('courses') }}">{{ $counts['courses'] }} Courses &amp; certifications to sharpen your skillset</a>
                </h2>
              </div>
            </article>
          </div>
        </div>

        <!-- Popular Resources (real listings) -->
        <div class="row">
          @forelse($popularResources as $listing)
            <div class="col-xl-4 col-lg-6">
              <article class="list-post">
                <div class="post-img">
                  <img src="{{ $listing->thumbnail ? asset($listing->thumbnail) : asset('assets/img/blog/blog-hero-2.webp') }}" alt="{{ $listing->title }}" class="img-fluid" loading="lazy">
                </div>
                <div class="post-content">
                  <div class="category-meta">
                    <span class="post-category">{{ $labelForType($listing->type) }}</span>
                  </div>
                  <h3 class="title">
                    <a href="{{ route($routeForType($listing->type), $listing->id) }}">{{ $listing->title }}</a>
                  </h3>
                  <div class="post-meta">
                    <span class="read-time">{{ $listing->location ?? ($listing->company_name ?? 'Apply now') }}</span>
                  </div>
                </div>
              </article>
            </div><!-- End item -->
          @empty
            <div class="col-12">
              <p class="text-center">No listings are available right now &mdash; check back soon.</p>
            </div>
          @endforelse
        </div>
      </div>

    </section><!-- /Explore by Category Section -->

    <!-- About / Mission Section -->
    <section id="call-to-action-2" class="call-to-action-2 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="advertise-1 d-flex flex-column flex-lg-row gap-4 align-items-center position-relative">

          <div class="content-left flex-grow-1" data-aos="fade-right" data-aos-delay="200">
            <span class="badge text-uppercase mb-2">Our Mission</span>
            <h2>Helping Pakistan's Future Engineers Build Their Careers</h2>
            <p class="my-4">FutureEngineers.pk brings together job listings, internships, scholarships, courses and CV resources in one place, so engineering students and graduates can focus on building their careers instead of searching for opportunities.</p>

            <div class="features d-flex flex-wrap gap-3 mb-4">
              <div class="feature-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Verified Listings</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Free Resources</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Updated Weekly</span>
              </div>
            </div>

            <div class="cta-buttons d-flex flex-wrap gap-3">
              <a href="{{ route('jobs') }}" class="btn btn-primary">Browse Opportunities</a>
              <a href="{{ route('about') }}" class="btn btn-outline">Learn More</a>
            </div>
          </div>

          <div class="content-right position-relative" data-aos="fade-left" data-aos-delay="300">
            <img src="{{ asset('assets/img/misc/misc-1.webp') }}" alt="Engineering students collaborating" class="img-fluid rounded-4">
            <div class="floating-card">
              <div class="card-icon">
                <i class="bi bi-graph-up-arrow"></i>
              </div>
              <div class="card-content">
                <span class="stats-number">{{ $counts['total'] }}+</span>
                <span class="stats-text">Opportunities Listed</span>
              </div>
            </div>
          </div>

          <div class="decoration">
            <div class="circle-1"></div>
            <div class="circle-2"></div>
          </div>

        </div>

      </div>

    </section><!-- /About / Mission Section -->

    <!-- Recently Added Section (real listings) -->
    <section id="latest-posts" class="latest-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Recently Added</h2>
        <div><span>Check Our</span> <span class="description-title">Recently Added</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

          @forelse($recentlyAdded as $listing)
            <div class="col-lg-4">
              <article>
                <div class="post-img">
                  <img src="{{ $listing->thumbnail ? asset($listing->thumbnail) : asset('assets/img/blog/blog-post-4.webp') }}" alt="{{ $listing->title }}" class="img-fluid">
                </div>
                <p class="post-category">{{ $labelForType($listing->type) }}</p>
                <h2 class="title">
                  <a href="{{ route($routeForType($listing->type), $listing->id) }}">{{ $listing->title }}</a>
                </h2>
              </article>
            </div><!-- End item -->
          @empty
            <div class="col-12">
              <p class="text-center">No listings are available right now &mdash; check back soon.</p>
            </div>
          @endforelse

        </div>
      </div>

    </section><!-- /Recently Added Section -->

    <!-- Newsletter Section -->
    <section id="call-to-action" class="call-to-action section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-between align-items-center">
          <div class="col-lg-6">
            <div class="cta-content" data-aos="fade-up" data-aos-delay="200">
              <h2>Get Weekly Career Updates</h2>
              <p>Subscribe to receive the latest engineering jobs, internships, scholarships and course listings straight to your inbox, every week.</p>
              <form action="{{ route('contact') }}" method="get" class="php-email-form cta-form" data-aos="fade-up" data-aos-delay="300">
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email address..." aria-label="Email address" aria-describedby="button-subscribe" required>
                  <button class="btn btn-primary" type="submit" id="button-subscribe">Subscribe</button>
                </div>
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your subscription request has been sent. Thank you!</div>
              </form>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="cta-image" data-aos="zoom-out" data-aos-delay="200">
              <img src="{{ asset('assets/img/cta/cta-1.webp') }}" alt="Subscribe for career updates" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Newsletter Section -->

@endsection
