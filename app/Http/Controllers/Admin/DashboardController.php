<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Registration;
use App\Models\ContactMessage;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNews = News::count();
        $publishedNews = News::published()->count();
        $totalRegistrations = Registration::count();
        $pendingRegistrations = Registration::pending()->count();
        $unreadMessages = ContactMessage::unread()->count();
        $latestRegistrations = Registration::latest()->take(5)->get();
        $latestMessages = ContactMessage::latest()->take(5)->get();
        $latestGallery = Gallery::latest()->take(6)->get();
        $totalGallery = Gallery::count();

        return view('admin.dashboard', compact(
            'totalNews', 'publishedNews', 'totalRegistrations',
            'pendingRegistrations', 'unreadMessages',
            'latestRegistrations', 'latestMessages',
            'latestGallery', 'totalGallery'
        ));
    }
}
