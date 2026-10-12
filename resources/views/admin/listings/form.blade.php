@extends('admin.layout')

@section('title', ($listing ? 'Edit' : 'Add') . ' - ' . $sectionLabel)

@php
    $isEdit = (bool) $listing;
    $formAction = $isEdit
        ? route('admin.listings.update', [$section, $listing])
        : route('admin.listings.store', $section);
    $d = $existingDetails ?? [];
@endphp

@section('content')

  <h2 class="h5 mb-3">{{ $isEdit ? 'Edit' : 'Add New' }} - {{ $sectionLabel }}</h2>

  <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="row g-4">
      <div class="col-lg-8">

        <div class="admin-card p-3 mb-3">
          <h3 class="h6 mb-3">Basic Details</h3>

          @if(count($typeOptions) > 1)
            <div class="mb-3">
              <label class="form-label">Type</label>
              <select name="type" class="form-select" required>
                @foreach($typeOptions as $value => $label)
                  <option value="{{ $value }}" @selected(old('type', $type) === $value)>{{ $label }}</option>
                @endforeach
              </select>
            </div>
          @else
            <input type="hidden" name="type" value="{{ array_key_first($typeOptions) }}">
          @endif

          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $listing->title ?? '') }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="4" class="form-control" required>{{ old('description', $listing->description ?? '') }}</textarea>
            <div class="field-hint">Shown as the main description on the listing page.</div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Category</label>
              <select name="category_id" class="form-select">
                <option value="">— None —</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" @selected(old('category_id', $listing->category_id ?? null) == $category->id)>{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Company / Organisation Name</label>
              <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $listing->company_name ?? '') }}">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Location</label>
              <input type="text" name="location" class="form-control" value="{{ old('location', $listing->location ?? '') }}" placeholder="e.g. Lahore, Pakistan">
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Deadline</label>
              <input type="date" name="deadline" class="form-control" value="{{ old('deadline', optional($listing->deadline ?? null)->format('Y-m-d')) }}">
              <div class="field-hint">Leave blank if there is no fixed deadline.</div>
            </div>
          </div>

          <div class="mb-1">
            <label class="form-label">Apply / Website Link</label>
            <input type="text" name="apply_link" class="form-control" value="{{ old('apply_link', $listing->apply_link ?? '') }}" placeholder="https://...">
          </div>
        </div>

        <div class="admin-card p-3 mb-3">
          <h3 class="h6 mb-3">{{ $sectionLabel }} Details</h3>

          @foreach($detailFields as $field)
            <div class="mb-3">
              <label class="form-label">{{ $field['label'] }}</label>

              @if($field['type'] === 'text')
                <input type="text" name="details[{{ $field['key'] }}]" class="form-control"
                       value="{{ old('details.' . $field['key'], $d[$field['key']] ?? '') }}"
                       placeholder="{{ $field['placeholder'] ?? '' }}">

              @elseif($field['type'] === 'textarea')
                <textarea name="details[{{ $field['key'] }}]" rows="3" class="form-control">{{ old('details.' . $field['key'], $d[$field['key']] ?? '') }}</textarea>

              @elseif($field['type'] === 'boolean')
                <div class="form-check">
                  <input type="checkbox" name="details[{{ $field['key'] }}]" value="1" class="form-check-input" id="field-{{ $field['key'] }}"
                         @checked(old('details.' . $field['key'], $d[$field['key']] ?? false))>
                  <label class="form-check-label" for="field-{{ $field['key'] }}">Yes</label>
                </div>

              @elseif($field['type'] === 'list')
                @php
                    $existingList = old('details.' . $field['key'], $d[$field['key']] ?? []);
                    $existingList = is_array($existingList) ? $existingList : [];
                @endphp
                <textarea name="details[{{ $field['key'] }}]" rows="4" class="form-control details-list">{{ implode("\n", $existingList) }}</textarea>
                <div class="field-hint">One item per line.</div>
              @endif
            </div>
          @endforeach
        </div>

      </div>

      <div class="col-lg-4">
        <div class="admin-card p-3 mb-3">
          <h3 class="h6 mb-3">Visibility</h3>
          <select name="status" class="form-select">
            <option value="active" @selected(old('status', $listing->status ?? 'active') === 'active')>Active (visible on site)</option>
            <option value="inactive" @selected(old('status', $listing->status ?? '') === 'inactive')>Inactive (hidden)</option>
          </select>
        </div>

        <div class="admin-card p-3 mb-3">
          <h3 class="h6 mb-3">Thumbnail Image</h3>
          @if(!empty($listing?->thumbnail))
            <img src="{{ asset($listing->thumbnail) }}" class="img-fluid rounded mb-2" alt="Current thumbnail">
          @endif
          <input type="file" name="thumbnail" class="form-control" accept="image/*">
          <div class="field-hint">Optional. Leave blank to keep the current image.</div>
        </div>

        <button type="submit" class="btn btn-primary w-100">{{ $isEdit ? 'Save Changes' : 'Create Listing' }}</button>
        <a href="{{ route('admin.listings.index', $section) }}" class="btn btn-outline-secondary w-100 mt-2">Cancel</a>
      </div>
    </div>

  </form>

@endsection
