@extends('layouts.users')

@section('user-content')
<div class="container mt-4">
    

<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="card text-white bg-dark">
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
                <a href="{{ route('users.dashboard') }}" class="btn btn-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path d="M9.195 18.44c1.25.714 2.805-.189 2.805-1.629v-2.34l6.945 3.968c1.25.715 2.805-.188 2.805-1.628V8.69c0-1.44-1.555-2.343-2.805-1.628L12 11.029v-2.34c0-1.44-1.555-2.343-2.805-1.628l-7.108 4.061c-1.26.72-1.26 2.536 0 3.256l7.108 4.061Z" />
                  </svg>
                  </a>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
