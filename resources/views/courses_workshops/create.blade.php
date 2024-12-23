@extends('layouts.app')

@section('title', 'Add Course/Workshop')

@section('content')
    <div class="container">
        <h1>Add Course/Workshop</h1>
        <form action="{{ route('courses_workshops.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    class="form-control @error('title') is-invalid @enderror" 
                    value="{{ old('title') }}" 
                    placeholder="Enter title" 
                    required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="organizing_institute">Organizing Institute</label>
                <input 
                    type="text" 
                    name="organizing_institute" 
                    id="organizing_institute" 
                    class="form-control @error('organizing_institute') is-invalid @enderror" 
                    value="{{ old('organizing_institute') }}" 
                    placeholder="Enter organizing institute" 
                    required>
                @error('organizing_institute')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select 
                    name="type" 
                    id="type" 
                    class="form-control @error('type') is-invalid @enderror">
                    <option value="course" {{ old('type') == 'course' ? 'selected' : '' }}>Course</option>
                    <option value="workshop" {{ old('type') == 'workshop' ? 'selected' : '' }}>Workshop</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input 
                    type="text" 
                    name="location" 
                    id="location" 
                    class="form-control @error('location') is-invalid @enderror" 
                    value="{{ old('location') }}" 
                    placeholder="Enter location" 
                    required>
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input 
                    type="date" 
                    name="start_date" 
                    id="start_date" 
                    class="form-control @error('start_date') is-invalid @enderror" 
                    value="{{ old('start_date') }}" 
                    required>
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input 
                    type="date" 
                    name="end_date" 
                    id="end_date" 
                    class="form-control @error('end_date') is-invalid @enderror" 
                    value="{{ old('end_date') }}" 
                    required>
                @error('end_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
            <label for="duration">Duration</label>
                <input 
                    type="text" 
                    name="duration" 
                    id="duration" 
                    class="form-control @error('duration') is-invalid @enderror" 
                    value="{{ old('duration') }}" 
                    required>
                @error('duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="document">Certificate (PDF)</label>
                <input 
                    type="file" 
                    name="document" 
                    id="document" 
                    class="form-control-file @error('document') is-invalid @enderror">
                @error('document')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add Course/Workshop</button>
            <a href="{{ route('courses_workshops.index') }}" class="btn btn-secondary ml-2">Back to Courses/Workshops</a>
        </form>
    </div>
@endsection
