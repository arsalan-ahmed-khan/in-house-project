<?php

namespace App\Http\Controllers;

use App\Models\PaperPublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaperPublicationController extends Controller
{
    // Display a listing of the paper publications
    public function index(Request $request)
    {
        $query = PaperPublication::where('user_id', auth()->id());

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where('paper_title', 'like', '%' . $request->search . '%')
                  ->orWhere('conference_journal_name', 'like', '%' . $request->search . '%');
        }

        $paperPublications = $query->get();
        return view('paper_publications.index', compact('paperPublications'));
    }

    // Show the form for creating a new paper publication
    public function create()
    {
        return view('paper_publications.create');
    }

    // Store a newly created paper publication in storage
    public function store(Request $request)
    {
        $request->validate([
            'paper_title' => 'required|string|max:255',
            'conference_journal_name' => 'required|string|max:255',
            'national_international' => 'required|string|max:255',
            'year_of_publication' => 'required|integer|digits:4',
            'isbn_issn_no' => 'nullable|string|max:50',
            'publisher_name' => 'nullable|string|max:255',
            'indexing' => 'nullable|string|max:255',
            'other' => 'nullable|string|max:255',
            'paper_weblink' => 'nullable|url|max:255',
            'doi' => 'nullable|string|max:255',
        ]);

        PaperPublication::create([
            'user_id' => auth()->id(),
            'paper_title' => $request->paper_title,
            'conference_journal_name' => $request->conference_journal_name,
            'national_international' => $request->national_international,
            'year_of_publication' => $request->year_of_publication,
            'isbn_issn_no' => $request->isbn_issn_no,
            'publisher_name' => $request->publisher_name,
            'indexing' => $request->indexing,
            'other' => $request->other,
            'paper_weblink' => $request->paper_weblink,
            'doi' => $request->doi,
        ]);

        return redirect()->route('paper_publications.index');
    }

    // Show the form for editing the specified paper publication
    public function edit(PaperPublication $paperPublication)
    {
        if ($paperPublication->user_id !== auth()->id()) {
            return redirect()->route('paper_publications.index');
        }

        return view('paper_publications.edit', compact('paperPublication'));
    }

    // Update the specified paper publication in storage
    public function update(Request $request, PaperPublication $paperPublication)
    {
        if ($paperPublication->user_id !== auth()->id()) {
            return redirect()->route('paper_publications.index');
        }

        $request->validate([
            'paper_title' => 'required|string|max:255',
            'conference_journal_name' => 'required|string|max:255',
            'national_international' => 'required|string|max:255',
            'year_of_publication' => 'required|integer|digits:4',
            'isbn_issn_no' => 'nullable|string|max:50',
            'publisher_name' => 'nullable|string|max:255',
            'indexing' => 'nullable|string|max:255',
            'other' => 'nullable|string|max:255',
            'paper_weblink' => 'nullable|url|max:255',
            'doi' => 'nullable|string|max:255',
        ]);

        $paperPublication->paper_title = $request->paper_title;
        $paperPublication->conference_journal_name = $request->conference_journal_name;
        $paperPublication->national_international = $request->national_international;
        $paperPublication->year_of_publication = $request->year_of_publication;
        $paperPublication->isbn_issn_no = $request->isbn_issn_no;
        $paperPublication->publisher_name = $request->publisher_name;
        $paperPublication->indexing = $request->indexing;
        $paperPublication->other = $request->other;
        $paperPublication->paper_weblink = $request->paper_weblink;
        $paperPublication->doi = $request->doi;
        $paperPublication->save();

        return redirect()->route('paper_publications.index');
    }

    // Remove the specified paper publication from storage
    public function destroy(PaperPublication $paperPublication)
    {
        if ($paperPublication->user_id !== auth()->id()) {
            return redirect()->route('paper_publications.index');
        }

        $paperPublication->delete();
        return redirect()->route('paper_publications.index');
    }
}
