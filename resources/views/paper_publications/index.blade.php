@extends('layouts.app')

@section('title', 'Paper Publications')

@section('content')
    <div class="container">
        <h1>Paper Publications</h1>
        <a href="{{ route('paper_publications.create') }}" class="btn btn-primary mb-3">Add New Publication</a>
        <form method="GET" action="{{ route('paper_publications.index') }}">
            <div class="search-bar">
                <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
            </div>
        </form>
        @if($paperPublications->isEmpty())
            <p class="text-center">No publications found. Start by adding one!</p>
        @else
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Title</th>
                        <th>Conference/Journal</th>
                        <th>Type</th>
                        <th>Year</th>
                        <th>ISBN/ISSN</th>
                        <th>Publisher</th>
                        <th>Indexing</th>
                        <th>Weblink</th>
                        <th>DOI</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paperPublications as $publication)
                        <tr>
                            <td>{{ $publication->paper_title }}</td>
                            <td>{{ $publication->conference_journal_name }}</td>
                            <td>{{ ucfirst($publication->national_international) }}</td>
                            <td>{{ $publication->year_of_publication }}</td>
                            <td>{{ $publication->isbn_issn_no ?? 'N/A' }}</td>
                            <td>{{ $publication->publisher_name ?? 'N/A' }}</td>
                            <td>{{ $publication->indexing ?? 'N/A' }}</td>
                            <td>
                                @if($publication->paper_weblink)
                                    <a href="{{ $publication->paper_weblink }}" target="_blank">View</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($publication->doi)
                                    <a href="https://doi.org/{{ $publication->doi }}" target="_blank">{{ $publication->doi }}</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('paper_publications.edit', $publication->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('paper_publications.destroy', $publication->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this publication?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
