@extends('admin.layout')

@section('title', $sectionLabel)

@section('content')

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="h5 mb-0">{{ $sectionLabel }}</h2>
    <a href="{{ route('admin.listings.create', $section) }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Add New</a>
  </div>

  <div class="admin-card p-3">
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Category</th>
            <th>Deadline</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($listings as $listing)
            <tr>
              <td>{{ $listing->title }}</td>
              <td class="text-capitalize">{{ $listing->type }}</td>
              <td>{{ $listing->category->name ?? '—' }}</td>
              <td>{{ $listing->deadline?->format('d M Y') ?? '—' }}</td>
              <td>
                <span class="badge {{ $listing->status === 'active' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($listing->status) }}</span>
              </td>
              <td class="text-end">
                <a href="{{ route('admin.listings.edit', [$section, $listing]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                <form action="{{ route('admin.listings.destroy', [$section, $listing]) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this listing? This cannot be undone.');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="text-muted text-center py-4">Nothing here yet — click "Add New" to create the first one.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-3">
      {{ $listings->links() }}
    </div>
  </div>

@endsection
