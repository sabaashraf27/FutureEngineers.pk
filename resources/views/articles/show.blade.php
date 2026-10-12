@extends('layouts.app')

@section('body_class', 'article-details-page')

@section('content')
<style>

    /* ---------- Article hero ---------- */
    .article-hero {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 34px;
      display: flex;
      flex-wrap: wrap-reverse;
    }

    .article-hero .hero-content {
      flex: 1 1 380px;
      padding: 34px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .article-hero .hero-img-wrap {
      flex: 1 1 380px;
      min-height: 280px;
      position: relative;
      overflow: hidden;
    }

    .article-hero .hero-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      min-height: 280px;
    }

    .article-hero h1 {
      font-size: 40px;
      font-weight: 800;
      color: var(--heading-color, #222);
      line-height: 1.25;
      margin-bottom: 16px;
    }

    .article-hero .article-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 18px;
      font-size: 13.5px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
    }

    .article-hero .article-meta span {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .article-hero .article-meta i {
      color: var(--accent-color, #0d6efd);
    }

    @media (max-width: 767px) {
      .article-hero h1 { font-size: 28px; }
      .article-hero .hero-content { padding: 24px; }
    }

    /* ---------- Article body typography ---------- */
    .article-body {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 14px;
      padding: 38px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
      margin-bottom: 34px;
    }

    .article-body p {
      font-size: 17.5px;
      line-height: 1.8;
      color: var(--default-color, #212529);
      margin-bottom: 0;
    }

    @media (max-width: 767px) {
      .article-body { padding: 24px; }
      .article-body p { font-size: 16px; }
    }

    /* ---------- Author / source card ---------- */
    .author-card {
      display: flex;
      align-items: flex-start;
      gap: 18px;
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 24px;
      margin-bottom: 34px;
    }

    .author-card .author-avatar {
      flex-shrink: 0;
      width: 56px;
      height: 56px;
      border-radius: 50%;
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 85%);
      color: var(--accent-color, #0d6efd);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
    }

    .author-card h4 {
      font-size: 16.5px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 3px;
    }

    .author-card p.author-note {
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 25%);
      margin: 0;
    }

    .author-card a.source-link {
      font-size: 14px;
      font-weight: 600;
      color: var(--accent-color, #0d6efd);
      text-decoration: none;
    }

    .author-card a.source-link:hover {
      text-decoration: underline;
    }

    /* ---------- Sidebar (reuses listing page widget pattern) ---------- */
    .news-sidebar .widget {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 22px;
      margin-bottom: 26px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    }

    .news-sidebar .widget h3 {
      font-size: 16px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 16px;
      padding-bottom: 10px;
      border-bottom: 2px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 80%);
    }

    .news-sidebar .widget ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .news-sidebar .widget ul li {
      margin-bottom: 4px;
    }

    .news-sidebar .widget ul li a {
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

    .news-sidebar .widget ul li a:hover {
      color: var(--accent-color, #0d6efd);
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 94%);
      padding-left: 10px;
    }

    .news-sidebar .widget ul li a i:first-child {
      color: var(--accent-color, #0d6efd);
      margin-right: 8px;
    }

    .news-sidebar .trending-widget ol {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .news-sidebar .trending-widget li {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      padding: 10px 0;
      border-bottom: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
    }

    .news-sidebar .trending-widget li:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .news-sidebar .trending-widget .trend-num {
      font-size: 18px;
      font-weight: 800;
      color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 40%);
      min-width: 26px;
    }

    .news-sidebar .trending-widget a {
      font-size: 14px;
      font-weight: 500;
      color: var(--default-color, #212529);
      text-decoration: none;
      line-height: 1.4;
    }

    .news-sidebar .trending-widget a:hover {
      color: var(--accent-color, #0d6efd);
    }

    .news-sidebar .community-widget {
      background: linear-gradient(135deg, var(--accent-color, #0d6efd), color-mix(in srgb, var(--accent-color, #0d6efd), black 15%));
      color: var(--contrast-color, #fff);
      text-align: center;
    }

    .news-sidebar .community-widget h3 {
      color: var(--contrast-color, #fff);
      border-bottom-color: rgba(255, 255, 255, 0.25);
    }

    .news-sidebar .community-widget p {
      font-size: 14px;
      opacity: 0.92;
      margin-bottom: 16px;
    }

    .news-sidebar .community-widget .btn-join-community {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background-color: var(--contrast-color, #fff);
      color: var(--accent-color, #0d6efd) !important;
      font-weight: 700;
      font-size: 14px;
      padding: 10px 22px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.25s;
    }

    .news-sidebar .community-widget .btn-join-community:hover {
      filter: brightness(0.95);
    }

    /* ---------- Back to industry news ---------- */
    .btn-back-news {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background-color: transparent;
      border: 1.5px solid var(--accent-color, #0d6efd);
      color: var(--accent-color, #0d6efd) !important;
      font-weight: 600;
      font-size: 14.5px;
      padding: 9px 20px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.25s;
      margin-bottom: 24px;
    }

    .btn-back-news:hover {
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff) !important;
    }
</style>

    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Industry News &amp; Trends</a></li>
            <li class="breadcrumb-item active current">{{ $article->title }}</li>
          </ol>
        </nav>
      </div>
    </div>

    @php
      $recent = \App\Models\Article::where('id', '!=', $article->id)
          ->orderByDesc('publish_at')
          ->orderByDesc('created_at')
          ->take(3)
          ->get();
      $hasSourceLink = $article->source_link && $article->source_link !== '#';
    @endphp

    <div class="container">

      <a href="{{ route('articles.index') }}" class="btn-back-news"><i class="bi bi-arrow-left"></i> Back to Industry News</a>

      <!-- ================= ARTICLE HERO ================= -->
      <article class="article-hero" data-aos="fade-up" aria-labelledby="article-heading">
        <div class="hero-content">
          <h1 id="article-heading">{{ $article->title }}</h1>
          <div class="article-meta">
            @if($article->publish_at)
              <span><i class="bi bi-calendar3"></i> <time datetime="{{ $article->publish_at->format('Y-m-d') }}">{{ $article->publish_at->format('F j, Y') }}</time></span>
            @endif
          </div>
        </div>
        <div class="hero-img-wrap">
          <img src="{{ $article->thumbnail ? asset($article->thumbnail) : asset('assets/img/blog/blog-post-1.webp') }}" alt="{{ $article->title }}" loading="lazy">
        </div>
      </article><!-- End Article Hero -->

      <div class="row gy-5">

        <!-- ================= MAIN ARTICLE CONTENT ================= -->
        <div class="col-lg-8">

          <div class="article-body" data-aos="fade-up" data-aos-delay="100">
            <p>{{ $article->content }}</p>
          </div>

          <!-- ================= SOURCE ================= -->
          <div class="author-card">
            <div class="author-avatar"><i class="bi bi-building"></i></div>
            <div>
              <h4>FutureEngineers.pk</h4>
              @if($hasSourceLink)
                <p class="author-note">Originally reported by an external source.</p>
                <a href="{{ $article->source_link }}" target="_blank" rel="noopener" class="source-link">Read the original source <i class="bi bi-box-arrow-up-right"></i></a>
              @else
                <p class="author-note">Curated and published by the FutureEngineers.pk editorial team.</p>
              @endif
            </div>
          </div>

        </div>

        <!-- ================= SIDEBAR ================= -->
        <aside class="col-lg-4 news-sidebar">

          <div class="widget">
            <h3>Career Resources</h3>
            <ul>
              <li><a href="{{ route('jobs') }}"><span><i class="bi bi-briefcase"></i> Jobs &amp; Internships</span></a></li>
              <li><a href="{{ route('scholarships') }}"><span><i class="bi bi-mortarboard"></i> Scholarships</span></a></li>
              <li><a href="{{ route('courses') }}"><span><i class="bi bi-easel"></i> Courses &amp; Certifications</span></a></li>
              <li><a href="{{ route('cv-templates.index') }}"><span><i class="bi bi-file-earmark-text"></i> CV Templates</span></a></li>
            </ul>
          </div>

          @if($recent->isNotEmpty())
          <div class="widget trending-widget">
            <h3><i class="bi bi-newspaper"></i> More Industry News</h3>
            <ol>
              @foreach($recent as $index => $item)
                <li>
                  <span class="trend-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                  <a href="{{ route('articles.show', $item->id) }}">{{ $item->title }}</a>
                </li>
              @endforeach
            </ol>
          </div>
          @endif

          <div class="widget community-widget">
            <h3><i class="bi bi-envelope-heart"></i> Stay Updated</h3>
            <p>Get engineering career updates, opportunities and industry trends from FutureEngineers.pk.</p>
            <a href="https://chat.whatsapp.com/E6kjTG90j5VDZ4G5TMfj6V" target="_blank" rel="noopener" class="btn-join-community"><i class="bi bi-people"></i> Join Community</a>
          </div>

        </aside>

      </div>
    </div>
@endsection
