@extends('layouts.app')

@section('title', 'Internships')

@section('content')
    <div class="container">
        <h1>Student Internships</h1>
        <a href="{{ route('internships.create') }}" class="btn btn-primary mb-3">Add New Internship</a>
        
        <form method="GET" action="{{ route('internships.index') }}">
            <div class="search-bar">
                <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
            </div>
        </form>

        @if ($internships->isEmpty())
            <p>No internships found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company</th>
                        <th>Duration</th>
                        <th>Description</th>
                        <th>Document</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($internships as $internship)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $internship->company }}</td>
                            <td>{{ $internship->duration }}</td>
                            <td>{{ Str::limit($internship->description, 50) }}</td>
                            <td>
                                @if($internship->document_path)
                                    <a href="{{ Storage::url($internship->document_path) }}" target="_blank">View</a>
                                @else
                                    No Document
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('internships.edit', $internship->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('internships.destroy', $internship->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
