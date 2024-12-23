@extends('layouts.app')

@section('title', 'Edit Internship')

@section('content')
    <div class="container">
        <h1>Edit Internship</h1>
        <form action="{{ route('internships.update', $internship->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="company" value="{{ $internship->company }}" placeholder="Company" required>
            <input type="text" name="duration" value="{{ $internship->duration }}" placeholder="Duration" required>
            <textarea name="description" placeholder="Description" required>{{ $internship->description }}</textarea>
            <input type="file" name="document" accept=".pdf">
            @if ($internship->document)
                <p>Current Document: <a href="{{ Storage::url($internship->document) }}" target="_blank">View</a></p>
            @endif
            <button type="submit">Update Internship</button>
        </form>
        <br>
        <a class="btn" href="{{ route('internships.index') }}">Back to Internships</a>
    </div>
@endsection
