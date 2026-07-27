<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $newsList = News::with('author')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.news.index', compact('newsList'));
    }

    public function create()
    {
        return view('admin.news.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'category' => 'required|in:kegiatan,pengumuman,artikel,lainnya',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['author_id'] = Auth::guard('admin')->id();

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('news', 'public');
        }

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        // Ensure unique slug
        $baseSlug = $validated['slug'];
        $counter = 1;
        while (News::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $baseSlug . '-' . $counter++;
        }

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news)
    {
        return view('admin.news.form', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'category' => 'required|in:kegiatan,pengumuman,artikel,lainnya',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('news', 'public');
        }

        if ($validated['status'] === 'published' && $news->status !== 'published') {
            $validated['published_at'] = now();
        }

        // Ensure unique slug (excluding current record)
        $baseSlug = $validated['slug'];
        $counter = 1;
        while (News::where('slug', $validated['slug'])->where('id', '!=', $news->id)->exists()) {
            $validated['slug'] = $baseSlug . '-' . $counter++;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
