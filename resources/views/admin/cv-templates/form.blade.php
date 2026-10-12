@extends('admin.layout')

@section('title', ($template ? 'Edit' : 'Add') . ' CV Template')

@php
    $isEdit = (bool) $template;
    $formAction = $isEdit ? route('admin.cv-templates.update', $template) : route('admin.cv-templates.store');
    $d = $existingDetails ?? [];
@endphp

@section('content')

  <h2 class="h5 mb-3">{{ $isEdit ? 'Edit' : 'Add New' }} CV Template</h2>

  <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="row g-4">
      <div class="col-lg-8">

        <div class="admin-card p-3 mb-3">
          <h3 class="h6 mb-3">Basic Details</h3>

          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $template->title ?? '') }}" required>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Category (used for filtering)</label>
              <select name="details[category]" class="form-select">
                <option value="">— None —</option>
                @foreach($categoryOptions as $value => $label)
                  <option value="{{ $value }}" @selected(old('details.category', $d['category'] ?? '') === $value)>{{ $label }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Template Type Label</label>
              <input type="text" name="details[templateType]" class="form-control" value="{{ old('details.templateType', $d['templateType'] ?? '') }}" placeholder="e.g. Fresh Graduate CV">
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3">
              <label class="form-label">Engineering Field</label>
              <input type="text" name="details[field]" class="form-control" value="{{ old('details.field', $d['field'] ?? '') }}" placeholder="e.g. All Engineering Fields">
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label">Level</label>
              <input type="text" name="details[level]" class="form-control" value="{{ old('details.level', $d['level'] ?? '') }}" placeholder="e.g. Entry Level">
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label">File Format</label>
              <input type="text" name="details[format]" class="form-control" value="{{ old('details.format', $d['format'] ?? '') }}" placeholder="e.g. PDF / DOCX">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Suitable For</label>
            <input type="text" name="details[suitableFor]" class="form-control" value="{{ old('details.suitableFor', $d['suitableFor'] ?? '') }}" placeholder="e.g. Fresh Graduates & Final-Year Students">
          </div>

          <div class="mb-3">
            <label class="form-label">Short Description</label>
            <textarea name="details[description]" rows="2" class="form-control">{{ old('details.description', $d['description'] ?? '') }}</textarea>
            <div class="field-hint">Shown on the CV templates listing page.</div>
          </div>

          <div class="mb-1">
            <label class="form-label">Full Description</label>
            <textarea name="details[longDescription]" rows="4" class="form-control">{{ old('details.longDescription', $d['longDescription'] ?? '') }}</textarea>
            <div class="field-hint">Shown on the template's own detail page.</div>
          </div>
        </div>

        <div class="admin-card p-3 mb-3">
          <h3 class="h6 mb-3">Content</h3>

          @php
            $listFields = [
                'audience' => 'Who This Is For',
                'features' => 'Key Features',
                'sections' => 'Recommended CV Sections',
                'tips' => 'Tips for Using This Template',
            ];
          @endphp

          @foreach($listFields as $key => $label)
            @php
              $existingList = old('details.' . $key, $d[$key] ?? []);
              if (is_array($existingList) && $key === 'features') {
                  $existingList = array_map(fn ($f) => is_array($f) ? ($f['label'] ?? '') : $f, $existingList);
              }
              $existingList = is_array($existingList) ? $existingList : [];
            @endphp
            <div class="mb-3">
              <label class="form-label">{{ $label }}</label>
              <textarea name="details[{{ $key }}]" rows="4" class="form-control details-list">{{ implode("\n", $existingList) }}</textarea>
              <div class="field-hint">One item per line.</div>
            </div>
          @endforeach
        </div>

      </div>

      <div class="col-lg-4">
        <div class="admin-card p-3 mb-3">
          <h3 class="h6 mb-3">CV File</h3>
          @if(!empty($template?->file_path))
            <p class="small mb-2"><a href="{{ asset($template->file_path) }}" target="_blank">View current file</a></p>
          @endif
          <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx" {{ $isEdit ? '' : 'required' }}>
          <div class="field-hint">PDF or Word document. {{ $isEdit ? 'Leave blank to keep the current file.' : '' }}</div>
        </div>

        <div class="admin-card p-3 mb-3">
          <h3 class="h6 mb-3">Thumbnail Image</h3>
          @if(!empty($template?->thumbnail))
            <img src="{{ asset($template->thumbnail) }}" class="img-fluid rounded mb-2" alt="Current thumbnail">
          @endif
          <input type="file" name="thumbnail" class="form-control" accept="image/*">
          <div class="field-hint">Optional. Leave blank to keep the current image.</div>
        </div>

        <button type="submit" class="btn btn-primary w-100">{{ $isEdit ? 'Save Changes' : 'Create Template' }}</button>
        <a href="{{ route('admin.cv-templates.index') }}" class="btn btn-outline-secondary w-100 mt-2">Cancel</a>
      </div>
    </div>

  </form>

@endsection
