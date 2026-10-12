@extends('admin.layout')

@section('title', 'Categories')

@section('content')

  <h2 class="h5 mb-3">Categories</h2>
  <p class="text-muted small mb-4">Categories are used to organise Jobs, Internships, Scholarships and Courses into groups on the site.</p>

  @php
    $types = [
        'job' => 'Job Categories',
        'internship' => 'Internship Categories',
        'scholarship' => 'Scholarship Categories',
        'course' => 'Course Categories',
    ];
  @endphp

  <div class="row g-3">
    @foreach($types as $typeKey => $typeLabel)
      <div class="col-lg-6">
        <div class="admin-card p-3 h-100">
          <h3 class="h6 mb-3">{{ $typeLabel }}</h3>

          <ul class="list-group list-group-flush mb-3">
            @forelse($categories[$typeKey] ?? [] as $category)
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="d-flex flex-grow-1 gap-2 me-2">
                  @csrf
                  @method('PUT')
                  <input type="text" name="name" value="{{ $category->name }}" class="form-control form-control-sm">
                  <button type="submit" class="btn btn-sm btn-outline-secondary">Save</button>
                </form>
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-light text-dark border">{{ $category->listings_count }}</span>
                  <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                  </form>
                </div>
              </li>
            @empty
              <li class="list-group-item px-0 text-muted">No categories yet.</li>
            @endforelse
          </ul>

          <form action="{{ route('admin.categories.store') }}" method="POST" class="d-flex gap-2">
            @csrf
            <input type="hidden" name="type" value="{{ $typeKey }}">
            <input type="text" name="name" class="form-control form-control-sm" placeholder="New {{ strtolower($typeLabel) }} name" required>
            <button type="submit" class="btn btn-sm btn-primary text-nowrap">Add</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>

@endsection
