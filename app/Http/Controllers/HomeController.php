<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Unit;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured units (available status, latest 3)
        $units = Unit::with(['unitType', 'contactPerson'])
            ->where('status', 'available')
            ->latest()
            ->take(3)
            ->get();

        // Get latest articles (published, latest 3)
        $articles = Article::with(['category', 'user'])
            ->where('status', 'published')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', compact('units', 'articles'));
    }
}
