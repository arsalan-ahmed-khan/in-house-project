<?php

namespace App\Http\Controllers;

use App\Models\CourseWorkshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseWorkshopController extends Controller
{
    // Display a listing of the courses/workshops
    public function index(Request $request)
    {
        $query = CourseWorkshop::where('user_id', auth()->id());

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('organizing_institute', 'like', '%' . $request->search . '%');
        }

        $coursesWorkshops = $query->get();
        return view('courses_workshops.index', compact('coursesWorkshops'));
    }

    // Show the form for creating a new course/workshop
    public function create()
    {
        return view('courses_workshops.create');
    }

    // Store a newly created course/workshop in storage
    public function store(Request $request)
    {   
        $request->validate([
            'type' => 'required|string',
            'title' => 'required|string|max:255',
            'organizing_institute' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'duration' => 'nullable|string|min:1',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'document' => 'nullable|mimes:pdf|max:2048',

        ]);

        $certificatePath = null;
        if ($request->hasFile('document')) {
            $certificatePath = $request->file('document')->store('documents', 'public');
        }

        CourseWorkshop::create([
            'user_id' => auth()->id(),
            'type' => $request->type,
            'title' => $request->title,
            'organizing_institute' => $request->organizing_institute,
            'location' => $request->location,
            'duration' => $request->duration,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'document_path' => $certificatePath
        ]);

        return redirect()->route('courses_workshops.index');
    }

    // Show the form for editing the specified course/workshop
    public function edit(CourseWorkshop $courses_workshop)
    {
        return view('courses_workshops.edit', compact('courses_workshop'));
    }

    // Update the specified course/workshop in storage
    public function update(Request $request, CourseWorkshop $courses_workshop)
    {

        $request->validate([
            'type' => 'required|string',
            'title' => 'required|string|max:255',
            'organizing_institute' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'duration' => 'nullable|string|min:1',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'document' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('document')) {
            if ($courses_workshop->document_path) {
                Storage::delete('public/' . $courses_workshop->document_path);
            }

            $certificatePath = $request->file('document')->store('document', 'public');
            $courses_workshop->document_path = $certificatePath;
        }

        $courses_workshop->type = $request->type;
        $courses_workshop->title = $request->title;
        $courses_workshop->organizing_institute = $request->organizing_institute;
        $courses_workshop->location = $request->location;
        $courses_workshop->duration = $request->duration;
        $courses_workshop->start_date = $request->start_date;
        $courses_workshop->end_date = $request->end_date;
        $courses_workshop->save();

        return redirect()->route('courses_workshops.index');
    }

    // Remove the specified course/workshop from storage
    public function destroy(CourseWorkshop $courses_workshop)
    {

        if ($courses_workshop->document_path) {
            Storage::delete('public/' . $courses_workshop->document_path);
        }

        $courses_workshop->delete();
        return redirect()->route('courses_workshops.index');
    }
}
