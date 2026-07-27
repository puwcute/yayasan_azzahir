<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Registration;
use App\Models\ContactMessage;

class HomeController extends Controller
{
    public function home()
    {
        $latestNews = News::published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $santriCount = Registration::count();
        $teacherCount = 50;
        $yearsActive = 15;
        $programCount = 6;

        return view('pages.home', compact(
            'latestNews', 'santriCount', 'teacherCount', 'yearsActive', 'programCount'
        ));
    }
}
