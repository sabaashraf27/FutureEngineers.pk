@extends('layouts.app')

@section('body_class', 'cv-details-page')

@section('content')
<style>

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

    /* ---------- Buttons ---------- */
    .btn-view-cv {
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
      cursor: pointer;
    }

    .btn-view-cv:hover { filter: brightness(0.92); color: var(--contrast-color, #fff); }

    .btn-download-sample {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background-color: transparent;
      border: 1.5px solid var(--accent-color, #0d6efd);
      color: var(--accent-color, #0d6efd) !important;
      font-weight: 600;
      font-size: 14.5px;
      padding: 10px 24px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s;
      cursor: pointer;
    }

    .btn-download-sample:hover {
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff) !important;
    }

    /* ---------- CV Detail Hero ---------- */
    .cv-detail-hero {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 14px;
      padding: 32px;
      margin-bottom: 40px;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
      display: flex;
      flex-wrap: wrap;
      gap: 32px;
    }

    .cv-detail-hero .cv-preview-col {
      flex: 0 0 340px;
      max-width: 340px;
    }

    .cv-detail-hero .cv-preview-col img {
      width: 100%;
      height: 440px;
      object-fit: cover;
      object-position: top center;
      border-radius: 10px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.14);
      display: block;
    }

    .cv-detail-hero .cv-info-col {
      flex: 1 1 360px;
    }

    .cv-detail-hero h1 {
      font-size: 28px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin: 10px 0 6px;
    }

    .cv-detail-hero .suitable-for {
      font-size: 15.5px;
      font-weight: 500;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 25%);
      margin-bottom: 12px;
    }

    .cv-detail-hero .short-desc {
      font-size: 15px;
      color: var(--default-color, #212529);
      margin-bottom: 18px;
    }

    .cv-meta-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px 24px;
      margin-bottom: 22px;
      padding: 18px;
      background-color: color-mix(in srgb, var(--default-color, #212529), transparent 96%);
      border-radius: 10px;
    }

    .cv-meta-grid .meta-item .meta-label {
      display: block;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.4px;
      font-weight: 700;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 40%);
      margin-bottom: 2px;
    }

    .cv-meta-grid .meta-item .meta-value {
      font-size: 14.5px;
      font-weight: 600;
      color: var(--heading-color, #222);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .cv-meta-grid .meta-item .meta-value i { color: var(--accent-color, #0d6efd); }

    .cv-detail-hero .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
    }

    /* ---------- Section blocks ---------- */
    .cv-detail-section {
      margin-bottom: 44px;
    }

    .cv-detail-section h2 {
      font-size: 22px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 16px;
      padding-bottom: 10px;
      border-bottom: 2px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 80%);
    }

    .cv-detail-section p.section-lead {
      font-size: 15px;
      line-height: 1.75;
      color: var(--default-color, #212529);
    }

    /* Who is this for - cards */
    .audience-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 14px;
    }

    .audience-card {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 90%);
      border-radius: 10px;
      padding: 16px;
    }

    .audience-card i {
      font-size: 20px;
      color: var(--accent-color, #0d6efd);
      margin-top: 2px;
    }

    .audience-card span { font-size: 14.5px; font-weight: 500; color: var(--default-color, #212529); }

    /* Key Features */
    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 16px;
    }

    .feature-card {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 90%);
      border-radius: 10px;
      padding: 18px;
      display: flex;
      align-items: flex-start;
      gap: 12px;
      transition: 0.25s;
    }

    .feature-card:hover {
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
      transform: translateY(-3px);
    }

    .feature-card .feature-icon {
      width: 40px;
      height: 40px;
      flex-shrink: 0;
      border-radius: 8px;
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 88%);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      color: var(--accent-color, #0d6efd);
    }

    .feature-card .feature-text {
      font-size: 14.5px;
      font-weight: 600;
      color: var(--heading-color, #222);
    }

    /* Recommended sections - numbered list */
    .sections-list {
      list-style: none;
      padding: 0;
      margin: 0;
      counter-reset: cv-section-counter;
    }

    .sections-list li {
      counter-increment: cv-section-counter;
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 12px 0;
      border-bottom: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      font-size: 15px;
      color: var(--default-color, #212529);
      font-weight: 500;
    }

    .sections-list li:last-child { border-bottom: none; }

    .sections-list li::before {
      content: counter(cv-section-counter);
      flex-shrink: 0;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff);
      font-size: 13px;
      font-weight: 700;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* CV Tips */
    .tips-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 12px;
    }

    .tips-list li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      font-size: 14.5px;
      color: var(--default-color, #212529);
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 95%);
      border: 1px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 80%);
      border-radius: 8px;
      padding: 12px 14px;
    }

    .tips-list li i { color: var(--accent-color, #0d6efd); margin-top: 2px; flex-shrink: 0; }

    /* Ready to Build CTA */
    .cv-build-cta {
      background: linear-gradient(135deg, color-mix(in srgb, var(--accent-color, #0d6efd), transparent 88%), var(--surface-color, #fff));
      border: 1px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 75%);
      border-radius: 14px;
      padding: 40px;
      text-align: center;
      margin-bottom: 44px;
    }

    .cv-build-cta h2 {
      font-size: 24px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 10px;
      border-bottom: none;
      padding-bottom: 0;
    }

    .cv-build-cta p {
      font-size: 15px;
      color: var(--default-color, #212529);
      max-width: 620px;
      margin: 0 auto 22px;
    }

    .cv-build-cta .hero-actions {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 12px;
    }

    /* Related CV templates */
    .related-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 20px;
    }

    .related-card {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      overflow: hidden;
      text-decoration: none;
      display: block;
      transition: 0.3s;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    }

    .related-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 26px rgba(0, 0, 0, 0.09);
    }

    .related-card .related-img { height: 170px; overflow: hidden; background-color: color-mix(in srgb, var(--default-color, #212529), transparent 96%); }
    .related-card .related-img img { width: 100%; height: 100%; object-fit: cover; object-position: top center; }
    .related-card .related-body { padding: 16px 18px; }
    .related-card .related-body h3 { font-size: 16px; font-weight: 700; color: var(--heading-color, #222); margin-bottom: 4px; }
    .related-card .related-body p { font-size: 13.5px; color: color-mix(in srgb, var(--default-color, #212529), transparent 30%); margin-bottom: 0; }

    /* Career Resources */
    .resources-strip {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 14px;
    }

    .resource-link-card {
      display: flex;
      align-items: center;
      gap: 12px;
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 90%);
      border-radius: 10px;
      padding: 16px 18px;
      text-decoration: none;
      transition: 0.25s;
    }

    .resource-link-card:hover {
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 94%);
      border-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 70%);
    }

    .resource-link-card i {
      font-size: 20px;
      color: var(--accent-color, #0d6efd);
      flex-shrink: 0;
    }

    .resource-link-card span { font-size: 14.5px; font-weight: 600; color: var(--heading-color, #222); }

    @media (max-width: 767px) {
      .cv-detail-hero { padding: 20px; }
      .cv-detail-hero .cv-preview-col { max-width: 100%; flex-basis: 100%; }
      .cv-detail-hero .cv-preview-col img { height: 300px; }
      .cv-meta-grid { grid-template-columns: 1fr 1fr; }
      .cv-build-cta { padding: 28px 20px; }
    }
</style>

    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cv-templates.index') }}">CV Templates</a></li>
            <li class="breadcrumb-item active current">{{ $template->title }}</li>
          </ol>
        </nav>
      </div>
    </div>

    @php
      $d = $template->details ?? [];
      $related = \App\Models\CvTemplate::where('id', '!=', $template->id)
          ->orderByDesc('created_at')
          ->take(3)
          ->get();
    @endphp

    <div class="container">

      <!-- ================= CV DETAIL HERO ================= -->
      <section class="cv-detail-hero" data-aos="fade-up" aria-labelledby="cv-title-heading">
        <div class="cv-preview-col">
          <img src="{{ $template->thumbnail ? asset($template->thumbnail) : asset('assets/img/blog/blog-post-square-1.webp') }}" alt="Preview of the {{ $template->title }} template">
        </div>
        <div class="cv-info-col">

          @if(!empty($d['badges']))
            <div id="cv-badges">
              @foreach($d['badges'] as $badge)
                <span class="type-badge {{ $badge['cls'] ?? '' }}"><i class="bi {{ $badge['icon'] ?? 'bi-tag' }}"></i> {{ $badge['label'] ?? '' }}</span>
              @endforeach
            </div>
          @endif

          <h1 id="cv-title-heading">{{ $template->title }}</h1>
          <p class="suitable-for">Suitable For: {{ $d['suitableFor'] ?? 'Engineering Students & Graduates' }}</p>
          <p class="short-desc">{{ $d['description'] ?? '' }}</p>

          <div class="cv-meta-grid">
            @if(!empty($d['field']))
              <div class="meta-item">
                <span class="meta-label">Field</span>
                <span class="meta-value"><i class="bi bi-building"></i> {{ $d['field'] }}</span>
              </div>
            @endif
            @if(!empty($d['level']))
              <div class="meta-item">
                <span class="meta-label">Level</span>
                <span class="meta-value"><i class="bi bi-briefcase"></i> {{ $d['level'] }}</span>
              </div>
            @endif
            @if(!empty($d['format']))
              <div class="meta-item">
                <span class="meta-label">Format</span>
                <span class="meta-value"><i class="bi bi-file-earmark-text"></i> {{ $d['format'] }}</span>
              </div>
            @endif
            @if(!empty($d['templateType']))
              <div class="meta-item">
                <span class="meta-label">Type</span>
                <span class="meta-value"><i class="bi bi-person"></i> {{ $d['templateType'] }}</span>
              </div>
            @endif
          </div>

          <div class="hero-actions">
            @if($template->file_path)
              <a href="{{ asset($template->file_path) }}" target="_blank" rel="noopener" class="btn-view-cv"><i class="bi bi-eye"></i> Preview CV</a>
              <a href="{{ asset($template->file_path) }}" download class="btn-download-sample"><i class="bi bi-download"></i> Download Template</a>
            @endif
          </div>
        </div>
      </section><!-- End CV Detail Hero -->

      @if(!empty($d['longDescription']))
      <!-- ================= ABOUT ================= -->
      <section class="cv-detail-section" aria-labelledby="about-heading">
        <h2 id="about-heading">About This CV Template</h2>
        <p class="section-lead">{{ $d['longDescription'] }}</p>
      </section>
      @endif

      @if(!empty($d['audience']))
      <!-- ================= WHO IS THIS FOR ================= -->
      <section class="cv-detail-section" aria-labelledby="audience-heading">
        <h2 id="audience-heading">Who Is This Template For?</h2>
        <div class="audience-grid">
          @foreach($d['audience'] as $item)
            <div class="audience-card">
              <i class="bi bi-person-check"></i>
              <span>{{ $item }}</span>
            </div>
          @endforeach
        </div>
      </section>
      @endif

      @if(!empty($d['features']))
      <!-- ================= KEY FEATURES ================= -->
      <section class="cv-detail-section" aria-labelledby="features-heading">
        <h2 id="features-heading">Key Features</h2>
        <div class="features-grid">
          @foreach($d['features'] as $feature)
            <div class="feature-card">
              <div class="feature-icon"><i class="bi {{ $feature['icon'] ?? 'bi-check2-circle' }}"></i></div>
              <div class="feature-text">{{ $feature['label'] ?? '' }}</div>
            </div>
          @endforeach
        </div>
      </section>
      @endif

      @if(!empty($d['sections']))
      <!-- ================= RECOMMENDED SECTIONS ================= -->
      <section class="cv-detail-section" aria-labelledby="sections-heading">
        <h2 id="sections-heading">Recommended CV Sections</h2>
        <ol class="sections-list">
          @foreach($d['sections'] as $section)
            <li>{{ $section }}</li>
          @endforeach
        </ol>
      </section>
      @endif

      @if(!empty($d['tips']))
      <!-- ================= TIPS ================= -->
      <section class="cv-detail-section" aria-labelledby="tips-heading">
        <h2 id="tips-heading">Tips for Using This CV Template</h2>
        <ul class="tips-list">
          @foreach($d['tips'] as $tip)
            <li><i class="bi bi-check2-circle"></i> {{ $tip }}</li>
          @endforeach
        </ul>
      </section>
      @endif

      <!-- ================= CTA ================= -->
      <section class="cv-build-cta" data-aos="fade-up">
        <h2>Ready to Build Your CV?</h2>
        <p>Download this template and start customizing it with your own projects, education and experience.</p>
        <div class="hero-actions">
          @if($template->file_path)
            <a href="{{ asset($template->file_path) }}" target="_blank" rel="noopener" class="btn-view-cv"><i class="bi bi-eye"></i> Preview Template</a>
            <a href="{{ asset($template->file_path) }}" download class="btn-download-sample"><i class="bi bi-download"></i> Download Template</a>
          @endif
        </div>
      </section>

      @if($related->isNotEmpty())
      <!-- ================= RELATED TEMPLATES ================= -->
      <section class="cv-detail-section" aria-labelledby="related-heading">
        <h2 id="related-heading">Related CV Templates</h2>
        <div class="related-grid">
          @foreach($related as $item)
            @php $rd = $item->details ?? []; @endphp
            <a href="{{ route('cv-templates.show', $item->id) }}" class="related-card">
              <div class="related-img">
                <img src="{{ $item->thumbnail ? asset($item->thumbnail) : asset('assets/img/blog/blog-post-square-1.webp') }}" alt="Preview of the {{ $item->title }} template">
              </div>
              <div class="related-body">
                <h3>{{ $item->title }}</h3>
                <p>{{ $rd['suitableFor'] ?? 'Engineering Students & Graduates' }}</p>
              </div>
            </a>
          @endforeach
        </div>
      </section>
      @endif

      <!-- ================= CAREER RESOURCES ================= -->
      <section class="cv-detail-section" aria-labelledby="resources-heading">
        <h2 id="resources-heading">Career Resources</h2>
        <div class="resources-strip">
          <a href="{{ route('jobs') }}" class="resource-link-card"><i class="bi bi-briefcase"></i> <span>Jobs &amp; Internships</span></a>
          <a href="{{ route('scholarships') }}" class="resource-link-card"><i class="bi bi-mortarboard"></i> <span>Scholarships</span></a>
          <a href="{{ route('courses') }}" class="resource-link-card"><i class="bi bi-easel"></i> <span>Courses &amp; Certifications</span></a>
          <a href="{{ route('articles.index') }}" class="resource-link-card"><i class="bi bi-graph-up"></i> <span>Industry News &amp; Trends</span></a>
        </div>
      </section>

    </div>
@endsection
