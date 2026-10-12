@extends('layouts.app')

@section('body_class', 'course-details-page')

@section('content')
<style>

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

    .badge-certificate { background-color: rgba(111, 66, 193, 0.12); color: #6f42c1; }

    .course-category-badge {
      display: inline-block;
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff);
      font-size: 11.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.4px;
      padding: 6px 14px;
      border-radius: 30px;
    }

    /* ---------- Course Detail Header ---------- */
    .course-detail-header {
      margin-bottom: 30px;
    }

    .course-detail-title {
      font-size: 26px;
      font-weight: 700;
      color: var(--heading-color, #222);
      line-height: 1.3;
    }

    .course-detail-provider {
      font-size: 15px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
      font-weight: 500;
      margin-bottom: 4px;
    }

    .course-detail-summary {
      font-size: 15.5px;
      color: var(--default-color, #212529);
      margin-top: 8px;
    }

    .course-detail-meta {
      list-style: none;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      padding: 0;
      margin: 18px 0 0;
      font-size: 14px;
      border-top: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 90%);
      padding-top: 18px;
    }

    .course-detail-meta li {
      display: flex;
      align-items: center;
      gap: 7px;
      color: var(--default-color, #212529);
    }

    .course-detail-meta i {
      color: var(--accent-color, #0d6efd);
    }

    /* ---------- Course Detail Content ---------- */
    .course-detail-content h3 {
      font-size: 19px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-top: 34px;
      margin-bottom: 14px;
    }

    .course-detail-content p,
    .course-detail-content ul li {
      font-size: 15px;
      color: var(--default-color, #212529);
      line-height: 1.7;
    }

    .course-detail-content ul {
      padding-left: 20px;
    }

    .course-curriculum-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .course-curriculum-list li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      padding: 12px 14px;
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 8px;
      margin-bottom: 10px;
      font-size: 14.5px;
      color: var(--default-color, #212529);
    }

    .course-curriculum-list li .module-index {
      flex-shrink: 0;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 26px;
      height: 26px;
      border-radius: 50%;
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 85%);
      color: var(--accent-color, #0d6efd);
      font-weight: 700;
      font-size: 12.5px;
    }

    .course-skills {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 4px;
    }

    .course-skills span {
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 88%);
      color: var(--accent-color, #0d6efd);
      font-size: 13px;
      font-weight: 600;
      padding: 7px 14px;
      border-radius: 30px;
    }

    .course-apply-box {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 90%);
      border-radius: 12px;
      padding: 24px;
      margin-top: 34px;
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

    .course-summary-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .course-summary-list li {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      margin-bottom: 16px;
    }

    .course-summary-list li:last-child {
      margin-bottom: 0;
    }

    .course-summary-list i {
      color: var(--accent-color, #0d6efd);
      font-size: 16px;
      margin-top: 3px;
    }

    .course-summary-list strong {
      display: block;
      font-size: 12.5px;
      text-transform: uppercase;
      letter-spacing: 0.3px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 35%);
      margin-bottom: 2px;
    }

    .course-summary-list span {
      font-size: 14.5px;
      color: var(--default-color, #212529);
      font-weight: 500;
    }

    .course-sidebar .widget ul.resource-links {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .course-sidebar .widget ul.resource-links li {
      margin-bottom: 4px;
    }

    .course-sidebar .widget ul.resource-links li a {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 14.5px;
      color: var(--default-color, #212529);
      text-decoration: none;
      padding: 9px 4px;
      border-radius: 6px;
      transition: 0.2s;
    }

    .course-sidebar .widget ul.resource-links li a:hover {
      color: var(--accent-color, #0d6efd);
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 94%);
      padding-left: 10px;
    }

    .course-sidebar .widget ul.resource-links li a i {
      color: var(--accent-color, #0d6efd);
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

    @media (max-width: 767px) {
      .course-detail-title { font-size: 21px; }
      .course-detail-meta { gap: 14px; }
    }
</style>

    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('courses') }}">Courses &amp; Certifications</a></li>
            <li class="breadcrumb-item active current">Course Details</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>{{ $listing->title }}</h1>
        <p>Explore the course details and enrollment information.</p>
      </div>
    </div>

    @php
      $details = $listing->details ?? [];
      $hasCertificate = !empty($details['certificate']);
    @endphp

    <section class="job-details section">
      <div class="container">
        <div class="row gy-5">

          <!-- LEFT CONTENT -->
          <div class="col-lg-8">

            <div class="course-detail-header">

              @if($listing->category)
                <span class="course-category-badge">{{ $listing->category->name }}</span>
              @endif

              <h2 class="course-detail-title mt-3">{{ $listing->title }}</h2>

              <p class="course-detail-provider">
                Provider: {{ $listing->company_name ?? $details['provider'] ?? 'FutureEngineers.pk Learning Partner' }}
              </p>

              <p class="course-detail-summary">
                {{ $details['short_description'] ?? $listing->description }}
              </p>

              <ul class="course-detail-meta">
                @if($listing->category)
                  <li><i class="bi bi-tags"></i> <span>{{ $listing->category->name }}</span></li>
                @endif
                @if(!empty($details['level']))
                  <li><i class="bi bi-bar-chart"></i> <span>{{ $details['level'] }}</span></li>
                @endif
                @if(!empty($details['duration']))
                  <li><i class="bi bi-clock"></i> <span>{{ $details['duration'] }}</span></li>
                @endif
                @if(!empty($details['mode']))
                  <li><i class="bi bi-laptop"></i> <span>{{ $details['mode'] }}</span></li>
                @endif
                <li><i class="bi bi-award"></i> <span>{{ $hasCertificate ? 'Certificate Available' : 'No Certificate' }}</span></li>
              </ul>

            </div>

            <div class="course-detail-content">

              @if(!empty($details['overview']))
                <h3>Course Overview</h3>
                <p>{{ $details['overview'] }}</p>
              @endif

              @if(!empty($details['learningOutcomes']))
                <h3>What You&rsquo;ll Learn</h3>
                <ul>
                  @foreach($details['learningOutcomes'] as $item)
                    <li>{{ $item }}</li>
                  @endforeach
                </ul>
              @endif

              @if(!empty($details['curriculum']))
                <h3>Course Topics &amp; Curriculum</h3>
                <ol class="course-curriculum-list">
                  @foreach($details['curriculum'] as $index => $module)
                    <li>
                      <span class="module-index">{{ $index + 1 }}</span>
                      <span>{{ $module }}</span>
                    </li>
                  @endforeach
                </ol>
              @endif

              @if(!empty($details['audience']))
                <h3>Who Should Take This Course?</h3>
                <ul>
                  @foreach($details['audience'] as $item)
                    <li>{{ $item }}</li>
                  @endforeach
                </ul>
              @endif

              @if(!empty($details['requirements']))
                <h3>Requirements / Prerequisites</h3>
                <ul>
                  @foreach($details['requirements'] as $item)
                    <li>{{ $item }}</li>
                  @endforeach
                </ul>
              @endif

              @if(!empty($details['skills']))
                <h3>Skills You&rsquo;ll Gain</h3>
                <div class="course-skills">
                  @foreach($details['skills'] as $skill)
                    <span>{{ $skill }}</span>
                  @endforeach
                </div>
              @endif

              <h3>Certification</h3>
              <p>
                {{ $hasCertificate
                    ? 'This course includes a certificate of completion, awarded by the course provider.'
                    : 'This course does not include a formal certificate of completion.' }}
              </p>

              <div class="course-apply-box">
                <h3>Interested in This Course?</h3>
                <p>
                  Interested in this course? Reach out to the FutureEngineers.pk team for guidance
                  on enrollment, pricing and current availability with the provider.
                </p>

                @if($listing->apply_link && $listing->apply_link !== '#')
                  <a href="{{ $listing->apply_link }}" target="_blank" rel="noopener" class="btn-view-course">
                    Inquire About This Course <i class="bi bi-arrow-right"></i>
                  </a>
                @else
                  <a href="mailto:Futureengineers.pk@gmail.com?subject={{ rawurlencode('Course Inquiry: ' . $listing->title) }}&body={{ rawurlencode('Hi FutureEngineers.pk team,' . "\n\n" . 'I would like to know more about enrolling in the ' . $listing->title . ' course.' . "\n\n" . 'Thank you.') }}" class="btn-view-course">
                    Inquire About This Course <i class="bi bi-arrow-right"></i>
                  </a>
                @endif
              </div>

            </div>
          </div>

          <!-- RIGHT SIDEBAR -->
          <div class="col-lg-4 course-sidebar">
            <aside class="widgets-container">

              <div class="widget">
                <h3>Course Summary</h3>
                <ul class="course-summary-list">
                  <li>
                    <i class="bi bi-building"></i>
                    <div>
                      <strong>Provider</strong>
                      <span>{{ $listing->company_name ?? $details['provider'] ?? 'Not specified' }}</span>
                    </div>
                  </li>
                  @if($listing->category)
                    <li>
                      <i class="bi bi-tags"></i>
                      <div>
                        <strong>Category</strong>
                        <span>{{ $listing->category->name }}</span>
                      </div>
                    </li>
                  @endif
                  @if(!empty($details['level']))
                    <li>
                      <i class="bi bi-bar-chart"></i>
                      <div>
                        <strong>Level</strong>
                        <span>{{ $details['level'] }}</span>
                      </div>
                    </li>
                  @endif
                  @if(!empty($details['duration']))
                    <li>
                      <i class="bi bi-clock"></i>
                      <div>
                        <strong>Duration</strong>
                        <span>{{ $details['duration'] }}</span>
                      </div>
                    </li>
                  @endif
                  @if(!empty($details['mode']))
                    <li>
                      <i class="bi bi-laptop"></i>
                      <div>
                        <strong>Learning Mode</strong>
                        <span>{{ $details['mode'] }}</span>
                      </div>
                    </li>
                  @endif
                  <li>
                    <i class="bi bi-award"></i>
                    <div>
                      <strong>Certificate</strong>
                      <span>{{ $hasCertificate ? 'Certificate Available' : 'No Certificate' }}</span>
                    </div>
                  </li>
                </ul>
              </div>

              <div class="widget">
                <h3>Career Resources</h3>
                <ul class="resource-links">
                  <li><a href="{{ route('jobs') }}"><i class="bi bi-briefcase"></i> <span>Jobs &amp; Internships</span></a></li>
                  <li><a href="{{ route('scholarships') }}"><i class="bi bi-mortarboard"></i> <span>Scholarships</span></a></li>
                  <li><a href="{{ route('cv-templates.index') }}"><i class="bi bi-file-earmark-text"></i> <span>CV Templates</span></a></li>
                  <li><a href="{{ route('articles.index') }}"><i class="bi bi-newspaper"></i> <span>Industry News &amp; Trends</span></a></li>
                </ul>
              </div>

              <div class="widget tip-widget">
                <h3><i class="bi bi-lightbulb"></i> Learning Tip</h3>
                <p><i class="bi bi-check2-circle"></i> Choose courses that build practical skills you can demonstrate through projects, portfolios or certifications.</p>
              </div>

            </aside>
          </div>

        </div>
      </div>
    </section>
@endsection
