<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
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
                  ->with(['replies' => function($q) {
                      $q->where('status', 'approved');
                  }])
                  ->latest();
        }])
        ->where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

        return view('articles.show', compact('article'));
    }

    public function storeComment(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $validated = $request->validate([
            'author_name'  => 'required|string|max:100',
            'author_email' => 'required|email|max:100',
            'content'      => 'required|string|max:2000',
        ]);

        $article->comments()->create([
            'author_name'  => $validated['author_name'],
            'author_email' => $validated['author_email'],
            'content'      => $validated['content'],
            'status'       => 'pending',
        ]);

        return redirect()
            ->back()
            ->with('comment_success', 'Thank you! Your comment has been submitted and is awaiting moderation.');
    }
}
