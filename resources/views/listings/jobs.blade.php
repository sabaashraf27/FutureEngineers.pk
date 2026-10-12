@extends('layouts.app')

@section('body_class', 'jobs-page')

@section('content')
    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item active current">Jobs &amp; Internships</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>Jobs &amp; Internships</h1>
        <p>Find engineering jobs, internships and early-career opportunities from companies and organizations across Pakistan.</p>
      </div>
    </div>

    <!-- Category Filters -->
    <section id="jobs-filters" class="jobs-filters section pb-0">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="category-filters" role="group" aria-label="Filter opportunities by type">
          <button type="button" class="filter-btn active" data-filter="all" aria-pressed="true">All Opportunities</button>
          <button type="button" class="filter-btn" data-filter="job" aria-pressed="false">Jobs</button>
          <button type="button" class="filter-btn" data-filter="internship" aria-pressed="false">Internships</button>
        </div>
      </div>
    </section>

    <div class="container">
      <div class="row gy-5">

        <div class="col-lg-8">
          <section id="jobs-listings" class="jobs-listings section pt-0">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

              @forelse($listings as $listing)
                <div class="col-md-6">
                  <div class="opportunity-card" data-type="{{ $listing->type }}">
                    <div class="opportunity-card-header">
                      <span class="opportunity-badge {{ $listing->type === 'internship' ? 'badge-internship' : 'badge-job' }}">
                        {{ ucfirst($listing->type) }}
                      </span>
                      <span class="opportunity-type">
                        <i class="bi bi-briefcase"></i>
                        {{ $listing->details['employment_type'] ?? $listing->details['mode'] ?? 'Opportunity' }}
                      </span>
                    </div>

                    <h2 class="opportunity-title">
                      <a href="{{ route('jobs.show', $listing->id) }}">{{ $listing->title }}</a>
                    </h2>

                    @if($listing->company_name)
                      <p class="opportunity-company">{{ $listing->company_name }}</p>
                    @endif

                    <ul class="opportunity-meta">
                      @if($listing->location)
                        <li><i class="bi bi-geo-alt"></i> {{ $listing->location }}</li>
                      @endif
                      <li>
                        <i class="bi bi-clock"></i>
                        Posted {{ $listing->created_at->diffForHumans() }}
                      </li>
                    </ul>

                    <p class="opportunity-desc">
                      {{ \Illuminate\Support\Str::limit(strip_tags($listing->description), 150) }}
                    </p>

                    <a href="{{ route('jobs.show', $listing->id) }}" class="btn opportunity-btn">
                      View Details
                    </a>
                  </div>
                </div>
              @empty
                <div class="col-12">
                  <p class="text-center">No opportunities are available right now.</p>
                </div>
              @endforelse

            </div>

            <p id="jobs-empty-state" class="jobs-empty-state text-center" hidden>
              No opportunities match this filter right now. Please check back soon.
            </p>
          </section>

          <!-- Pagination placeholder for MVP -->
          <section id="pagination-2" class="pagination-2 section pt-0">
            <div class="d-flex justify-content-center">
              <ul>
                <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
              </ul>
            </div>
          </section>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
          <aside class="jobs-sidebar widgets-container">

            <div class="widget-item categories-widget">
              <h3 class="widget-title">Career Resources</h3>
              <ul>
                <li><a href="{{ route('cv-templates.index') }}"><i class="bi bi-file-earmark-text"></i> <span>CV Templates</span></a></li>
                <li><a href="{{ route('courses') }}"><i class="bi bi-mortarboard"></i> <span>Courses &amp; Certifications</span></a></li>
                <li><a href="{{ route('scholarships') }}"><i class="bi bi-award"></i> <span>Scholarships</span></a></li>
                <li><a href="{{ route('articles.index') }}"><i class="bi bi-newspaper"></i> <span>Industry News &amp; Trends</span></a></li>
              </ul>
            </div>

            <div class="widget-item cta-widget">
              <h3 class="widget-title">Join FutureEngineers.pk</h3>
              <p>Get the latest career opportunities and engineering updates.</p>
              <a href="https://chat.whatsapp.com/E6kjTG90j5VDZ4G5TMfj6V" target="_blank" rel="noopener" class="btn">Join Community</a>
            </div>

          </aside>
        </div>

      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var filterButtons = document.querySelectorAll('.jobs-filters .filter-btn');
        var cards = document.querySelectorAll('.opportunity-card');
        var emptyState = document.getElementById('jobs-empty-state');

        if (!filterButtons.length || !cards.length) {
          return;
        }

        filterButtons.forEach(function (button) {
          button.addEventListener('click', function () {
            filterButtons.forEach(function (b) {
              b.classList.remove('active');
              b.setAttribute('aria-pressed', 'false');
            });

            button.classList.add('active');
            button.setAttribute('aria-pressed', 'true');

            var filter = button.getAttribute('data-filter');
            var visibleCount = 0;

            cards.forEach(function (card) {
              var column = card.closest('.col-md-6');
              var matches = (filter === 'all' || card.getAttribute('data-type') === filter);

              if (column) {
                column.hidden = !matches;
              }

              if (matches) {
                visibleCount++;
              }
            });

            if (emptyState) {
              emptyState.hidden = visibleCount !== 0;
            }
          });
        });
      });
    </script>
@endsection
