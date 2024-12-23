@extends('layouts.app')

@section('title', 'Add Internship')

@section('content')
    <div class="container">
        <h1>Add Internship</h1>
        <form action="{{ route('internships.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" name="company" id="company" class="form-control" placeholder="Enter company name" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" name="duration" id="duration" class="form-control" placeholder="Enter duration" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter description" required></textarea>
            </div>
            <div class="form-group">
                <label for="document">Document (PDF)</label>
                <input type="file" name="document" id="document" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Add Internship</button>
            <a href="{{ route('internships.index') }}" class="btn btn-secondary ml-2">Back to Internships</a>
        </form>
    </div>
@endsection
