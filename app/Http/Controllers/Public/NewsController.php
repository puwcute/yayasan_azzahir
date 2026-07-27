<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $category = request('category');
        $query = News::published()->orderBy('published_at', 'desc');

        if ($category) {
            $query->where('category', $category);
        }

        $newsList = $query->paginate(6);

        return view('pages.news.index', compact('newsList', 'category'));
    }

    public function show($slug)
    {
        $article = News::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('pages.news.show', compact('article'));
    }
}
