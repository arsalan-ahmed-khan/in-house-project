@extends('layouts.app')

@section('title', 'Edit Course/Workshop')

@section('content')
    <div class="container">
        <h1>Edit Course/Workshop</h1>
        <form action="{{ route('courses_workshops.update', $courses_workshop->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $courses_workshop->title }}" placeholder="Title" required>
            <input type="text" name="organizing_institute" value="{{ $courses_workshop->organizing_institute }}" placeholder="Organizing Institute" required>
            <input type="text" name="location" value="{{ $courses_workshop->location }}" placeholder="Location">
            <input type="date" name="start_date" value="{{ $courses_workshop->start_date }}" required>
            <input type="date" name="end_date" value="{{ $courses_workshop->end_date }}">
            <input type="text" name="duration" value="{{ $courses_workshop->duration }}">
            <select name="type" required>
                <option value="course" {{ $courses_workshop->type === 'course' ? 'selected' : '' }}>Course</option>
                <option value="workshop" {{ $courses_workshop->type === 'workshop' ? 'selected' : '' }}>Workshop</option>
            </select>
            <input type="file" name="certificate" accept=".pdf">
            @if ($courses_workshop->certificate)
                <p>Current Certificate: <a href="{{ Storage::url($courses_workshop->certificate) }}" target="_blank">View</a></p>
            @endif
            <button type="submit">Update Course/Workshop</button>
        </form>
        <br>
        <a class="btn" href="{{ route('courses_workshops.index') }}">Back to Courses/Workshops</a>
    </div>
@endsection
