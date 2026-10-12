@extends('layouts.app')

@section('body_class', 'scholarships-page')

@section('content')
<style>

    /* ---------- Scholarship Filters ---------- */
    .scholarship-filters {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 24px;
      margin-bottom: 40px;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
    }

    .scholarship-filters .filter-label {
      font-size: 13px;
      font-weight: 600;
      color: var(--heading-color, #222);
      margin-bottom: 6px;
      display: block;
    }

    .scholarship-filters .form-control,
    .scholarship-filters .form-select {
      border-radius: 8px;
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 80%);
      font-size: 15px;
      padding: 10px 14px;
    }

    .scholarship-filters .form-control:focus,
    .scholarship-filters .form-select:focus {
      border-color: var(--accent-color, #0d6efd);
      box-shadow: 0 0 0 3px color-mix(in srgb, var(--accent-color, #0d6efd), transparent 80%);
    }

    .scholarship-filters .btn-filter-search {
      background-color: var(--accent-color, #0d6efd);
      border: none;
      color: var(--contrast-color, #fff);
      font-weight: 600;
      border-radius: 8px;
      padding: 10px 22px;
      transition: 0.3s;
    }

    .scholarship-filters .btn-filter-search:hover {
      filter: brightness(0.92);
    }

    .scholarship-filters .btn-filter-reset {
      background-color: transparent;
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 70%);
      color: var(--default-color, #212529);
      font-weight: 600;
      border-radius: 8px;
      padding: 10px 22px;
      transition: 0.3s;
    }

    .scholarship-filters .btn-filter-reset:hover {
      background-color: color-mix(in srgb, var(--default-color, #212529), transparent 94%);
    }

    /* ---------- Demo data notice ---------- */
/* ---------- Featured Scholarship ---------- */
    .featured-scholarship {
      background: linear-gradient(135deg, color-mix(in srgb, var(--accent-color, #0d6efd), transparent 88%), var(--surface-color, #fff));
      border: 1px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 75%);
      border-radius: 14px;
      padding: 32px;
      margin-bottom: 45px;
      position: relative;
      overflow: hidden;
    }

    .featured-scholarship .featured-ribbon {
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
      margin-bottom: 16px;
    }

    .featured-scholarship h2 {
      font-size: 26px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 6px;
    }

    .featured-scholarship .provider {
      font-size: 15px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
      margin-bottom: 14px;
      font-weight: 500;
    }

    .featured-scholarship .benefits-list {
      list-style: none;
      padding: 0;
      margin: 18px 0;
    }

    .featured-scholarship .benefits-list li {
      display: flex;
      align-items: flex-start;
      gap: 8px;
      font-size: 14.5px;
      margin-bottom: 8px;
      color: var(--default-color, #212529);
    }

    .featured-scholarship .benefits-list i {
      color: var(--accent-color, #0d6efd);
      margin-top: 3px;
    }

    .featured-scholarship .featured-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 22px;
      margin: 18px 0;
      font-size: 14px;
    }

    .featured-scholarship .featured-meta span {
      display: flex;
      align-items: center;
      gap: 6px;
      color: var(--default-color, #212529);
    }

    .featured-scholarship .featured-meta i {
      color: var(--accent-color, #0d6efd);
    }

    .btn-view-scholarship {
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
    }

    .btn-view-scholarship:hover {
      filter: brightness(0.92);
      color: var(--contrast-color, #fff);
    }

    /* ---------- Status badges ---------- */
    .status-badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.4px;
      padding: 5px 12px;
      border-radius: 30px;
    }

    .status-open { background-color: rgba(25, 135, 84, 0.12); color: #198754; }
    .status-closing { background-color: rgba(255, 159, 28, 0.15); color: #b26a00; }
    .status-upcoming { background-color: rgba(13, 110, 253, 0.12); color: #0d6efd; }
    .status-closed { background-color: rgba(108, 117, 125, 0.15); color: #6c757d; }

    /* ---------- Scholarship Cards ---------- */
    .scholarship-card {
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

    .scholarship-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 26px rgba(0, 0, 0, 0.09);
    }

    .scholarship-card .card-img-wrap {
      position: relative;
      overflow: hidden;
      height: 180px;
    }

    .scholarship-card .card-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .scholarship-card:hover .card-img-wrap img {
      transform: scale(1.06);
    }

    .scholarship-card .category-badge {
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

    .scholarship-card .card-body-custom {
      padding: 18px 20px 20px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .scholarship-card .card-body-custom .status-badge {
      align-self: flex-start;
      margin-bottom: 10px;
    }

    .scholarship-card h3.card-title {
      font-size: 18px;
      font-weight: 700;
      color: var(--heading-color, #222);
      line-height: 1.35;
      margin-bottom: 4px;
    }

    .scholarship-card h3.card-title a {
      color: inherit;
      text-decoration: none;
    }

    .scholarship-card h3.card-title a:hover {
      color: var(--accent-color, #0d6efd);
    }

    .scholarship-card .card-provider {
      font-size: 13.5px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
      font-weight: 500;
      margin-bottom: 12px;
    }

    .scholarship-card .card-meta-list {
      list-style: none;
      padding: 0;
      margin: 0 0 12px;
      font-size: 13.5px;
    }

    .scholarship-card .card-meta-list li {
      display: flex;
      align-items: center;
      gap: 7px;
      margin-bottom: 6px;
      color: var(--default-color, #212529);
    }

    .scholarship-card .card-meta-list i {
      color: var(--accent-color, #0d6efd);
      width: 16px;
      text-align: center;
    }

    .scholarship-card .card-desc {
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 15%);
      margin-bottom: 16px;
      flex-grow: 1;
    }

    .scholarship-card .card-footer-custom {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      margin-top: auto;
      padding-top: 14px;
      border-top: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
    }

    .scholarship-card .deadline-text {
      font-size: 12.5px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
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
    .scholarship-sidebar .widget {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 22px;
      margin-bottom: 26px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    }

    .scholarship-sidebar .widget h3 {
      font-size: 16px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 16px;
      padding-bottom: 10px;
      border-bottom: 2px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 80%);
    }

    .scholarship-sidebar .widget ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .scholarship-sidebar .widget ul li {
      margin-bottom: 4px;
    }

    .scholarship-sidebar .widget ul li a {
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

    .scholarship-sidebar .widget ul li a:hover {
      color: var(--accent-color, #0d6efd);
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 94%);
      padding-left: 10px;
    }

    .scholarship-sidebar .widget ul li a i:first-child {
      color: var(--accent-color, #0d6efd);
      margin-right: 8px;
    }

    .scholarship-sidebar .tips-widget {
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 93%);
      border: 1px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 75%);
    }

    .scholarship-sidebar .tips-widget ul li {
      display: flex;
      align-items: flex-start;
      gap: 9px;
      font-size: 14px;
      color: var(--default-color, #212529);
      padding: 7px 0;
    }

    .scholarship-sidebar .tips-widget ul li i {
      color: var(--accent-color, #0d6efd);
      margin-top: 3px;
    }

    @media (max-width: 991px) {
      .featured-scholarship { padding: 22px; }
      .scholarship-filters { padding: 18px; }
    }
  
</style>

<div class="page-title">
  <div class="breadcrumbs">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
        <li class="breadcrumb-item active current">Scholarships</li>
      </ol>
    </nav>
  </div>

  <div class="title-wrapper">
    <h1>Scholarships</h1>
    <p>Find scholarships, financial aid and fully funded opportunities for engineering students in Pakistan and abroad &mdash; from undergraduate to PhD level, need-based to merit-based.</p>
  </div>
</div>

<div class="container">

  <section class="scholarship-filters" aria-label="Scholarship search and filters">
    <h2 class="visually-hidden">Search and Filter Scholarships</h2>

    <form id="scholarship-filter-form" onsubmit="return false;">
      <div class="row g-3 align-items-end">

        <div class="col-lg-3 col-md-6">
          <label for="search-input" class="filter-label">Search Scholarships</label>
          <input type="text" id="search-input" class="form-control" placeholder="e.g. HEC, Fulbright, Women...">
        </div>

        <div class="col-lg-2 col-md-6">
          <label for="category-select" class="filter-label">Category</label>
          <select id="category-select" class="form-select">
            <option value="all">All</option>
            <option value="need-based">Need-Based</option>
            <option value="merit-based">Merit-Based</option>
            <option value="government">Government</option>
            <option value="international">International</option>
            <option value="women">Women</option>
            <option value="undergraduate">Undergraduate</option>
            <option value="postgraduate">Postgraduate</option>
          </select>
        </div>

        <div class="col-lg-2 col-md-6">
          <label for="level-select" class="filter-label">Study Level</label>
          <select id="level-select" class="form-select">
            <option value="all">All Levels</option>
            <option value="undergraduate">Undergraduate</option>
            <option value="masters">Master's</option>
            <option value="phd">PhD</option>
          </select>
        </div>

        <div class="col-lg-2 col-md-6">
          <label for="location-select" class="filter-label">Location</label>
          <select id="location-select" class="form-select">
            <option value="all">All Locations</option>
            <option value="pakistan">Pakistan</option>
            <option value="international">International</option>
          </select>
        </div>

        <div class="col-lg-3 col-md-12 d-flex gap-2">
          <button type="button" id="filter-search-btn" class="btn btn-filter-search flex-grow-1">
            <i class="bi bi-search"></i> Search
          </button>
          <button type="button" id="filter-reset-btn" class="btn btn-filter-reset">
            Reset
          </button>
        </div>

      </div>
    </form>
  </section>

  @php
      $featured = $listings->first();
      $featuredDetails = $featured?->details ?? [];
      $featuredStatus = strtolower($featuredDetails['status'] ?? 'open');
  @endphp

  @if($featured)
    <section class="featured-scholarship" data-aos="fade-up" aria-labelledby="featured-heading">
      <span class="featured-ribbon">
        <i class="bi bi-star-fill"></i> Featured Scholarship
      </span>

      <h2 id="featured-heading">{{ $featured->title }}</h2>

      <p class="provider">
        {{ $featuredDetails['provider'] ?? 'Scholarship Provider' }}
        @if($featured->location) &bull; {{ $featured->location }} @endif
      </p>

      <p>{{ $featured->description }}</p>

      @if(!empty($featuredDetails['benefits']) && is_array($featuredDetails['benefits']))
        <ul class="benefits-list">
          @foreach(array_slice($featuredDetails['benefits'], 0, 3) as $benefit)
            <li><i class="bi bi-check-circle-fill"></i> {{ $benefit }}</li>
          @endforeach
        </ul>
      @endif

      <div class="featured-meta">
        <span><i class="bi bi-mortarboard"></i> {{ $featuredDetails['level'] ?? '—' }}</span>
        <span><i class="bi bi-geo-alt"></i> {{ $featured->location ?? '—' }}</span>
        <span><i class="bi bi-cash-coin"></i> {{ $featuredDetails['funding'] ?? '—' }}</span>
        <span><i class="bi bi-calendar-event"></i> {{ $featured->deadline?->format('d M Y') ?? ($featuredDetails['deadline'] ?? 'See details') }}</span>
        <span class="status-badge status-{{ str_replace(' ', '-', $featuredStatus) }}">
          <i class="bi bi-circle-fill" style="font-size:7px;"></i> {{ $featuredDetails['status'] ?? 'Open' }}
        </span>
      </div>

      <a href="{{ route('scholarships.show', $featured->id) }}" class="btn-view-scholarship">
        View Scholarship <i class="bi bi-arrow-right"></i>
      </a>
    </section>
  @endif

  <div class="row">

    <div class="col-lg-8">
      <section id="scholarship-listings" class="category-postst section">
        <h2 class="visually-hidden">Scholarship Listings</h2>

        <div class="row gy-4" id="scholarship-grid" data-aos="fade-up" data-aos-delay="100">

          @forelse($listings as $listing)
            @php
                $details = $listing->details ?? [];
                $categoryText = strtolower(($listing->category?->name ?? '') . ' ' . ($details['category'] ?? ''));
                $levelText = strtolower($details['level'] ?? '');
                $locationText = strtolower($listing->location ?? '');
                $statusText = strtolower($details['status'] ?? 'open');
                $statusClass = match ($statusText) {
                    'closing soon' => 'status-closing',
                    'upcoming' => 'status-upcoming',
                    'closed' => 'status-closed',
                    default => 'status-open',
                };
            @endphp

            <div
              class="col-md-6 scholarship-item"
              data-category="{{ $categoryText }}"
              data-level="{{ $levelText }}"
              data-location="{{ $locationText }}"
              data-title="{{ strtolower($listing->title) }}">

              <div class="scholarship-card">

                <div class="card-img-wrap">
                  @if($listing->thumbnail)
                    <img src="{{ asset($listing->thumbnail) }}" alt="{{ $listing->title }}" loading="lazy">
                  @else
                    <img src="{{ asset('assets/img/blog/blog-post-6.webp') }}" alt="{{ $listing->title }}" loading="lazy">
                  @endif

                  <span class="category-badge">
                    {{ $listing->category?->name ?? ($details['category'] ?? 'Scholarship') }}
                  </span>
                </div>

                <div class="card-body-custom">

                  <span class="status-badge {{ $statusClass }}">
                    <i class="bi bi-circle-fill" style="font-size:7px;"></i>
                    {{ $details['status'] ?? 'Open' }}
                  </span>

                  <h3 class="card-title">
                    <a href="{{ route('scholarships.show', $listing->id) }}">
                      {{ $listing->title }}
                    </a>
                  </h3>

                  <p class="card-provider">
                    {{ $details['provider'] ?? 'Scholarship Provider' }}
                  </p>

                  <ul class="card-meta-list">
                    <li><i class="bi bi-mortarboard"></i> {{ $details['level'] ?? '—' }}</li>
                    <li><i class="bi bi-geo-alt"></i> {{ $listing->location ?? '—' }}</li>
                    <li><i class="bi bi-cash-coin"></i> {{ $details['funding'] ?? '—' }}</li>
                  </ul>

                  <p class="card-desc">
                    {{ \Illuminate\Support\Str::limit(strip_tags($listing->description), 155) }}
                  </p>

                  <div class="card-footer-custom">
                    <span class="deadline-text">
                      <i class="bi bi-calendar-event"></i>
                      {{ $listing->deadline?->format('d M Y') ?? ($details['deadline'] ?? 'See details') }}
                    </span>

                    <a href="{{ route('scholarships.show', $listing->id) }}" class="btn-view-details">
                      View Details
                    </a>
                  </div>

                </div>
              </div>
            </div>

          @empty
            <div class="col-12">
              <div id="no-results" class="text-center py-5">
                <i class="bi bi-search fs-1 d-block mb-3"></i>
                <h3 class="h5">No scholarships found</h3>
                <p class="mb-0">No active scholarships are available right now.</p>
              </div>
            </div>
          @endforelse

        </div>

        <div id="no-results" class="text-center py-5" style="display:none;">
          <i class="bi bi-search fs-1 d-block mb-3"></i>
          <h3 class="h5">No scholarships found</h3>
          <p class="mb-0">Try adjusting your search or filters, or reset them to see all opportunities.</p>
        </div>

      </section>

      <section id="pagination-2" class="pagination-2 section">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="#" aria-label="Previous page"><i class="bi bi-chevron-left"></i></a></li>
            <li><a href="#" class="active" aria-current="page">1</a></li>
            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
          </ul>
        </div>
      </section>
    </div>

    <div class="col-lg-4 scholarship-sidebar">

      <div class="widget">
        <h3>Scholarship Categories</h3>
        <ul>
          <li><a href="#" data-quick-filter="need-based"><span><i class="bi bi-chevron-right"></i> Need-Based</span></a></li>
          <li><a href="#" data-quick-filter="merit-based"><span><i class="bi bi-chevron-right"></i> Merit-Based</span></a></li>
          <li><a href="#" data-quick-filter="government"><span><i class="bi bi-chevron-right"></i> Government</span></a></li>
          <li><a href="#" data-quick-filter="international"><span><i class="bi bi-chevron-right"></i> International</span></a></li>
          <li><a href="#" data-quick-filter="women"><span><i class="bi bi-chevron-right"></i> Women</span></a></li>
          <li><a href="#" data-quick-filter="postgraduate"><span><i class="bi bi-chevron-right"></i> Postgraduate</span></a></li>
        </ul>
      </div>

      <div class="widget">
        <h3>Career Resources</h3>
        <ul>
          <li><a href="{{ route('jobs') }}"><span><i class="bi bi-briefcase"></i> Jobs &amp; Internships</span></a></li>
          <li><a href="{{ route('courses') }}"><span><i class="bi bi-mortarboard"></i> Courses &amp; Certifications</span></a></li>
          <li><a href="{{ route('cv-templates.index') }}"><span><i class="bi bi-file-earmark-text"></i> CV Templates</span></a></li>
          <li><a href="{{ route('articles.index') }}"><span><i class="bi bi-graph-up"></i> Industry News &amp; Trends</span></a></li>
        </ul>
      </div>

      <div class="widget tips-widget">
        <h3><i class="bi bi-lightbulb"></i> Scholarship Tips</h3>
        <ul>
          <li><i class="bi bi-check2-circle"></i> Check eligibility criteria carefully before applying.</li>
          <li><i class="bi bi-check2-circle"></i> Prepare your documents early.</li>
          <li><i class="bi bi-check2-circle"></i> Always verify deadlines on the official provider website.</li>
          <li><i class="bi bi-check2-circle"></i> Never pay unofficial or unverified application fees.</li>
        </ul>
      </div>

    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('search-input');
  const categorySelect = document.getElementById('category-select');
  const levelSelect = document.getElementById('level-select');
  const locationSelect = document.getElementById('location-select');
  const searchBtn = document.getElementById('filter-search-btn');
  const resetBtn = document.getElementById('filter-reset-btn');
  const grid = document.getElementById('scholarship-grid');
  const noResults = document.querySelector('#no-results[style]');
  const items = grid ? Array.from(grid.querySelectorAll('.scholarship-item')) : [];

  function applyFilters() {
    const searchTerm = (searchInput.value || '').trim().toLowerCase();
    const category = categorySelect.value;
    const level = levelSelect.value;
    const location = locationSelect.value;
    let visible = 0;

    items.forEach(function (item) {
      const itemText = (
        item.dataset.title + ' ' +
        item.dataset.category + ' ' +
        item.dataset.level + ' ' +
        item.dataset.location
      ).toLowerCase();

      const categoryMatch = category === 'all' || item.dataset.category.includes(category);
      const levelMatch = level === 'all' || item.dataset.level.includes(level);
      const locationMatch = location === 'all' || item.dataset.location.includes(location);
      const searchMatch = !searchTerm || itemText.includes(searchTerm);

      const show = categoryMatch && levelMatch && locationMatch && searchMatch;
      item.style.display = show ? '' : 'none';

      if (show) visible++;
    });

    if (noResults) {
      noResults.style.display = visible === 0 ? 'block' : 'none';
    }
  }

  searchBtn?.addEventListener('click', applyFilters);

  [searchInput, categorySelect, levelSelect, locationSelect].forEach(function (el) {
    el?.addEventListener('change', applyFilters);
  });

  searchInput?.addEventListener('keyup', function (event) {
    if (event.key === 'Enter') applyFilters();
  });

  resetBtn?.addEventListener('click', function () {
    searchInput.value = '';
    categorySelect.value = 'all';
    levelSelect.value = 'all';
    locationSelect.value = 'all';
    applyFilters();
  });

  document.querySelectorAll('[data-quick-filter]').forEach(function (link) {
    link.addEventListener('click', function (event) {
      event.preventDefault();
      categorySelect.value = this.dataset.quickFilter;
      applyFilters();
      window.scrollTo({ top: document.getElementById('scholarship-listings').offsetTop - 90, behavior: 'smooth' });
    });
  });

  applyFilters();
});
</script>
@endsection
