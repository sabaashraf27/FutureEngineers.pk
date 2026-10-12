@extends('layouts.app')

@section('body_class', 'scholarship-details-page')

@section('content')
<style>

    /* ---------- Status badges (same language as scholarships.html) ---------- */
    .scholarship-status-badge {
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

    /* ---------- Scholarship Header ---------- */
    .scholarship-detail-header {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 28px;
      margin-bottom: 30px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    }

    .scholarship-detail-title {
      font-size: 26px;
      font-weight: 700;
      color: var(--heading-color, #222);
      line-height: 1.3;
    }

    .scholarship-detail-provider {
      font-size: 15px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
      font-weight: 500;
      margin-bottom: 0;
    }

    .scholarship-detail-meta {
      list-style: none;
      display: flex;
      flex-wrap: wrap;
      gap: 22px;
      padding: 0;
      margin: 20px 0 0;
      font-size: 14px;
    }

    .scholarship-detail-meta li {
      display: flex;
      align-items: center;
      gap: 7px;
      color: var(--default-color, #212529);
    }

    .scholarship-detail-meta i {
      color: var(--accent-color, #0d6efd);
    }

    /* ---------- Content ---------- */
    .scholarship-detail-content h3 {
      font-size: 20px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-top: 34px;
      margin-bottom: 14px;
    }

    .scholarship-detail-content h3:first-child {
      margin-top: 0;
    }

    .scholarship-detail-content ul,
    .scholarship-detail-content ol {
      padding-left: 20px;
      margin-bottom: 0;
    }

    .scholarship-detail-content ul li,
    .scholarship-detail-content ol li {
      margin-bottom: 8px;
      color: var(--default-color, #212529);
    }

    .scholarship-benefits li::marker {
      color: var(--accent-color, #0d6efd);
    }

    /* ---------- Important Notes box ---------- */
    .scholarship-note-box {
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 93%);
      border-left: 4px solid var(--accent-color, #0d6efd);
      border-radius: 8px;
      padding: 20px 22px;
      margin-top: 34px;
    }

    .scholarship-note-box h3 {
      margin-top: 0 !important;
      font-size: 17px;
    }

    .scholarship-note-box i {
      color: var(--accent-color, #0d6efd);
      margin-right: 6px;
    }

    /* ---------- Apply box ---------- */
    .scholarship-apply-box {
      margin-top: 34px;
      padding-top: 28px;
      border-top: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 88%);
    }

    .scholarship-apply-box .apply-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 16px;
    }

    .scholarship-apply-box .btn-secondary-outline {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background-color: transparent;
      border: 1.5px solid var(--accent-color, #0d6efd);
      color: var(--accent-color, #0d6efd) !important;
      font-weight: 600;
      font-size: 15px;
      padding: 10px 22px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.25s;
    }

    .scholarship-apply-box .btn-secondary-outline:hover {
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff) !important;
    }

    /* ---------- Sidebar summary list ---------- */
    .scholarship-summary-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .scholarship-summary-list li {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      padding: 10px 0;
      border-bottom: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
    }

    .scholarship-summary-list li:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .scholarship-summary-list li i {
      color: var(--accent-color, #0d6efd);
      margin-top: 3px;
    }

    .scholarship-summary-list li div {
      display: flex;
      flex-direction: column;
    }

    .scholarship-summary-list li strong {
      font-size: 12.5px;
      text-transform: uppercase;
      letter-spacing: 0.3px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 35%);
      margin-bottom: 2px;
    }

    .scholarship-summary-list li span {
      font-size: 14.5px;
      color: var(--default-color, #212529);
    }

    /* Responsive: keep long titles and meta wrapping naturally */
    @media (max-width: 575px) {
      .scholarship-detail-title { font-size: 22px; }
      .scholarship-apply-box .apply-actions { flex-direction: column; }
      .scholarship-apply-box .apply-actions a { width: 100%; justify-content: center; }
    }
  
</style>

@php
    $details = $listing->details ?? [];
    $status = $details['status'] ?? 'Open';
    $statusKey = strtolower($status);
    $statusClass = match ($statusKey) {
        'closing soon' => 'status-closing',
        'upcoming' => 'status-upcoming',
        'closed' => 'status-closed',
        default => 'status-open',
    };

    $eligibility = $details['eligibility'] ?? [];
    $benefits = $details['benefits'] ?? [];
    $requirements = $details['requirements'] ?? [];
    $applicationProcess = $details['applicationProcess'] ?? [];
    $importantNotes = $details['importantNotes'] ?? [];
    $provider = $details['provider'] ?? 'Scholarship Provider';
    $level = $details['level'] ?? '—';
    $funding = $details['funding'] ?? '—';
    $category = $details['category'] ?? ($listing->category?->name ?? 'Scholarship');
    $deadlineText = $listing->deadline?->format('d F Y') ?? ($details['deadline'] ?? 'See official website');
    $applyUrl = $details['applyUrl'] ?? $listing->apply_link ?? '#';
    $websiteUrl = $details['websiteUrl'] ?? $applyUrl;
@endphp

<div class="page-title">
  <div class="breadcrumbs">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('scholarships') }}">Scholarships</a>
        </li>
        <li class="breadcrumb-item active current">Scholarship Details</li>
      </ol>
    </nav>
  </div>

  <div class="title-wrapper">
    <h1>{{ $listing->title }}</h1>
    <p>Explore scholarship eligibility, benefits, application details and important deadlines.</p>
  </div>
</div>

<section class="scholarship-details section">
  <div class="container">
    <div class="row gy-5">

      <div class="col-lg-8">

        <div class="scholarship-detail-header">
          <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
            <div>
              <span class="scholarship-status-badge {{ $statusClass }}">
                {{ $status }}
              </span>

              <h2 class="scholarship-detail-title mt-3">{{ $listing->title }}</h2>

              <p class="scholarship-detail-provider">{{ $provider }}</p>
            </div>
          </div>

          <ul class="scholarship-detail-meta">
            <li><i class="bi bi-mortarboard"></i><span>{{ $level }}</span></li>
            <li><i class="bi bi-geo-alt"></i><span>{{ $listing->location ?? '—' }}</span></li>
            <li><i class="bi bi-cash-coin"></i><span>{{ $funding }}</span></li>
            <li><i class="bi bi-calendar-event"></i><span>{{ $deadlineText }}</span></li>
            <li><i class="bi bi-tag"></i><span>{{ $category }}</span></li>
          </ul>
        </div>

        <div class="scholarship-detail-content">

          <h3>Scholarship Description</h3>
          <p>{{ $listing->description }}</p>

          <h3>Eligibility Criteria</h3>
          <ul>
            @forelse($eligibility as $item)
              <li>{{ $item }}</li>
            @empty
              <li>Eligibility information is available on the official scholarship portal.</li>
            @endforelse
          </ul>

          <h3>Scholarship Benefits</h3>
          <ul class="scholarship-benefits">
            @forelse($benefits as $item)
              <li>{{ $item }}</li>
            @empty
              <li>See the official scholarship provider for current funding details.</li>
            @endforelse
          </ul>

          <h3>Required Documents</h3>
          <ul>
            @forelse($requirements as $item)
              <li>{{ $item }}</li>
            @empty
              <li>Required documents vary by scholarship provider.</li>
            @endforelse
          </ul>

          <h3>How to Apply</h3>
          <ol>
            @forelse($applicationProcess as $item)
              <li>{{ $item }}</li>
            @empty
              <li>Follow the official scholarship provider's application instructions.</li>
            @endforelse
          </ol>

          <div class="scholarship-note-box">
            <h3>
              <i class="bi bi-exclamation-circle-fill"></i>
              Important Notes
            </h3>
            <ul>
              @forelse($importantNotes as $item)
                <li>{{ $item }}</li>
              @empty
                <li>Always verify the latest eligibility and deadline information on the official provider website.</li>
              @endforelse
            </ul>
          </div>

          <div class="scholarship-apply-box">
            <h3>Ready to Apply?</h3>
            <p>
              Review the official scholarship information and submit your application through the official provider portal.
            </p>

            <div class="apply-actions">
              <a href="{{ $applyUrl }}"
                 target="_blank"
                 rel="noopener"
                 class="btn opportunity-btn">
                Apply Now <i class="bi bi-arrow-right"></i>
              </a>

              <a href="{{ $websiteUrl }}"
                 target="_blank"
                 rel="noopener"
                 class="btn-secondary-outline">
                Official Website <i class="bi bi-box-arrow-up-right"></i>
              </a>
            </div>
          </div>

        </div>
      </div>

      <div class="col-lg-4">
        <aside class="scholarships-sidebar widgets-container">

          <div class="widget-item">
            <h3 class="widget-title">Scholarship Summary</h3>

            <ul class="scholarship-summary-list">

              <li>
                <i class="bi bi-bank"></i>
                <div><strong>Provider</strong><span>{{ $provider }}</span></div>
              </li>

              <li>
                <i class="bi bi-mortarboard"></i>
                <div><strong>Study Level</strong><span>{{ $level }}</span></div>
              </li>

              <li>
                <i class="bi bi-geo-alt"></i>
                <div><strong>Location</strong><span>{{ $listing->location ?? '—' }}</span></div>
              </li>

              <li>
                <i class="bi bi-tag"></i>
                <div><strong>Category</strong><span>{{ $category }}</span></div>
              </li>

              <li>
                <i class="bi bi-cash-coin"></i>
                <div><strong>Funding</strong><span>{{ $funding }}</span></div>
              </li>

              <li>
                <i class="bi bi-calendar-event"></i>
                <div><strong>Deadline</strong><span>{{ $deadlineText }}</span></div>
              </li>

              <li>
                <i class="bi bi-circle-fill"></i>
                <div><strong>Status</strong><span>{{ $status }}</span></div>
              </li>

            </ul>
          </div>

          <div class="widget-item categories-widget">
            <h3 class="widget-title">Career Resources</h3>
            <ul>
              <li><a href="{{ route('jobs') }}"><i class="bi bi-briefcase"></i><span>Jobs &amp; Internships</span></a></li>
              <li><a href="{{ route('courses') }}"><i class="bi bi-mortarboard"></i><span>Courses &amp; Certifications</span></a></li>
              <li><a href="{{ route('cv-templates.index') }}"><i class="bi bi-file-earmark-text"></i><span>CV Templates</span></a></li>
              <li><a href="{{ route('articles.index') }}"><i class="bi bi-newspaper"></i><span>Industry News &amp; Trends</span></a></li>
            </ul>
          </div>

          <div class="widget-item cta-widget">
            <h3 class="widget-title">Find More Scholarships</h3>
            <p>Explore more financial aid and scholarship opportunities for engineering students.</p>
            <a href="{{ route('scholarships') }}" class="btn">Browse Scholarships</a>
          </div>

        </aside>
      </div>

    </div>
  </div>
</section>
@endsection
