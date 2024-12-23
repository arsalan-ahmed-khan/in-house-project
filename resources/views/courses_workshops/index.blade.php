@extends('layouts.app')

@section('title', 'Courses/Workshops')

@section('content')
    <div class="container">
        <h1>Courses/Workshops</h1>
        <a href="{{ route('courses_workshops.create') }}" class="btn btn-primary mb-3">Add New Course/Workshop</a>
        <form method="GET" action="{{ route('courses_workshops.index') }}">
            <div class="search-bar">
                <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
            </div>
        </form>
        @if ($coursesWorkshops->isEmpty())
            <p>No courses/workshops found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Organizing Institute</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Duration</th>
                        <th>Certificate</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coursesWorkshops as $courseWorkshop)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $courseWorkshop->title }}</td>
                            <td>{{ $courseWorkshop->organizing_institute }}</td>
                            <td>{{ ucfirst($courseWorkshop->type) }}</td>
                            <td>{{ $courseWorkshop->location }}</td>
                            <td>{{ $courseWorkshop->start_date}}</td>
                            <td>{{ $courseWorkshop->end_date}}</td>
                            <td>{{ $courseWorkshop->duration}}</td>
                            <td>
                                @if($courseWorkshop->document_path)
                                    <a href="{{ Storage::url($courseWorkshop->document_path) }}" target="_blank">View</a>
                                @else
                                    No Certificate
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('courses_workshops.edit', $courseWorkshop->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('courses_workshops.destroy', $courseWorkshop->id) }}" method="POST" style="display:inline;">
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
