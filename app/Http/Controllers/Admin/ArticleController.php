<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('publish_at')->orderByDesc('created_at')->paginate(15);

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.form', ['article' => null]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateArticle($request);

        $article = new Article();
        $this->applyRequestToArticle($article, $request, $validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('status', 'Article published.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.form', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $this->validateArticle($request);

        $this->applyRequestToArticle($article, $request, $validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('status', 'Article updated.');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail && str_starts_with($article->thumbnail, 'storage/')) {
            Storage::disk('public')->delete(Str::after($article->thumbnail, 'storage/'));
        }

        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('status', 'Article deleted.');
    }

    private function validateArticle(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'source_link' => ['nullable', 'string', 'max:500'],
            'publish_at' => ['nullable', 'date'],
            'thumbnail' => ['nullable', 'image', 'max:2048'],
        ]);
    }

    private function applyRequestToArticle(Article $article, Request $request, array $validated): void
    {
        $slug = Str::slug($validated['title']) ?: 'article';
        $baseSlug = $slug;
        $i = 2;
        while (Article::where('slug', $slug)->when($article->exists, fn ($q) => $q->where('id', '!=', $article->id))->exists()) {
            $slug = $baseSlug . '-' . $i++;
        }

        $article->title = $validated['title'];
        $article->slug = $slug;
        $article->content = $validated['content'];
        $article->source_link = $validated['source_link'] ?? null;
        $article->publish_at = $validated['publish_at'] ?? now();

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('articles', 'public');
            $article->thumbnail = 'storage/' . $path;
        }

        $article->save();
    }
}
