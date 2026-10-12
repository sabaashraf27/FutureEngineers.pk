@extends('admin.layout')

@section('title', 'Industry News')

@section('content')

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="h5 mb-0">Industry News</h2>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Add New</a>
  </div>

  <div class="admin-card p-3">
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Title</th>
            <th>Published</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($articles as $article)
            <tr>
              <td>{{ $article->title }}</td>
              <td>{{ $article->publish_at?->format('d M Y') ?? '—' }}</td>
              <td class="text-end">
                <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this article?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="3" class="text-muted text-center py-4">No articles yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-3">
      {{ $articles->links() }}
    </div>
  </div>

@endsection
