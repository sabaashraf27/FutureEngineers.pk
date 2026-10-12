<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Which Listing "type" values belong to each admin section, and the
     * label shown for each in the section's "type" picker.
     */
    private const SECTIONS = [
        'jobs' => [
            'label' => 'Jobs & Internships',
            'types' => ['job' => 'Job', 'internship' => 'Internship'],
        ],
        'scholarships' => [
            'label' => 'Scholarships',
            'types' => ['scholarship' => 'Scholarship'],
        ],
        'courses' => [
            'label' => 'Courses & Certifications',
            'types' => ['course' => 'Course'],
        ],
    ];

    /**
     * Which "details" JSON fields are editable for each listing type, and
     * how each should be rendered (plain text, multi-line textarea, a
     * one-item-per-line list, or a yes/no toggle). These map 1:1 to the
     * keys the public-facing show/index Blade views already read.
     */
    private function detailFields(string $type): array
    {
        return match ($type) {
            'job', 'internship' => [
                ['key' => 'employment', 'label' => 'Employment Type', 'type' => 'text', 'placeholder' => 'e.g. Full Time, Part Time, Contract'],
                ['key' => 'responsibilities', 'label' => 'Key Responsibilities', 'type' => 'list'],
                ['key' => 'requirements', 'label' => 'Requirements', 'type' => 'list'],
                ['key' => 'skills', 'label' => 'Preferred Skills', 'type' => 'list'],
                ['key' => 'application', 'label' => 'How to Apply', 'type' => 'textarea'],
            ],
            'scholarship' => [
                ['key' => 'provider', 'label' => 'Provider / Organisation', 'type' => 'text'],
                ['key' => 'level', 'label' => 'Level', 'type' => 'text', 'placeholder' => 'e.g. Undergraduate, Postgraduate'],
                ['key' => 'status', 'label' => 'Scholarship Status', 'type' => 'text', 'placeholder' => 'e.g. Open, Closed'],
                ['key' => 'funding', 'label' => 'Funding', 'type' => 'text', 'placeholder' => 'e.g. Need-Based - Tuition + Stipend'],
                ['key' => 'eligibility', 'label' => 'Eligibility Criteria', 'type' => 'list'],
                ['key' => 'benefits', 'label' => 'Benefits', 'type' => 'list'],
                ['key' => 'requirements', 'label' => 'Required Documents', 'type' => 'list'],
                ['key' => 'applicationProcess', 'label' => 'Application Process (steps)', 'type' => 'list'],
                ['key' => 'importantNotes', 'label' => 'Important Notes', 'type' => 'list'],
                ['key' => 'websiteUrl', 'label' => 'Official Website URL', 'type' => 'text'],
            ],
            'course' => [
                ['key' => 'provider', 'label' => 'Provider / Institute', 'type' => 'text'],
                ['key' => 'level', 'label' => 'Level', 'type' => 'text', 'placeholder' => 'e.g. Beginner, Intermediate'],
                ['key' => 'duration', 'label' => 'Duration', 'type' => 'text', 'placeholder' => 'e.g. 6 Weeks'],
                ['key' => 'mode', 'label' => 'Mode', 'type' => 'text', 'placeholder' => 'e.g. Self-Paced, On-site'],
                ['key' => 'certificate', 'label' => 'Certificate Provided?', 'type' => 'boolean'],
                ['key' => 'short_description', 'label' => 'Short Description (shown on listing cards)', 'type' => 'textarea'],
                ['key' => 'overview', 'label' => 'Course Overview', 'type' => 'textarea'],
                ['key' => 'learningOutcomes', 'label' => 'Learning Outcomes', 'type' => 'list'],
                ['key' => 'curriculum', 'label' => 'Curriculum (modules)', 'type' => 'list'],
                ['key' => 'audience', 'label' => 'Who This Is For', 'type' => 'list'],
                ['key' => 'requirements', 'label' => 'Requirements', 'type' => 'list'],
                ['key' => 'skills', 'label' => 'Skills Covered', 'type' => 'list'],
            ],
            default => [],
        };
    }

    private function section(string $section): array
    {
        abort_unless(isset(self::SECTIONS[$section]), 404);

        return self::SECTIONS[$section];
    }

    public function index(string $section)
    {
        $meta = $this->section($section);

        $listings = Listing::with('category')
            ->whereIn('type', array_keys($meta['types']))
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.listings.index', [
            'section' => $section,
            'sectionLabel' => $meta['label'],
            'listings' => $listings,
        ]);
    }

    public function create(string $section)
    {
        $meta = $this->section($section);
        $defaultType = array_key_first($meta['types']);

        return view('admin.listings.form', [
            'section' => $section,
            'sectionLabel' => $meta['label'],
            'typeOptions' => $meta['types'],
            'listing' => null,
            'type' => old('type', $defaultType),
            'categories' => Category::whereIn('type', array_keys($meta['types']))->orderBy('name')->get(),
            'detailFields' => $this->detailFields($defaultType),
            'existingDetails' => old('details', []),
        ]);
    }

    public function store(Request $request, string $section)
    {
        $meta = $this->section($section);

        $validated = $this->validateListing($request, $meta);

        $listing = new Listing();
        $this->applyRequestToListing($listing, $request, $validated);

        return redirect()
            ->route('admin.listings.index', $section)
            ->with('status', 'Listing created.');
    }

    public function edit(string $section, Listing $listing)
    {
        $meta = $this->section($section);
        abort_unless(array_key_exists($listing->type, $meta['types']), 404);

        return view('admin.listings.form', [
            'section' => $section,
            'sectionLabel' => $meta['label'],
            'typeOptions' => $meta['types'],
            'listing' => $listing,
            'type' => old('type', $listing->type),
            'categories' => Category::whereIn('type', array_keys($meta['types']))->orderBy('name')->get(),
            'detailFields' => $this->detailFields(old('type', $listing->type)),
            'existingDetails' => old('details', $listing->details ?? []),
        ]);
    }

    public function update(Request $request, string $section, Listing $listing)
    {
        $meta = $this->section($section);
        abort_unless(array_key_exists($listing->type, $meta['types']), 404);

        $validated = $this->validateListing($request, $meta, $listing);

        $this->applyRequestToListing($listing, $request, $validated);

        return redirect()
            ->route('admin.listings.index', $section)
            ->with('status', 'Listing updated.');
    }

    public function destroy(string $section, Listing $listing)
    {
        $meta = $this->section($section);
        abort_unless(array_key_exists($listing->type, $meta['types']), 404);

        if ($listing->thumbnail && str_starts_with($listing->thumbnail, 'storage/')) {
            Storage::disk('public')->delete(Str::after($listing->thumbnail, 'storage/'));
        }

        $listing->delete();

        return redirect()
            ->route('admin.listings.index', $section)
            ->with('status', 'Listing deleted.');
    }

    private function validateListing(Request $request, array $meta, ?Listing $listing = null): array
    {
        return $request->validate([
            'type' => ['required', Rule::in(array_keys($meta['types']))],
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'deadline' => ['nullable', 'date'],
            'apply_link' => ['nullable', 'string', 'max:500'],
            'description' => ['required', 'string'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
            'thumbnail' => ['nullable', 'image', 'max:2048'],
        ]);
    }

    private function applyRequestToListing(Listing $listing, Request $request, array $validated): void
    {
        $type = $validated['type'];

        $slugSource = $validated['title'];
        $slug = Str::slug($slugSource) ?: 'listing';
        $baseSlug = $slug;
        $i = 2;
        while (Listing::where('slug', $slug)->when($listing->exists, fn ($q) => $q->where('id', '!=', $listing->id))->exists()) {
            $slug = $baseSlug . '-' . $i++;
        }

        $listing->title = $validated['title'];
        $listing->slug = $slug;
        $listing->description = $validated['description'];
        $listing->category_id = $validated['category_id'] ?? null;
        $listing->type = $type;
        $listing->company_name = $validated['company_name'] ?? null;
        $listing->location = $validated['location'] ?? null;
        $listing->deadline = $validated['deadline'] ?? null;
        $listing->apply_link = $validated['apply_link'] ?? null;
        $listing->status = $validated['status'];

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('listings', 'public');
            $listing->thumbnail = 'storage/' . $path;
        }

        // Start from whatever details already exist so unmanaged keys
        // (e.g. ones set by the original seeder) are never wiped out.
        $details = $listing->details ?? [];

        foreach ($this->detailFields($type) as $field) {
            $input = $request->input('details.' . $field['key']);

            $details[$field['key']] = match ($field['type']) {
                'list' => array_values(array_filter(array_map('trim', explode("\n", (string) $input)))),
                'boolean' => $request->boolean('details.' . $field['key']),
                default => $input !== null ? trim((string) $input) : ($details[$field['key']] ?? null),
            };
        }

        // Keep the a few duplicate/legacy keys other templates read in
        // sync automatically, so the admin only has to fill one field.
        if (in_array($type, ['job', 'internship'], true)) {
            $details['employment_type'] = $details['employment'] ?? null;
        }

        if ($type === 'scholarship') {
            $details['applyUrl'] = $listing->apply_link;
        }

        $listing->details = $details;

        $listing->save();
    }
}
