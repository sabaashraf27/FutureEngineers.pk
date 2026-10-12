@extends('layouts.app')

@section('body_class', 'news-page')

@section('content')
<style>

    /* ---------- Search bar ---------- */
    .news-search-bar {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 16px 20px;
      margin-bottom: 36px;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      align-items: center;
    }

    .news-search-bar .search-input-wrap {
      position: relative;
      flex: 1 1 260px;
    }

    .news-search-bar .search-input-wrap i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: color-mix(in srgb, var(--default-color, #212529), transparent 40%);
    }

    .news-search-bar input[type="text"] {
      width: 100%;
      border-radius: 8px;
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 80%);
      font-size: 14.5px;
      padding: 10px 14px 10px 40px;
    }

    .news-search-bar input[type="text"]:focus {
      outline: none;
      border-color: var(--accent-color, #0d6efd);
      box-shadow: 0 0 0 3px color-mix(in srgb, var(--accent-color, #0d6efd), transparent 80%);
    }

    .news-search-bar .btn-clear-search {
      background-color: transparent;
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 70%);
      color: var(--default-color, #212529);
      font-weight: 600;
      border-radius: 8px;
      padding: 10px 18px;
      font-size: 14px;
      transition: 0.3s;
    }

    .news-search-bar .btn-clear-search:hover {
      background-color: color-mix(in srgb, var(--default-color, #212529), transparent 94%);
    }

    /* ---------- Featured News ---------- */
    .featured-news {
      background: linear-gradient(135deg, color-mix(in srgb, var(--accent-color, #0d6efd), transparent 88%), var(--surface-color, #fff));
      border: 1px solid color-mix(in srgb, var(--accent-color, #0d6efd), transparent 75%);
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 45px;
      display: flex;
      flex-wrap: wrap;
    }

    .featured-news .featured-img-wrap {
      flex: 1 1 380px;
      min-height: 260px;
      position: relative;
      overflow: hidden;
    }

    .featured-news .featured-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      min-height: 260px;
    }

    .featured-news .featured-content {
      flex: 1 1 380px;
      padding: 32px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .featured-news .badge-row {
      margin-bottom: 14px;
    }

    .featured-news .featured-ribbon {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background-color: var(--accent-color, #0d6efd);
      color: var(--contrast-color, #fff);
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      padding: 5px 13px;
      border-radius: 30px;
      margin-right: 8px;
    }

    .featured-news h2 {
      font-size: 26px;
      font-weight: 700;
      color: var(--heading-color, #222);
      line-height: 1.3;
      margin-bottom: 12px;
    }

    .featured-news h2 a {
      color: inherit;
      text-decoration: none;
    }

    .featured-news h2 a:hover {
      color: var(--accent-color, #0d6efd);
    }

    .featured-news .excerpt {
      font-size: 15px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 15%);
      margin-bottom: 18px;
    }

    .featured-news .article-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 18px;
      font-size: 13.5px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
      margin-bottom: 20px;
    }

    .featured-news .article-meta span {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .featured-news .article-meta i {
      color: var(--accent-color, #0d6efd);
    }

    .btn-read-article {
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
      align-self: flex-start;
    }

    .btn-read-article:hover {
      filter: brightness(0.92);
      color: var(--contrast-color, #fff);
    }

    /* ---------- News article cards ---------- */
    .news-item-card {
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

    .news-item-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 26px rgba(0, 0, 0, 0.09);
    }

    .news-item-card .card-img-wrap {
      position: relative;
      overflow: hidden;
      height: 180px;
    }

    .news-item-card .card-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .news-item-card:hover .card-img-wrap img {
      transform: scale(1.06);
    }

    .news-item-card .card-body-custom {
      padding: 18px 20px 20px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .news-item-card h3.card-title {
      font-size: 17px;
      font-weight: 700;
      color: var(--heading-color, #222);
      line-height: 1.35;
      margin-bottom: 10px;
    }

    .news-item-card h3.card-title a {
      color: inherit;
      text-decoration: none;
    }

    .news-item-card h3.card-title a:hover {
      color: var(--accent-color, #0d6efd);
    }

    .news-item-card .card-desc {
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 15%);
      margin-bottom: 16px;
      flex-grow: 1;
    }

    .news-item-card .card-footer-custom {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      margin-top: auto;
      padding-top: 14px;
      border-top: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
    }

    .news-item-card .article-meta-small {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      font-size: 12.5px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 30%);
    }

    .news-item-card .article-meta-small span {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .news-item-card .article-meta-small i {
      color: var(--accent-color, #0d6efd);
    }

    .btn-read-more {
      background-color: transparent;
      border: 1.5px solid var(--accent-color, #0d6efd);
      color: var(--accent-color, #0d6efd) !important;
      font-size: 13px;
      font-weight: 600;
      padding: 6px 14px;
      border-radius: 7px;
      text-decoration: none;
      white-space: nowrap;
      transition: 0.25s;
    }

    .btn-read-more:hover {
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

    /* Recent articles widget */
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

    /* Community CTA widget */
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

    @media (max-width: 991px) {
      .featured-news .featured-content { padding: 22px; }
      .news-search-bar { padding: 14px; }
    }
</style>

    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item active current">Industry News &amp; Trends</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>Industry News &amp; Trends</h1>
        <p>Stay updated with engineering, technology and industry developments shaping career opportunities in Pakistan and around the world.</p>
      </div>
    </div>

    @php
      $featured = $articles->first();
      $rest = $articles->skip($featured ? 1 : 0);
      $recent = $articles->take(3);
    @endphp

    <div class="container">

      @if($featured)
      <!-- ================= FEATURED NEWS ================= -->
      <article class="featured-news" data-aos="fade-up" aria-labelledby="featured-heading">
        <div class="featured-img-wrap">
          <img src="{{ $featured->thumbnail ? asset($featured->thumbnail) : asset('assets/img/blog/blog-post-1.webp') }}" alt="{{ $featured->title }}" loading="lazy">
        </div>
        <div class="featured-content">
          <div class="badge-row">
            <span class="featured-ribbon"><i class="bi bi-star-fill"></i> Featured</span>
          </div>
          <h2 id="featured-heading"><a href="{{ route('articles.show', $featured->id) }}">{{ $featured->title }}</a></h2>
          <p class="excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($featured->content), 220) }}</p>
          <div class="article-meta">
            @if($featured->publish_at)
              <span><i class="bi bi-calendar3"></i> <time datetime="{{ $featured->publish_at->format('Y-m-d') }}">{{ $featured->publish_at->format('F j, Y') }}</time></span>
            @endif
          </div>
          <a href="{{ route('articles.show', $featured->id) }}" class="btn-read-article">Read Article <i class="bi bi-arrow-right"></i></a>
        </div>
      </article><!-- End Featured News -->
      @endif

      <!-- ================= SEARCH ================= -->
      <div class="news-search-bar">
        <div class="search-input-wrap">
          <i class="bi bi-search"></i>
          <label for="search-input" class="visually-hidden">Search engineering news and trends</label>
          <input type="text" id="search-input" placeholder="Search engineering news and trends...">
        </div>
        <button type="button" id="clear-search-btn" class="btn-clear-search" aria-label="Clear search">
          <i class="bi bi-x-circle"></i> Clear
        </button>
      </div>

      <div class="row">
        <!-- Main news listings -->
        <div class="col-lg-8">

          <section id="news-listings" class="category-postst section">
            <h2 class="visually-hidden">Latest Industry News</h2>
            <div class="row gy-4" id="news-grid" data-aos="fade-up" data-aos-delay="100">

              @forelse($rest as $article)
                <div class="col-md-6 news-item" data-title="{{ strtolower($article->title) }}">
                  <article class="news-item-card">
                    <div class="card-img-wrap">
                      <img src="{{ $article->thumbnail ? asset($article->thumbnail) : asset('assets/img/blog/blog-post-1.webp') }}" alt="{{ $article->title }}" loading="lazy">
                    </div>
                    <div class="card-body-custom">
                      <h3 class="card-title"><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h3>
                      <p class="card-desc">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 130) }}</p>
                      <div class="card-footer-custom">
                        <div class="article-meta-small">
                          @if($article->publish_at)
                            <span><i class="bi bi-calendar3"></i> <time datetime="{{ $article->publish_at->format('Y-m-d') }}">{{ $article->publish_at->format('M j, Y') }}</time></span>
                          @endif
                        </div>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn-read-more">Read More</a>
                      </div>
                    </div>
                  </article>
                </div>
              @empty
                <div class="col-12">
                  <p class="text-center">No articles are available right now.</p>
                </div>
              @endforelse

            </div><!-- End news-grid -->

            <!-- No results message -->
            <div id="no-results">
              <i class="bi bi-search"></i>
              <h3 class="h5">No articles found</h3>
              <p class="mb-0">Try a different search term, or clear the search to see all articles.</p>
            </div>

          </section><!-- /Listings Section -->

        </div><!-- End main listings column -->

        <!-- Sidebar -->
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
            <h3><i class="bi bi-graph-up-arrow"></i> Recent Articles</h3>
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

        </aside><!-- End sidebar -->

      </div><!-- End row -->
    </div><!-- End container -->

    <script>
      (function () {
        'use strict';

        var searchInput = document.getElementById('search-input');
        var clearBtn = document.getElementById('clear-search-btn');
        var grid = document.getElementById('news-grid');
        var noResults = document.getElementById('no-results');
        var items = grid ? Array.prototype.slice.call(grid.querySelectorAll('.news-item')) : [];

        function applyFilters() {
          var searchTerm = (searchInput.value || '').trim().toLowerCase();
          var visibleCount = 0;

          items.forEach(function (item) {
            var itemTitle = (item.getAttribute('data-title') || '').toLowerCase();
            var isVisible = searchTerm === '' || itemTitle.indexOf(searchTerm) !== -1;
            item.style.display = isVisible ? '' : 'none';
            if (isVisible) { visibleCount++; }
          });

          if (noResults) { noResults.style.display = visibleCount === 0 ? 'block' : 'none'; }
          if (grid) { grid.style.display = visibleCount === 0 ? 'none' : ''; }
        }

        if (searchInput) {
          searchInput.addEventListener('keyup', applyFilters);
        }

        if (clearBtn) {
          clearBtn.addEventListener('click', function () {
            searchInput.value = '';
            applyFilters();
          });
        }
      })();
    </script>
@endsection
