@extends('admin.layout')

@section('title', ($article ? 'Edit' : 'Add') . ' Article')

@php
    $isEdit = (bool) $article;
    $formAction = $isEdit ? route('admin.articles.update', $article) : route('admin.articles.store');
@endphp

@section('content')

  <h2 class="h5 mb-3">{{ $isEdit ? 'Edit' : 'Add New' }} Article</h2>

  <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="row g-4">
      <div class="col-lg-8">
        <div class="admin-card p-3 mb-3">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $article->title ?? '') }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" rows="14" class="form-control" required>{{ old('content', $article->content ?? '') }}</textarea>
            <div class="field-hint">Plain paragraphs. Leave a blank line between paragraphs.</div>
          </div>

          <div class="mb-1">
            <label class="form-label">Source Link (optional)</label>
            <input type="text" name="source_link" class="form-control" value="{{ old('source_link', $article->source_link ?? '') }}" placeholder="https://... (if this is reporting on an external source)">
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="admin-card p-3 mb-3">
          <h3 class="h6 mb-3">Publish Date</h3>
          <input type="date" name="publish_at" class="form-control"
                 value="{{ old('publish_at', optional($article->publish_at ?? null)->format('Y-m-d')) }}">
          <div class="field-hint">Leave blank to use today's date.</div>
        </div>

        <div class="admin-card p-3 mb-3">
          <h3 class="h6 mb-3">Thumbnail Image</h3>
          @if(!empty($article?->thumbnail))
            <img src="{{ asset($article->thumbnail) }}" class="img-fluid rounded mb-2" alt="Current thumbnail">
          @endif
          <input type="file" name="thumbnail" class="form-control" accept="image/*">
          <div class="field-hint">Optional. Leave blank to keep the current image.</div>
        </div>

        <button type="submit" class="btn btn-primary w-100">{{ $isEdit ? 'Save Changes' : 'Publish Article' }}</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary w-100 mt-2">Cancel</a>
      </div>
    </div>

  </form>

@endsection
