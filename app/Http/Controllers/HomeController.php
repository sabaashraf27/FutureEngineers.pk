<?php

namespace App\Http\Controllers;

use App\Models\Listing;

class HomeController extends Controller
{
    /**
     * Show the homepage, with real listings pulled from the database
     * for the "Recently Added" and "Popular Resources" sections.
     */
    public function index()
    {
        // Most recent 12 active listings across all types (jobs, internships,
        // scholarships, courses) — split in the view between the "Recently
        // Added" and "Popular Resources" sections, 6 each.
        $recentListings = Listing::with('category')
            ->where('status', 'active')
            ->orderByDesc('created_at')
            ->take(12)
            ->get();

        // Single latest item per type, used in the hero band.
        $latestJob = Listing::whereIn('type', ['job', 'internship'])
            ->where('status', 'active')
            ->orderByDesc('created_at')
            ->first();

        $latestScholarship = Listing::where('type', 'scholarship')
            ->where('status', 'active')
            ->orderByDesc('created_at')
            ->first();

        $latestCourse = Listing::where('type', 'course')
            ->where('status', 'active')
            ->orderByDesc('created_at')
            ->first();

        // Live counts, so the hero/CTA copy never drifts from the database.
        $counts = [
            'jobs' => Listing::whereIn('type', ['job', 'internship'])->where('status', 'active')->count(),
            'scholarships' => Listing::where('type', 'scholarship')->where('status', 'active')->count(),
            'courses' => Listing::where('type', 'course')->where('status', 'active')->count(),
        ];
        $counts['total'] = $counts['jobs'] + $counts['scholarships'] + $counts['courses'];

        return view('home', compact(
            'recentListings',
            'latestJob',
            'latestScholarship',
            'latestCourse',
            'counts'
        ));
    }
}
