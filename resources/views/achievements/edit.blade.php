@extends('layouts.app')

@section('title', 'Edit Achievement')

@section('content')
    <div class="container">
        <h1>Edit Achievement</h1>
        <form action="{{ route('achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $achievement->title }}" placeholder="Achievement Title" required>
            <textarea name="description" placeholder="Description" required>{{ $achievement->description }}</textarea>
            <input type="file" name="document" accept=".pdf">
            @if ($achievement->document)
                <p>Current Document: <a href="{{ Storage::url($achievement->document) }}" target="_blank">View</a></p>
            @endif
            <button type="submit">Update Achievement</button>
        </form>
        <br>
        <a class="btn" href="{{ route('achievements.index') }}">Back to Achievements</a>
    </div>
@endsection
