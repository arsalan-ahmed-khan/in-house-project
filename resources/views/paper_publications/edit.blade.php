@extends('layouts.app')

@section('title', 'Edit Paper Publication')

@section('content')
    <div class="container">
        <h1>Edit Paper Publication</h1>
        <form action="{{ route('paper_publications.update', $paperPublication->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="paper_title">Paper Title</label>
                <input 
                    type="text" 
                    name="paper_title" 
                    id="paper_title" 
                    class="form-control @error('paper_title') is-invalid @enderror" 
                    value="{{ old('paper_title', $paperPublication->paper_title) }}" 
                    required>
                @error('paper_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="conference_journal_name">Conference/Journal Name</label>
                <input 
                    type="text" 
                    name="conference_journal_name" 
                    id="conference_journal_name" 
                    class="form-control @error('conference_journal_name') is-invalid @enderror" 
                    value="{{ old('conference_journal_name', $paperPublication->conference_journal_name) }}" 
                    required>
                @error('conference_journal_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="national_international">Type</label>
                <select 
                    name="national_international" 
                    id="national_international" 
                    class="form-control @error('national_international') is-invalid @enderror">
                    <option value="national" {{ old('national_international', $paperPublication->national_international) == 'national' ? 'selected' : '' }}>National</option>
                    <option value="international" {{ old('national_international', $paperPublication->national_international) == 'international' ? 'selected' : '' }}>International</option>
                </select>
                @error('national_international')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="year_of_publication">Year of Publication</label>
                <input 
                    type="number" 
                    name="year_of_publication" 
                    id="year_of_publication" 
                    class="form-control @error('year_of_publication') is-invalid @enderror" 
                    value="{{ old('year_of_publication', $paperPublication->year_of_publication) }}" 
                    required>
                @error('year_of_publication')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="isbn_issn_no">ISBN/ISSN No</label>
                <input 
                    type="text" 
                    name="isbn_issn_no" 
                    id="isbn_issn_no" 
                    class="form-control @error('isbn_issn_no') is-invalid @enderror" 
                    value="{{ old('isbn_issn_no', $paperPublication->isbn_issn_no) }}">
                @error('isbn_issn_no')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="publisher_name">Publisher Name</label>
                <input 
                    type="text" 
                    name="publisher_name" 
                    id="publisher_name" 
                    class="form-control @error('publisher_name') is-invalid @enderror" 
                    value="{{ old('publisher_name', $paperPublication->publisher_name) }}">
                @error('publisher_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="indexing">Indexing</label>
                <input 
                    type="text" 
                    name="indexing" 
                    id="indexing" 
                    class="form-control @error('indexing') is-invalid @enderror" 
                    value="{{ old('indexing', $paperPublication->indexing) }}">
                @error('indexing')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="other">Other Details</label>
                <textarea 
                    name="other" 
                    id="other" 
                    class="form-control @error('other') is-invalid @enderror" 
                    rows="3">{{ old('other', $paperPublication->other) }}</textarea>
                @error('other')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="paper_weblink">Paper Weblink</label>
                <input 
                    type="url" 
                    name="paper_weblink" 
                    id="paper_weblink" 
                    class="form-control @error('paper_weblink') is-invalid @enderror" 
                    value="{{ old('paper_weblink', $paperPublication->paper_weblink) }}">
                @error('paper_weblink')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="doi">DOI</label>
                <input 
                    type="text" 
                    name="doi" 
                    id="doi" 
                    class="form-control @error('doi') is-invalid @enderror" 
                    value="{{ old('doi', $paperPublication->doi) }}">
                @error('doi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="document">Document (PDF)</label>
                <input 
                    type="file" 
                    name="document" 
                    id="document" 
                    class="form-control-file @error('document') is-invalid @enderror">
                @if($paperPublication->document)
                    <a href="{{ Storage::url($paperPublication->document) }}" target="_blank">View Current Document</a>
                @endif
                @error('document')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Publication</button>
            <a href="{{ route('paper_publications.index') }}" class="btn btn-secondary ml-2">Back to Publications</a>
        </form>
    </div>
@endsection
