<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Show all industry news articles.
     */
    public function index()
    {
        $articles = Article::orderByDesc('publish_at')
            ->orderByDesc('created_at')
            ->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show a single article.
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }
}