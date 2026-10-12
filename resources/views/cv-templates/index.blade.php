@extends('layouts.app')

@section('body_class', 'cv-templates-page')

@section('content')
<style>

    /* ---------- CV Filters ---------- */
    .cv-filters {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 24px;
      margin-bottom: 40px;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
    }

    .cv-filters .filter-label {
      font-size: 13px;
      font-weight: 600;
      color: var(--heading-color, #222);
      margin-bottom: 6px;
      display: block;
    }

    .cv-filters .form-control,
    .cv-filters .form-select {
      border-radius: 8px;
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 80%);
      font-size: 14.5px;
      padding: 10px 12px;
    }

    .cv-filters .form-control:focus,
    .cv-filters .form-select:focus {
      border-color: var(--accent-color, #0d6efd);
      box-shadow: 0 0 0 3px color-mix(in srgb, var(--accent-color, #0d6efd), transparent 80%);
    }

    .cv-filters .btn-filter-search {
      background-color: var(--accent-color, #0d6efd);
      border: none;
      color: var(--contrast-color, #fff);
      font-weight: 600;
      border-radius: 8px;
      padding: 10px 22px;
      transition: 0.3s;
    }

    .cv-filters .btn-filter-search:hover {
      filter: brightness(0.92);
    }

    .cv-filters .btn-filter-reset {
      background-color: transparent;
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 70%);
      color: var(--default-color, #212529);
      font-weight: 600;
      border-radius: 8px;
      padding: 10px 22px;
      transition: 0.3s;
    }

    .cv-filters .btn-filter-reset:hover {
      background-color: color-mix(in srgb, var(--default-color, #212529), transparent 94%);
    }

    /* ---------- Featured CV Template ---------- */
    .featured-cv {
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

    .featured-cv .featured-img {
      flex: 0 0 220px;
      max-width: 220px;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
    }

    .featured-cv .featured-img img {
      width: 100%;
      height: 280px;
      object-fit: cover;
      display: block;
    }

    .featured-cv .featured-content {
      flex: 1 1 320px;
    }

    .featured-cv .featured-ribbon {
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

    .featured-cv h2 {
      font-size: 25px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 6px;
    }

    .featured-cv .suitable-for {
      font-size: 15px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
      margin-bottom: 12px;
      font-weight: 500;
    }

    .featured-cv .featured-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin: 16px 0;
      font-size: 14px;
    }

    .featured-cv .featured-meta span {
      display: flex;
      align-items: center;
      gap: 6px;
      color: var(--default-color, #212529);
    }

    .featured-cv .featured-meta i {
      color: var(--accent-color, #0d6efd);
    }

    .featured-cv .featured-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 8px;
    }

    .btn-view-cv {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff) !important;
      font-weight: 600;
      font-size: 14.5px;
      padding: 11px 22px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s;
      border: none;
    }

    .btn-view-cv:hover {
      filter: brightness(0.92);
      color: var(--contrast-color, #fff);
    }

    .btn-download-sample {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background-color: transparent;
      border: 1.5px solid var(--accent-color, #0d6efd);
      color: var(--accent-color, #0d6efd) !important;
      font-weight: 600;
      font-size: 14.5px;
      padding: 10px 22px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s;
    }

    .btn-download-sample:hover {
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff) !important;
    }

    /* ---------- Badges ---------- */
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
    .badge-ats { background-color: rgba(25, 135, 84, 0.12); color: #198754; }
    .badge-editable { background-color: rgba(111, 66, 193, 0.12); color: #6f42c1; }
    .badge-student { background-color: rgba(13, 202, 240, 0.15); color: #0aa2c0; }
    .badge-professional { background-color: rgba(108, 117, 125, 0.15); color: #495057; }

    /* ---------- CV Template Cards ---------- */
    .cv-item-card {
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

    .cv-item-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 26px rgba(0, 0, 0, 0.09);
    }

    .cv-item-card .card-img-wrap {
      position: relative;
      overflow: hidden;
      height: 210px;
      background-color: color-mix(in srgb, var(--default-color, #212529), transparent 96%);
    }

    .cv-item-card .card-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: top center;
      transition: transform 0.4s ease;
    }

    .cv-item-card:hover .card-img-wrap img {
      transform: scale(1.05);
    }

    .cv-item-card .category-badge {
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

    .cv-item-card .card-body-custom {
      padding: 18px 20px 20px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .cv-item-card .badge-row {
      margin-bottom: 8px;
    }

    .cv-item-card h3.card-title {
      font-size: 17.5px;
      font-weight: 700;
      color: var(--heading-color, #222);
      line-height: 1.35;
      margin-bottom: 4px;
    }

    .cv-item-card h3.card-title a {
      color: inherit;
      text-decoration: none;
    }

    .cv-item-card h3.card-title a:hover {
      color: var(--accent-color, #0d6efd);
    }

    .cv-item-card .card-suitable {
      font-size: 13.5px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
      font-weight: 500;
      margin-bottom: 12px;
    }

    .cv-item-card .card-meta-list {
      list-style: none;
      padding: 0;
      margin: 0 0 12px;
      font-size: 13px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 6px 10px;
    }

    .cv-item-card .card-meta-list li {
      display: flex;
      align-items: center;
      gap: 6px;
      color: var(--default-color, #212529);
    }

    .cv-item-card .card-meta-list i {
      color: var(--accent-color, #0d6efd);
      width: 15px;
      text-align: center;
    }

    .cv-item-card .card-desc {
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 15%);
      margin-bottom: 16px;
      flex-grow: 1;
    }

    .cv-item-card .card-footer-custom {
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
    .cv-sidebar .widget {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 22px;
      margin-bottom: 26px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    }

    .cv-sidebar .widget h3 {
      font-size: 16px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 16px;
      padding-bottom: 10px;
      border-bottom: 2px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 80%);
    }

    .cv-sidebar .widget ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .cv-sidebar .widget ul li {
      margin-bottom: 4px;
    }

    .cv-sidebar .widget ul li a {
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

    .cv-sidebar .widget ul li a:hover {
      color: var(--accent-color, #0d6efd);
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 94%);
      padding-left: 10px;
    }

    .cv-sidebar .widget ul li a i:first-child {
      color: var(--accent-color, #0d6efd);
      margin-right: 8px;
    }

    .cv-sidebar .tips-widget {
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 93%);
      border: 1px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 75%);
    }

    .cv-sidebar .tips-widget ul li {
      display: flex;
      align-items: flex-start;
      gap: 9px;
      font-size: 14px;
      color: var(--default-color, #212529);
      padding: 7px 0;
    }

    .cv-sidebar .tips-widget ul li i {
      color: var(--accent-color, #0d6efd);
      margin-top: 3px;
    }

    @media (max-width: 991px) {
      .featured-cv { padding: 22px; flex-direction: column; align-items: flex-start; }
      .featured-cv .featured-img { max-width: 100%; flex-basis: 100%; }
      .featured-cv .featured-img img { height: 220px; }
      .cv-filters { padding: 18px; }
    }
</style>

    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item active current">CV Templates</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>CV Templates</h1>
        <p>Ready-to-use, engineering-focused CV templates for students, fresh graduates and working engineers in Pakistan.</p>
      </div>
    </div>

    @php
      $featured = $templates->first();
    @endphp

    <div class="container">

      <!-- ================= SEARCH + FILTER SECTION ================= -->
      <section class="cv-filters" aria-label="CV template search and filters">
        <h2 class="visually-hidden">Search and Filter CV Templates</h2>
        <form id="cv-filter-form" onsubmit="return false;">
          <div class="row g-3 align-items-end">

            <div class="col-lg-4 col-md-6">
              <label for="search-input" class="filter-label">Search CV Templates</label>
              <input type="text" id="search-input" class="form-control" placeholder="e.g. Mechanical, ATS, Internship...">
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="type-select" class="filter-label">Template Type</label>
              <select id="type-select" class="form-select">
                <option value="all">All Templates</option>
                <option value="student">Student CV</option>
                <option value="fresh-graduate">Fresh Graduate CV</option>
                <option value="experienced">Experienced Engineer CV</option>
                <option value="internship">Internship CV</option>
                <option value="academic">Academic CV</option>
              </select>
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="field-select" class="filter-label">Engineering Field</label>
              <select id="field-select" class="form-select">
                <option value="all">All Fields</option>
                <option value="mechanical">Mechanical</option>
                <option value="civil">Civil</option>
                <option value="electrical">Electrical</option>
                <option value="software">Software</option>
              </select>
            </div>

            <div class="col-lg-12 d-flex gap-2 justify-content-lg-end">
              <button type="button" id="filter-search-btn" class="btn btn-filter-search" aria-label="Apply CV template filters">
                <i class="bi bi-search"></i> Search
              </button>
              <button type="button" id="filter-reset-btn" class="btn btn-filter-reset" aria-label="Reset all filters">
                Reset
              </button>
            </div>

          </div>
        </form>
      </section><!-- End CV Filters -->

      @if($featured)
      <!-- ================= FEATURED CV TEMPLATE ================= -->
      <section class="featured-cv" data-aos="fade-up" aria-labelledby="featured-heading">
        <div class="featured-img">
          <img src="{{ $featured->thumbnail ? asset($featured->thumbnail) : asset('assets/img/blog/blog-post-square-1.webp') }}" alt="Preview of the {{ $featured->title }} template" loading="lazy">
        </div>
        <div class="featured-content">
          <span class="featured-ribbon"><i class="bi bi-star-fill"></i> Featured Template</span>
          <h2 id="featured-heading">{{ $featured->title }}</h2>
          <p class="suitable-for">Suitable For: {{ $featured->details['suitableFor'] ?? 'Engineering Students &amp; Graduates' }}</p>
          <p>{{ $featured->details['description'] ?? '' }}</p>

          <div class="featured-meta">
            @if(!empty($featured->details['field']))
              <span><i class="bi bi-building"></i> {{ $featured->details['field'] }}</span>
            @endif
            @if(!empty($featured->details['level']))
              <span><i class="bi bi-briefcase"></i> {{ $featured->details['level'] }}</span>
            @endif
            @if(!empty($featured->details['format']))
              <span><i class="bi bi-file-earmark-text"></i> {{ $featured->details['format'] }}</span>
            @endif
          </div>

          <div class="featured-actions">
            <a href="{{ route('cv-templates.show', $featured->id) }}" class="btn-view-cv">View Template <i class="bi bi-arrow-right"></i></a>
            @if($featured->file_path)
              <a href="{{ asset($featured->file_path) }}" target="_blank" rel="noopener" class="btn-download-sample"><i class="bi bi-eye"></i> Preview Template</a>
            @endif
          </div>
        </div>
      </section><!-- End Featured CV Template -->
      @endif

      <div class="row">
        <!-- Main template listings -->
        <div class="col-lg-8">

          <section id="cv-template-listings" class="category-postst section">
            <h2 class="visually-hidden">CV Template Listings</h2>
            <div class="row gy-4" id="cv-grid" data-aos="fade-up" data-aos-delay="100">

              @forelse($templates as $template)
                @php
                  $d = $template->details ?? [];
                  $typeSlug = !empty($d['category']) ? $d['category'] : '';
                  $fieldSlug = \Illuminate\Support\Str::slug($d['field'] ?? '');
                @endphp
                <div class="col-md-6 cv-item"
                     data-type="{{ $typeSlug }}"
                     data-field="{{ $fieldSlug }}"
                     data-title="{{ strtolower($template->title) }}">
                  <div class="cv-item-card">
                    <div class="card-img-wrap">
                      <img src="{{ $template->thumbnail ? asset($template->thumbnail) : asset('assets/img/blog/blog-post-square-1.webp') }}" alt="Preview of the {{ $template->title }} template" loading="lazy">
                      @if(!empty($d['templateType']))
                        <span class="category-badge">{{ $d['templateType'] }}</span>
                      @endif
                    </div>
                    <div class="card-body-custom">
                      @if(!empty($d['badges']))
                        <div class="badge-row">
                          @foreach($d['badges'] as $badge)
                            <span class="type-badge {{ $badge['cls'] ?? '' }}"><i class="bi {{ $badge['icon'] ?? 'bi-tag' }}"></i> {{ $badge['label'] ?? '' }}</span>
                          @endforeach
                        </div>
                      @endif
                      <h3 class="card-title"><a href="{{ route('cv-templates.show', $template->id) }}">{{ $template->title }}</a></h3>
                      <p class="card-suitable">Suitable For: {{ $d['suitableFor'] ?? 'Engineering Students & Graduates' }}</p>
                      <ul class="card-meta-list">
                        @if(!empty($d['field']))
                          <li><i class="bi bi-building"></i> {{ $d['field'] }}</li>
                        @endif
                        @if(!empty($d['level']))
                          <li><i class="bi bi-briefcase"></i> {{ $d['level'] }}</li>
                        @endif
                        @if(!empty($d['format']))
                          <li><i class="bi bi-file-earmark-text"></i> {{ $d['format'] }}</li>
                        @endif
                      </ul>
                      <p class="card-desc">{{ $d['description'] ?? '' }}</p>
                      <div class="card-footer-custom">
                        <a href="{{ route('cv-templates.show', $template->id) }}" class="btn-view-details">View Template</a>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                <div class="col-12">
                  <p class="text-center">No CV templates are available right now.</p>
                </div>
              @endforelse

            </div><!-- End cv-grid -->

            <!-- No results message -->
            <div id="no-results">
              <i class="bi bi-search"></i>
              <h3 class="h5">No templates found</h3>
              <p class="mb-0">Try adjusting your search or filters, or reset them to see all templates.</p>
            </div>

          </section><!-- /Listings Section -->

        </div><!-- End main listings column -->

        <!-- Sidebar -->
        <div class="col-lg-4 cv-sidebar">

          <div class="widget">
            <h3>CV Categories</h3>
            <ul>
              <li><a href="#" data-quick-filter-type="student"><span><i class="bi bi-chevron-right"></i> Student CV</span></a></li>
              <li><a href="#" data-quick-filter-type="fresh-graduate"><span><i class="bi bi-chevron-right"></i> Fresh Graduate CV</span></a></li>
              <li><a href="#" data-quick-filter-type="internship"><span><i class="bi bi-chevron-right"></i> Internship CV</span></a></li>
              <li><a href="#" data-quick-filter-type="experienced"><span><i class="bi bi-chevron-right"></i> Experienced Engineer CV</span></a></li>
              <li><a href="#" data-quick-filter-type="academic"><span><i class="bi bi-chevron-right"></i> Academic CV</span></a></li>
            </ul>
          </div>

          <div class="widget">
            <h3>Career Resources</h3>
            <ul>
              <li><a href="{{ route('jobs') }}"><span><i class="bi bi-briefcase"></i> Jobs &amp; Internships</span></a></li>
              <li><a href="{{ route('scholarships') }}"><span><i class="bi bi-mortarboard"></i> Scholarships</span></a></li>
              <li><a href="{{ route('courses') }}"><span><i class="bi bi-easel"></i> Courses &amp; Certifications</span></a></li>
              <li><a href="{{ route('articles.index') }}"><span><i class="bi bi-graph-up"></i> Industry News &amp; Trends</span></a></li>
            </ul>
          </div>

          <div class="widget tips-widget">
            <h3><i class="bi bi-lightbulb"></i> CV Tips</h3>
            <ul>
              <li><i class="bi bi-check2-circle"></i> Keep your CV concise and relevant.</li>
              <li><i class="bi bi-check2-circle"></i> Highlight projects and technical skills.</li>
              <li><i class="bi bi-check2-circle"></i> Use measurable achievements where possible.</li>
              <li><i class="bi bi-check2-circle"></i> Tailor your CV to each job.</li>
              <li><i class="bi bi-check2-circle"></i> Use an ATS-friendly structure.</li>
              <li><i class="bi bi-check2-circle"></i> Check spelling and formatting before submitting.</li>
            </ul>
          </div>

        </div><!-- End sidebar -->

      </div><!-- End row -->
    </div><!-- End container -->

    <script>
      (function () {
        'use strict';

        var searchInput = document.getElementById('search-input');
        var typeSelect = document.getElementById('type-select');
        var fieldSelect = document.getElementById('field-select');
        var searchBtn = document.getElementById('filter-search-btn');
        var resetBtn = document.getElementById('filter-reset-btn');
        var grid = document.getElementById('cv-grid');
        var noResults = document.getElementById('no-results');
        var items = grid ? Array.prototype.slice.call(grid.querySelectorAll('.cv-item')) : [];
        var quickTypeLinks = document.querySelectorAll('[data-quick-filter-type]');

        function applyFilters() {
          var searchTerm = (searchInput.value || '').trim().toLowerCase();
          var type = typeSelect.value;
          var field = fieldSelect.value;
          var visibleCount = 0;

          items.forEach(function (item) {
            var itemType = (item.getAttribute('data-type') || '').toLowerCase();
            var itemField = (item.getAttribute('data-field') || '').toLowerCase();
            var itemTitle = (item.getAttribute('data-title') || '').toLowerCase();

            var matchesSearch = searchTerm === '' || itemTitle.indexOf(searchTerm) !== -1;
            var matchesType = type === 'all' || itemType.indexOf(type) !== -1;
            var matchesField = field === 'all' || itemField.indexOf(field) !== -1 || itemField.indexOf('all') !== -1;

            var isVisible = matchesSearch && matchesType && matchesField;
            item.style.display = isVisible ? '' : 'none';
            if (isVisible) { visibleCount++; }
          });

          if (noResults) { noResults.style.display = visibleCount === 0 ? 'block' : 'none'; }
          if (grid) { grid.style.display = visibleCount === 0 ? 'none' : ''; }
        }

        function resetFilters() {
          searchInput.value = '';
          typeSelect.value = 'all';
          fieldSelect.value = 'all';
          applyFilters();
        }

        if (searchBtn) { searchBtn.addEventListener('click', applyFilters); }
        if (resetBtn) { resetBtn.addEventListener('click', resetFilters); }

        if (searchInput) {
          searchInput.addEventListener('keyup', function (e) {
            if (e.key === 'Enter') { applyFilters(); }
          });
        }

        [typeSelect, fieldSelect].forEach(function (select) {
          if (select) { select.addEventListener('change', applyFilters); }
        });

        quickTypeLinks.forEach(function (link) {
          link.addEventListener('click', function (e) {
            e.preventDefault();
            typeSelect.value = link.getAttribute('data-quick-filter-type');
            applyFilters();
            if (grid) { grid.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
          });
        });
      })();
    </script>
@endsection
