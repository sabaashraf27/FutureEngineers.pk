<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('listings')
            ->orderBy('type')
            ->orderBy('name')
            ->get()
            ->groupBy('type');

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'type' => ['required', Rule::in(['job', 'internship', 'scholarship', 'course'])],
        ]);

        Category::create($validated);

        return back()->with('status', 'Category added.');
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
        ]);

        $category->update($validated);

        return back()->with('status', 'Category updated.');
    }

    public function destroy(Category $category)
    {
        if ($category->listings()->exists()) {
            return back()->withErrors([
                'category' => "\"{$category->name}\" is still used by existing listings, so it can't be deleted. Move or delete those listings first.",
            ]);
        }

        $category->delete();

        return back()->with('status', 'Category deleted.');
    }
}
