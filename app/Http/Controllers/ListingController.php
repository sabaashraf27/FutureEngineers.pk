<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Category;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Show jobs and internships.
     */
    public function jobs()
    {
        $listings = Listing::with('category')
            ->whereIn('type', ['job', 'internship'])
            ->where('status', 'active')
            ->orderByDesc('created_at')
            ->get();

        return view('listings.jobs', compact('listings'));
    }

    /**
     * Show scholarships.
     */
    public function scholarships()
    {
        $listings = Listing::with('category')
            ->where('type', 'scholarship')
            ->where('status', 'active')
            ->orderByDesc('created_at')
            
            ->get();

        return view('listings.scholarships', compact('listings'));
    }

    public function showScholarship($id)
{
    $listing = Listing::with('category')
        ->where('type', 'scholarship')
        ->where('status', 'active')
        ->findOrFail($id);

    return view('listings.scholarship-show', compact('listing'));
}
    /**
     * Show courses and certifications.
     */
    public function courses()
    {
        $listings = Listing::with('category')
            ->where('type', 'course')
            ->where('status', 'active')
            ->orderByDesc('created_at')
            ->get();

        $categories = Category::where('type', 'course')
            ->orderBy('name')
            ->pluck('name');

        return view('listings.courses', compact('listings', 'categories'));
    }

    /**
     * Show a single course/certification.
     */
    public function showCourse($id)
    {
        $listing = Listing::with('category')
            ->where('type', 'course')
            ->where('status', 'active')
            ->findOrFail($id);

        return view('listings.course-show', compact('listing'));
    }

    /**
     * Show a single listing.
     */
    public function show($id)
    {
        $listing = Listing::with('category')
            ->where('status', 'active')
            ->findOrFail($id);

        return view('listings.show', compact('listing'));
    }
}