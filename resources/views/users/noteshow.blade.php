@extends('layouts.users')
@section('user-content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h2>{{ $note->title }}</h2>
        </div>
        <div class="card-body">
            <p>{{ $note->content }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <div>
                <span class="badge bg-info">{{ $note->is_shared ? 'Shared' : 'Private' }}</span>
                <span class="badge bg-secondary">{{ $note->is_archived ? 'Archived' : 'Active' }}</span>
                <span class="badge bg-warning">{{ $note->is_pinned ? 'Pinned' : '' }}</span>
            </div>
            <div>
                <a href="{{ route('users.dashboard') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection