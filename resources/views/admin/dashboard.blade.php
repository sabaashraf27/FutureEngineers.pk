@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

  <div class="row g-3 mb-4">
    <div class="col-6 col-lg-2">
      <div class="stat-card">
        <div class="num">{{ $counts['jobs'] }}</div>
        <div class="label">Jobs & Internships</div>
      </div>
    </div>
    <div class="col-6 col-lg-2">
      <div class="stat-card">
        <div class="num">{{ $counts['scholarships'] }}</div>
        <div class="label">Scholarships</div>
      </div>
    </div>
    <div class="col-6 col-lg-2">
      <div class="stat-card">
        <div class="num">{{ $counts['courses'] }}</div>
        <div class="label">Courses</div>
      </div>
    </div>
    <div class="col-6 col-lg-2">
      <div class="stat-card">
        <div class="num">{{ $counts['cv_templates'] }}</div>
        <div class="label">CV Templates</div>
      </div>
    </div>
    <div class="col-6 col-lg-2">
      <div class="stat-card">
        <div class="num">{{ $counts['articles'] }}</div>
        <div class="label">Articles</div>
      </div>
    </div>
    <div class="col-6 col-lg-2">
      <div class="stat-card">
        <div class="num">{{ $counts['messages'] }}</div>
        <div class="label">Contact Messages</div>
      </div>
    </div>
  </div>

  <div class="row g-3">
    <div class="col-lg-7">
      <div class="admin-card p-3">
        <h2 class="h6 mb-3">Recently Added Listings</h2>
        <table class="table table-sm align-middle mb-0">
          <thead><tr><th>Title</th><th>Type</th><th>Status</th></tr></thead>
          <tbody>
            @forelse($recentListings as $listing)
              <tr>
                <td>{{ $listing->title }}</td>
                <td class="text-capitalize">{{ $listing->type }}</td>
                <td>
                  <span class="badge {{ $listing->status === 'active' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($listing->status) }}</span>
                </td>
              </tr>
            @empty
              <tr><td colspan="3" class="text-muted">No listings yet.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="admin-card p-3">
        <h2 class="h6 mb-3">Recent Contact Messages</h2>
        <table class="table table-sm align-middle mb-0">
          <thead><tr><th>From</th><th>Subject</th></tr></thead>
          <tbody>
            @forelse($recentMessages as $message)
              <tr>
                <td><a href="{{ route('admin.contact-messages.show', $message) }}">{{ $message->name }}</a></td>
                <td class="text-truncate" style="max-width: 160px;">{{ $message->subject ?? $message->inquiry_type }}</td>
              </tr>
            @empty
              <tr><td colspan="2" class="text-muted">No messages yet.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
