@extends('layouts.app')

@section('title', 'Add Achievement')

@section('content')
    <div class="container">
        <h1>Add Achievement</h1>
        <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter description" required></textarea>
            </div>
            <div class="form-group">
                <label for="document">Document (PDF)</label>
                <input type="file" name="document" id="document" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Add Achievement</button>
            <a href="{{ route('achievements.index') }}" class="btn btn-secondary ml-2">Back to Achievements</a>
        </form>
    </div>
@endsection
