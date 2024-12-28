@extends('layouts.users')

@section('user-content')
<div class="container mt-4">
    

    <div class="max-w-sm p-6 ml-20 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="card text-white basis-1/4 bg-dark ml-4">
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
                    <a href="{{ route('users.dashboard') }}" class="bg-gray-800 text-white px-4 py-2  rounded hover:bg-gray-900"> back</a>
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
