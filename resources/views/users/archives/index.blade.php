@extends('layouts.users')

@section('user-content')
    <div class="container mx-auto my-5">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('users.dashboard') }}" 
               class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 transition-colors">
                Back to Dashboard
            </a>
        </div>

        <!-- Notes Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($archivednotes as $note)
                <div class="bg-gray-800 text-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold mb-2">{{ $note->title }}</h3>
                    <p class="text-sm">{{ $note->content }}</p>
                    <form action="{{ route('users.notes.unarchive', $note->id) }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" 
                                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300">
                            Unarchive
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
        
    </div>
@endsection
