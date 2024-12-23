@extends('layouts.app')

@section('title', 'Achievements')

@section('content')
    <div class="container">
        <h1>Student Achievements</h1>
        <a href="{{ route('achievements.create') }}" class="btn btn-primary mb-3">Add New Achievement</a>
        <form method="GET" action="{{ route('achievements.index') }}">
            <div class="search-bar">
                <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
            </div>
        </form>
        @if ($achievements->isEmpty())
            <p>No achievements found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Document</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($achievements as $achievement)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $achievement->title }}</td>
                            <td>{{ Str::limit($achievement->description, 50) }}</td>
                            <td>
                                @if($achievement->document_path)
                                    <a href="{{ Storage::url($achievement->document_path) }}" target="_blank">View</a>
                                @else
                                    No Document
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('achievements.edit', $achievement->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST" style="display:inline;">
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
