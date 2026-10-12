<?php

namespace App\Http\Controllers;

use App\Models\CvTemplate;

class CvTemplateController extends Controller
{
    /**
     * Show all CV templates.
     */
    public function index()
    {
        $templates = CvTemplate::orderByDesc('created_at')->get();

        return view('cv-templates.index', compact('templates'));
    }

    /**
     * Show a single CV template.
     */
    public function show($id)
    {
        $template = CvTemplate::findOrFail($id);

        return view('cv-templates.show', compact('template'));
    }
}