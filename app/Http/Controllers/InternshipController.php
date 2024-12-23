<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InternshipController extends Controller
{
    // Display a listing of the internships
    public function index(Request $request)
    {
        $query = Internship::where('user_id', auth()->id()); // Ensure user can only view their own records

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where('company', 'like', '%' . $request->search . '%');
        }

        $internships = $query->get();
        return view('internships.index', compact('internships'));
    }

    // Show the form for creating a new internship
    public function create()
    {
        return view('internships.create');
    }

    // Store a newly created internship in storage
    public function store(Request $request)
{
    $request->validate([
        'company' => 'required|string|max:255',
        'duration' => 'required|string|max:255',
        'description' => 'required|string',
        'document' => 'nullable|mimes:pdf|max:2048',
    ]);

    $documentPath = null;
    if ($request->hasFile('document')) {
        $documentPath = $request->file('document')->store('documents', 'public');
    }

    Internship::create([
        'company' => $request->company,
        'duration' => $request->duration,
        'description' => $request->description,
        'document_path' => $documentPath,
        'user_id' => auth()->id(), // Assign the current user's ID
    ]);

    return redirect()->route('internships.index');
}

    // Show the form for editing the specified internship
    public function edit(Internship $internship)
    {
        return view('internships.edit', compact('internship'));
    }

    // Update the specified internship in storage
    public function update(Request $request, Internship $internship)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'description' => 'required|string',
            'document' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('document')) {
            // Delete old document if exists
            if ($internship->document_path) {
                Storage::delete('public/' . $internship->document_path);
            }

            $documentPath = $request->file('document')->store('documents', 'public');
            $internship->document_path = $documentPath;
        }

        $internship->company = $request->company;
        $internship->duration = $request->duration;
        $internship->description = $request->description;
        $internship->save();

        return redirect()->route('internships.index');
    }

    // Remove the specified internship from storage
    public function destroy(Internship $internship)
    {
        if ($internship->document_path) {
            Storage::delete('public/' . $internship->document_path);
        }

        $internship->delete();
        return redirect()->route('internships.index');
    }
}