<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CvTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CvTemplateController extends Controller
{
    public const CATEGORY_OPTIONS = [
        'student' => 'Student CV',
        'fresh-graduate' => 'Fresh Graduate CV',
        'internship' => 'Internship CV',
        'experienced' => 'Experienced Engineer CV',
        'academic' => 'Academic CV',
    ];

    public function index()
    {
        $templates = CvTemplate::orderByDesc('created_at')->paginate(15);

        return view('admin.cv-templates.index', compact('templates'));
    }

    public function create()
    {
        return view('admin.cv-templates.form', [
            'template' => null,
            'categoryOptions' => self::CATEGORY_OPTIONS,
            'existingDetails' => old('details', []),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateTemplate($request, requireFile: true);

        $template = new CvTemplate();
        $this->applyRequestToTemplate($template, $request, $validated);

        return redirect()
            ->route('admin.cv-templates.index')
            ->with('status', 'CV template created.');
    }

    public function edit(CvTemplate $cvTemplate)
    {
        return view('admin.cv-templates.form', [
            'template' => $cvTemplate,
            'categoryOptions' => self::CATEGORY_OPTIONS,
            'existingDetails' => old('details', $cvTemplate->details ?? []),
        ]);
    }

    public function update(Request $request, CvTemplate $cvTemplate)
    {
        $validated = $this->validateTemplate($request, requireFile: false);

        $this->applyRequestToTemplate($cvTemplate, $request, $validated);

        return redirect()
            ->route('admin.cv-templates.index')
            ->with('status', 'CV template updated.');
    }

    public function destroy(CvTemplate $cvTemplate)
    {
        foreach (['file_path', 'thumbnail'] as $field) {
            if ($cvTemplate->$field && str_starts_with($cvTemplate->$field, 'storage/')) {
                Storage::disk('public')->delete(Str::after($cvTemplate->$field, 'storage/'));
            }
        }

        $cvTemplate->delete();

        return redirect()
            ->route('admin.cv-templates.index')
            ->with('status', 'CV template deleted.');
    }

    private function validateTemplate(Request $request, bool $requireFile): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'file' => [$requireFile ? 'required' : 'nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
            'thumbnail' => ['nullable', 'image', 'max:2048'],
        ]);
    }

    private function applyRequestToTemplate(CvTemplate $template, Request $request, array $validated): void
    {
        $template->title = $validated['title'];

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('cv-templates', 'public');
            $template->file_path = 'storage/' . $path;
        }

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('cv-templates/thumbnails', 'public');
            $template->thumbnail = 'storage/' . $path;
        }

        $details = $template->details ?? [];

        $details['category'] = $request->input('details.category') ?: ($details['category'] ?? null);
        $details['templateType'] = $request->input('details.templateType') ?: ($details['templateType'] ?? null);
        $details['suitableFor'] = $request->input('details.suitableFor') ?: ($details['suitableFor'] ?? null);
        $details['field'] = $request->input('details.field') ?: ($details['field'] ?? null);
        $details['level'] = $request->input('details.level') ?: ($details['level'] ?? null);
        $details['format'] = $request->input('details.format') ?: ($details['format'] ?? null);
        $details['description'] = $request->filled('details.description')
            ? trim($request->input('details.description'))
            : ($details['description'] ?? null);
        $details['longDescription'] = $request->filled('details.longDescription')
            ? trim($request->input('details.longDescription'))
            : ($details['longDescription'] ?? null);

        foreach (['audience', 'sections', 'tips'] as $listField) {
            if ($request->has('details.' . $listField)) {
                $details[$listField] = array_values(array_filter(array_map(
                    'trim',
                    explode("\n", (string) $request->input('details.' . $listField))
                )));
            }
        }

        if ($request->has('details.features')) {
            $lines = array_values(array_filter(array_map(
                'trim',
                explode("\n", (string) $request->input('details.features'))
            )));

            $details['features'] = array_map(
                fn ($label) => ['icon' => 'bi-check2-circle', 'label' => $label],
                $lines
            );
        }

        $template->details = $details;

        $template->save();
    }
}
