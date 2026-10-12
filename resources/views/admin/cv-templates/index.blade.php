@extends('admin.layout')

@section('title', 'CV Templates')

@section('content')

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="h5 mb-0">CV Templates</h2>
    <a href="{{ route('admin.cv-templates.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Add New</a>
  </div>

  <div class="admin-card p-3">
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Downloads</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($templates as $template)
            <tr>
              <td>{{ $template->title }}</td>
              <td>{{ \App\Http\Controllers\Admin\CvTemplateController::CATEGORY_OPTIONS[$template->details['category'] ?? ''] ?? '—' }}</td>
              <td>{{ $template->downloads_count }}</td>
              <td class="text-end">
                <a href="{{ route('admin.cv-templates.edit', $template) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                <form action="{{ route('admin.cv-templates.destroy', $template) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this CV template?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-muted text-center py-4">No CV templates yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-3">
      {{ $templates->links() }}
    </div>
  </div>

@endsection
