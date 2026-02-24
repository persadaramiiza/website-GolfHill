<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['category', 'user'])
            ->where('status', 'published');

        // Filter by category
        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        $articles = $query->latest('published_at')->paginate(9);
        $categories = Category::all();

        return view('articles.index', compact('articles', 'categories'));
    }

    public function show($slug)
    {
        $article = Article::with(['category', 'user', 'tags', 'comments' => function($query) {
            $query->where('status', 'approved')
                  ->whereNull('parent_id')
                  ->with('replies')
                  ->latest();
        }])
        ->where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

        return view('articles.show', compact('article'));
    }
}
