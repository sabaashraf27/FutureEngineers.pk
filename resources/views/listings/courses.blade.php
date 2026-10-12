@extends('layouts.app')

@section('body_class', 'courses-page')

@section('content')
<style>

    /* ---------- Course Filters ---------- */
    .course-filters {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 24px;
      margin-bottom: 40px;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
    }

    .course-filters .filter-label {
      font-size: 13px;
      font-weight: 600;
      color: var(--heading-color, #222);
      margin-bottom: 6px;
      display: block;
    }

    .course-filters .form-control,
    .course-filters .form-select {
      border-radius: 8px;
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 80%);
      font-size: 14.5px;
      padding: 10px 12px;
    }

    .course-filters .form-control:focus,
    .course-filters .form-select:focus {
      border-color: var(--accent-color, #0d6efd);
      box-shadow: 0 0 0 3px color-mix(in srgb, var(--accent-color, #0d6efd), transparent 80%);
    }

    .course-filters .btn-filter-search {
      background-color: var(--accent-color, #0d6efd);
      border: none;
      color: var(--contrast-color, #fff);
      font-weight: 600;
      border-radius: 8px;
      padding: 10px 22px;
      transition: 0.3s;
    }

    .course-filters .btn-filter-search:hover {
      filter: brightness(0.92);
    }

    .course-filters .btn-filter-reset {
      background-color: transparent;
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 70%);
      color: var(--default-color, #212529);
      font-weight: 600;
      border-radius: 8px;
      padding: 10px 22px;
      transition: 0.3s;
    }

    .course-filters .btn-filter-reset:hover {
      background-color: color-mix(in srgb, var(--default-color, #212529), transparent 94%);
    }

    /* ---------- Featured Course ---------- */
    .featured-course {
      background: linear-gradient(135deg, color-mix(in srgb, var(--accent-color, #0d6efd), transparent 88%), var(--surface-color, #fff));
      border: 1px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 75%);
      border-radius: 14px;
      padding: 32px;
      margin-bottom: 45px;
      display: flex;
      flex-wrap: wrap;
      gap: 28px;
      align-items: center;
    }

    .featured-course .featured-img {
      flex: 0 0 280px;
      max-width: 280px;
      border-radius: 10px;
      overflow: hidden;
    }

    .featured-course .featured-img img {
      width: 100%;
      height: 190px;
      object-fit: cover;
      display: block;
    }

    .featured-course .featured-content {
      flex: 1 1 320px;
    }

    .featured-course .featured-ribbon {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff);
      font-size: 12.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      padding: 6px 14px;
      border-radius: 30px;
      margin-bottom: 14px;
    }

    .featured-course h2 {
      font-size: 25px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 6px;
    }

    .featured-course .provider {
      font-size: 15px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
      margin-bottom: 12px;
      font-weight: 500;
    }

    .featured-course .featured-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin: 16px 0;
      font-size: 14px;
    }

    .featured-course .featured-meta span {
      display: flex;
      align-items: center;
      gap: 6px;
      color: var(--default-color, #212529);
    }

    .featured-course .featured-meta i {
      color: var(--accent-color, #0d6efd);
    }

    .btn-view-course {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff) !important;
      font-weight: 600;
      font-size: 14.5px;
      padding: 11px 24px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s;
      border: none;
      margin-top: 6px;
    }

    .btn-view-course:hover {
      filter: brightness(0.92);
      color: var(--contrast-color, #fff);
    }

    /* ---------- Status / type badges ---------- */
    .type-badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: 11.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.4px;
      padding: 5px 11px;
      border-radius: 30px;
      margin-right: 6px;
      margin-bottom: 6px;
    }

    .badge-featured { background-color: rgba(13, 110, 253, 0.12); color: #0d6efd; }
    .badge-popular { background-color: rgba(255, 159, 28, 0.15); color: #b26a00; }
    .badge-beginner { background-color: rgba(25, 135, 84, 0.12); color: #198754; }
    .badge-certificate { background-color: rgba(111, 66, 193, 0.12); color: #6f42c1; }
    .badge-new { background-color: rgba(220, 53, 69, 0.12); color: #dc3545; }

    /* ---------- Course Cards ---------- */
    .course-item-card {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .course-item-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 26px rgba(0, 0, 0, 0.09);
    }

    .course-item-card .card-img-wrap {
      position: relative;
      overflow: hidden;
      height: 175px;
    }

    .course-item-card .card-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .course-item-card:hover .card-img-wrap img {
      transform: scale(1.06);
    }

    .course-item-card .category-badge {
      position: absolute;
      top: 12px;
      left: 12px;
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff);
      font-size: 11.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.4px;
      padding: 5px 12px;
      border-radius: 30px;
    }

    .course-item-card .card-body-custom {
      padding: 18px 20px 20px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .course-item-card .badge-row {
      margin-bottom: 8px;
    }

    .course-item-card h3.card-title {
      font-size: 17.5px;
      font-weight: 700;
      color: var(--heading-color, #222);
      line-height: 1.35;
      margin-bottom: 4px;
    }

    .course-item-card h3.card-title a {
      color: inherit;
      text-decoration: none;
    }

    .course-item-card h3.card-title a:hover {
      color: var(--accent-color, #0d6efd);
    }

    .course-item-card .card-provider {
      font-size: 13.5px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
      font-weight: 500;
      margin-bottom: 12px;
    }

    .course-item-card .card-meta-list {
      list-style: none;
      padding: 0;
      margin: 0 0 12px;
      font-size: 13px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 6px 10px;
    }

    .course-item-card .card-meta-list li {
      display: flex;
      align-items: center;
      gap: 6px;
      color: var(--default-color, #212529);
    }

    .course-item-card .card-meta-list i {
      color: var(--accent-color, #0d6efd);
      width: 15px;
      text-align: center;
    }

    .course-item-card .card-desc {
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 15%);
      margin-bottom: 16px;
      flex-grow: 1;
    }

    .course-item-card .card-footer-custom {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      margin-top: auto;
      padding-top: 14px;
      border-top: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
    }

    .btn-view-details {
      background-color: transparent;
      border: 1.5px solid var(--accent-color, #0d6efd);
      color: var(--accent-color, #0d6efd) !important;
      font-size: 13.5px;
      font-weight: 600;
      padding: 7px 16px;
      border-radius: 7px;
      text-decoration: none;
      white-space: nowrap;
      transition: 0.25s;
    }

    .btn-view-details:hover {
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff) !important;
    }

    #no-results {
      display: none;
      text-align: center;
      padding: 50px 20px;
      background-color: var(--surface-color, #fff);
      border: 1px dashed color-mix(in srgb, var(--default-color, #212529), transparent 75%);
      border-radius: 12px;
    }

    #no-results i {
      font-size: 40px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 50%);
      margin-bottom: 12px;
      display: block;
    }

    /* ---------- Sidebar ---------- */
    .course-sidebar .widget {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 22px;
      margin-bottom: 26px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    }

    .course-sidebar .widget h3 {
      font-size: 16px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 16px;
      padding-bottom: 10px;
      border-bottom: 2px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 80%);
    }

    .course-sidebar .widget ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .course-sidebar .widget ul li {
      margin-bottom: 4px;
    }

    .course-sidebar .widget ul li a {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      font-size: 14.5px;
      color: var(--default-color, #212529);
      text-decoration: none;
      padding: 9px 4px;
      border-radius: 6px;
      transition: 0.2s;
    }

    .course-sidebar .widget ul li a:hover {
      color: var(--accent-color, #0d6efd);
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 94%);
      padding-left: 10px;
    }

    .course-sidebar .widget ul li a i:first-child {
      color: var(--accent-color, #0d6efd);
      margin-right: 8px;
    }

    .course-sidebar .tip-widget {
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 93%);
      border: 1px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 75%);
    }

    .course-sidebar .tip-widget p {
      font-size: 14px;
      color: var(--default-color, #212529);
      margin: 0;
      display: flex;
      align-items: flex-start;
      gap: 9px;
    }

    .course-sidebar .tip-widget i {
      color: var(--accent-color, #0d6efd);
      margin-top: 3px;
    }

    @media (max-width: 991px) {
      .featured-course { padding: 22px; flex-direction: column; align-items: flex-start; }
      .featured-course .featured-img { max-width: 100%; flex-basis: 100%; }
      .course-filters { padding: 18px; }
    }
</style>

    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item active current">Courses &amp; Certifications</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>Courses &amp; Certifications</h1>
        <p>Practical courses and certifications for engineering students and graduates in Pakistan.</p>
      </div>
    </div>

    <div class="container">

      @php
        $featured = $listings->first();
      @endphp

      <!-- ================= SEARCH + FILTER SECTION ================= -->
      <section class="course-filters" aria-label="Course search and filters">
        <h2 class="visually-hidden">Search and Filter Courses</h2>
        <form id="course-filter-form" onsubmit="return false;">
          <div class="row g-3 align-items-end">

            <div class="col-lg-4 col-md-6">
              <label for="search-input" class="filter-label">Search Courses</label>
              <input type="text" id="search-input" class="form-control" placeholder="e.g. Python, AutoCAD, Six Sigma...">
            </div>

            <div class="col-lg-3 col-md-6">
              <label for="category-select" class="filter-label">Category</label>
              <select id="category-select" class="form-select">
                <option value="all">All Categories</option>
                @foreach($categories as $category)
                  <option value="{{ \Illuminate\Support\Str::slug($category) }}">{{ $category }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-lg-2 col-md-6">
              <label for="level-select" class="filter-label">Level</label>
              <select id="level-select" class="form-select">
                <option value="all">All Levels</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
              </select>
            </div>

            <div class="col-lg-3 col-md-6">
              <label for="mode-select" class="filter-label">Learning Mode</label>
              <select id="mode-select" class="form-select">
                <option value="all">All Modes</option>
                <option value="self-paced">Self-Paced</option>
                <option value="instructor-led">Instructor-Led</option>
                <option value="online">Online</option>
                <option value="hybrid">Hybrid</option>
              </select>
            </div>

            <div class="col-lg-12 d-flex gap-2 justify-content-lg-end">
              <button type="button" id="filter-search-btn" class="btn btn-filter-search" aria-label="Apply course filters">
                <i class="bi bi-search"></i> Search
              </button>
              <button type="button" id="filter-reset-btn" class="btn btn-filter-reset" aria-label="Reset all filters">
                Reset
              </button>
            </div>

          </div>
        </form>
      </section><!-- End Course Filters -->

      @if($featured)
      <!-- ================= FEATURED COURSE ================= -->
      <section class="featured-course" data-aos="fade-up" aria-labelledby="featured-heading">
        <div class="featured-img">
          <img src="{{ $featured->thumbnail ? asset($featured->thumbnail) : asset('assets/img/blog/blog-post-1.webp') }}" alt="{{ $featured->title }}" loading="lazy">
        </div>
        <div class="featured-content">
          <span class="featured-ribbon"><i class="bi bi-star-fill"></i> Featured Course</span>
          <h2 id="featured-heading">{{ $featured->title }}</h2>
          <p class="provider">Provider: {{ $featured->company_name ?? $featured->details['provider'] ?? 'FutureEngineers.pk Learning Partner' }}</p>
          <p>{{ \Illuminate\Support\Str::limit(strip_tags($featured->description), 180) }}</p>

          <div class="featured-meta">
            @if($featured->category)
              <span><i class="bi bi-tags"></i> {{ $featured->category->name }}</span>
            @endif
            @if(!empty($featured->details['level']))
              <span><i class="bi bi-bar-chart"></i> {{ $featured->details['level'] }}</span>
            @endif
            @if(!empty($featured->details['duration']))
              <span><i class="bi bi-clock"></i> {{ $featured->details['duration'] }}</span>
            @endif
            @if(!empty($featured->details['mode']))
              <span><i class="bi bi-laptop"></i> {{ $featured->details['mode'] }}</span>
            @endif
            @if(!empty($featured->details['certificate']))
              <span><i class="bi bi-award"></i> Certificate Available</span>
            @endif
          </div>

          <a href="{{ route('courses.show', $featured->id) }}" class="btn-view-course">View Course <i class="bi bi-arrow-right"></i></a>
        </div>
      </section><!-- End Featured Course -->
      @endif

      <div class="row">
        <!-- Main course listings -->
        <div class="col-lg-8">

          <section id="course-listings" class="category-postst section">
            <h2 class="visually-hidden">Course Listings</h2>
            <div class="row gy-4" id="course-grid" data-aos="fade-up" data-aos-delay="100">

              @forelse($listings as $listing)
                @php
                  $level = strtolower($listing->details['level'] ?? '');
                  $mode = strtolower($listing->details['mode'] ?? '');
                  $categorySlug = $listing->category ? \Illuminate\Support\Str::slug($listing->category->name) : '';
                  $hasCertificate = !empty($listing->details['certificate']);
                @endphp
                <div class="col-md-6 course-item"
                     data-category="{{ $categorySlug }}"
                     data-level="{{ $level }}"
                     data-mode="{{ $mode }}"
                     data-certificate="{{ $hasCertificate ? 'available' : 'none' }}"
                     data-title="{{ strtolower($listing->title) }}">
                  <div class="course-item-card">
                    <div class="card-img-wrap">
                      <img src="{{ $listing->thumbnail ? asset($listing->thumbnail) : asset('assets/img/blog/blog-post-1.webp') }}" alt="{{ $listing->title }}" loading="lazy">
                      @if($listing->category)
                        <span class="category-badge">{{ $listing->category->name }}</span>
                      @endif
                    </div>
                    <div class="card-body-custom">
                      @if($hasCertificate)
                        <div class="badge-row">
                          <span class="type-badge badge-certificate"><i class="bi bi-award"></i> Certificate</span>
                        </div>
                      @endif
                      <h3 class="card-title"><a href="{{ route('courses.show', $listing->id) }}">{{ $listing->title }}</a></h3>
                      <p class="card-provider">Provider: {{ $listing->company_name ?? $listing->details['provider'] ?? 'FutureEngineers.pk Learning Partner' }}</p>
                      <ul class="card-meta-list">
                        @if(!empty($listing->details['duration']))
                          <li><i class="bi bi-clock"></i> {{ $listing->details['duration'] }}</li>
                        @endif
                        @if(!empty($listing->details['level']))
                          <li><i class="bi bi-bar-chart"></i> {{ $listing->details['level'] }}</li>
                        @endif
                        @if(!empty($listing->details['mode']))
                          <li><i class="bi bi-laptop"></i> {{ $listing->details['mode'] }}</li>
                        @endif
                        <li><i class="bi bi-award"></i> {{ $hasCertificate ? 'Certificate Available' : 'No Certificate' }}</li>
                      </ul>
                      <p class="card-desc">
                        {{ \Illuminate\Support\Str::limit(strip_tags($listing->details['short_description'] ?? $listing->description), 130) }}
                      </p>
                      <div class="card-footer-custom">
                        <a href="{{ route('courses.show', $listing->id) }}" class="btn-view-details">View Course</a>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                <div class="col-12">
                  <p class="text-center">No courses are available right now.</p>
                </div>
              @endforelse

            </div><!-- End course-grid -->

            <!-- No results message -->
            <div id="no-results">
              <i class="bi bi-search"></i>
              <h3 class="h5">No courses found</h3>
              <p class="mb-0">Try adjusting your search or filters, or reset them to see all opportunities.</p>
            </div>

          </section><!-- /Listings Section -->

          <!-- Pagination placeholder for MVP -->
          <section id="pagination-2" class="pagination-2 section">
            <div class="d-flex justify-content-center">
              <ul>
                <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
              </ul>
            </div>
          </section>

        </div><!-- End main listings column -->

        <!-- Sidebar -->
        <div class="col-lg-4 course-sidebar">

          <div class="widget">
            <h3>Course Categories</h3>
            <ul>
              @foreach($categories as $category)
                <li><a href="#" data-quick-filter="{{ \Illuminate\Support\Str::slug($category) }}"><span><i class="bi bi-chevron-right"></i> {{ $category }}</span></a></li>
              @endforeach
            </ul>
          </div>

          <div class="widget">
            <h3>Career Resources</h3>
            <ul>
              <li><a href="{{ route('jobs') }}"><span><i class="bi bi-briefcase"></i> Jobs &amp; Internships</span></a></li>
              <li><a href="{{ route('scholarships') }}"><span><i class="bi bi-mortarboard"></i> Scholarships</span></a></li>
              <li><a href="{{ route('cv-templates.index') }}"><span><i class="bi bi-file-earmark-text"></i> CV Templates</span></a></li>
              <li><a href="{{ route('articles.index') }}"><span><i class="bi bi-graph-up"></i> Industry News &amp; Trends</span></a></li>
            </ul>
          </div>

          <div class="widget tip-widget">
            <h3><i class="bi bi-lightbulb"></i> Learning Tip</h3>
            <p><i class="bi bi-check2-circle"></i> Choose courses that build practical skills you can demonstrate through projects, portfolios or certifications.</p>
          </div>

        </div><!-- End sidebar -->

      </div><!-- End row -->
    </div><!-- End container -->

    <script>
      (function () {
        'use strict';

        var searchInput = document.getElementById('search-input');
        var categorySelect = document.getElementById('category-select');
        var levelSelect = document.getElementById('level-select');
        var modeSelect = document.getElementById('mode-select');
        var searchBtn = document.getElementById('filter-search-btn');
        var resetBtn = document.getElementById('filter-reset-btn');
        var grid = document.getElementById('course-grid');
        var noResults = document.getElementById('no-results');
        var items = grid ? Array.prototype.slice.call(grid.querySelectorAll('.course-item')) : [];
        var quickFilterLinks = document.querySelectorAll('[data-quick-filter]');

        function applyFilters() {
          var searchTerm = (searchInput.value || '').trim().toLowerCase();
          var category = categorySelect.value;
          var level = levelSelect.value;
          var mode = modeSelect.value;
          var visibleCount = 0;

          items.forEach(function (item) {
            var itemCategory = (item.getAttribute('data-category') || '').toLowerCase();
            var itemLevel = (item.getAttribute('data-level') || '').toLowerCase();
            var itemMode = (item.getAttribute('data-mode') || '').toLowerCase();
            var itemTitle = (item.getAttribute('data-title') || '').toLowerCase();

            var matchesSearch = searchTerm === '' || itemTitle.indexOf(searchTerm) !== -1;
            var matchesCategory = category === 'all' || itemCategory.indexOf(category) !== -1;
            var matchesLevel = level === 'all' || itemLevel === level;
            var matchesMode = mode === 'all' || itemMode.indexOf(mode) !== -1;

            var isVisible = matchesSearch && matchesCategory && matchesLevel && matchesMode;
            item.style.display = isVisible ? '' : 'none';
            if (isVisible) { visibleCount++; }
          });

          if (noResults) { noResults.style.display = visibleCount === 0 ? 'block' : 'none'; }
          if (grid) { grid.style.display = visibleCount === 0 ? 'none' : ''; }
        }

        function resetFilters() {
          searchInput.value = '';
          categorySelect.value = 'all';
          levelSelect.value = 'all';
          modeSelect.value = 'all';
          applyFilters();
        }

        if (searchBtn) { searchBtn.addEventListener('click', applyFilters); }
        if (resetBtn) { resetBtn.addEventListener('click', resetFilters); }

        if (searchInput) {
          searchInput.addEventListener('keyup', function (e) {
            if (e.key === 'Enter') { applyFilters(); }
          });
        }

        [categorySelect, levelSelect, modeSelect].forEach(function (select) {
          if (select) { select.addEventListener('change', applyFilters); }
        });

        quickFilterLinks.forEach(function (link) {
          link.addEventListener('click', function (e) {
            e.preventDefault();
            var value = link.getAttribute('data-quick-filter');
            categorySelect.value = value;
            applyFilters();
            if (grid) { grid.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
          });
        });
      })();
    </script>
@endsection
