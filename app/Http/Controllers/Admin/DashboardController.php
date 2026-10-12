<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\CvTemplate;
use App\Models\Listing;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'jobs' => Listing::whereIn('type', ['job', 'internship'])->count(),
            'scholarships' => Listing::where('type', 'scholarship')->count(),
            'courses' => Listing::where('type', 'course')->count(),
            'articles' => Article::count(),
            'cv_templates' => CvTemplate::count(),
            'messages' => ContactMessage::count(),
        ];

        $recentListings = Listing::with('category')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        $recentMessages = ContactMessage::orderByDesc('created_at')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('counts', 'recentListings', 'recentMessages'));
    }
}
