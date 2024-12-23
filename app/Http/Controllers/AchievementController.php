<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    // Display a listing of the achievements
    public function index(Request $request)
    {
        $query = Achievement::where('user_id', auth()->id()); // Ensure user can only view their own records

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $achievements = $query->get();
        return view('achievements.index', compact('achievements'));
    }

    // Show the form for creating a new achievement
    public function create()
    {
        return view('achievements.create');
    }

    // Store a newly created achievement in storage
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'document' => 'nullable|mimes:pdf|max:2048',
    ]);

    $documentPath = null;
    if ($request->hasFile('document')) {
        $documentPath = $request->file('document')->store('documents', 'public');
    }

    Achievement::create([
        'title' => $request->title,
        'description' => $request->description,
        'document_path' => $documentPath,
        'user_id' => auth()->id(), // Ensures the logged-in user's ID is assigned
    ]);

    return redirect()->route('achievements.index');
}

    // Show the form for editing the specified achievement
    public function edit(Achievement $achievement)
    {
        return view('achievements.edit', compact('achievement'));
    }

    // Update the specified achievement in storage
    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'document' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('document')) {
            // Delete old document if exists
            if ($achievement->document_path) {
                Storage::delete('public/' . $achievement->document_path);
            }

            $documentPath = $request->file('document')->store('documents', 'public');
            $achievement->document_path = $documentPath;
        }

        $achievement->title = $request->title;
        $achievement->description = $request->description;
        $achievement->save();

        return redirect()->route('achievements.index');
    }

    // Remove the specified achievement from storage
    public function destroy(Achievement $achievement)
    {
        if ($achievement->document_path) {
            Storage::delete('public/' . $achievement->document_path);
        }

        $achievement->delete();
        return redirect()->route('achievements.index');
    }
}