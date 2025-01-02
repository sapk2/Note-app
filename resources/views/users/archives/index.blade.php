@extends('layouts.users')

@section('user-content')
    <div class="container mx-auto my-5">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('users.dashboard') }}" 
               class="inline-block text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 transition-colors">
                Back
            </a>
        </div>

        <!-- Notes Grid -->
        <div class="w-full sm:w-full bg-gray p-4 rounded-lg shadow-lg">
            <h1 class="text-white text-2xl font-bold">Archived Notes</h1>
            <hr class="border-t-3 border-red-500 mt-2">
            
            <!-- Check if there are archived notes -->
            @if($archivednotes->isEmpty())
                <p class="text-white">No archived notes found.</p>
            @else
                <div class="grid grid-cols-1 mt-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($archivednotes as $note)
                        <div class="bg-gray-800 text-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                            <h3 class="text-lg font-semibold mb-2">{{ $note->title }}</h3>
                            <p class="text-sm">{{ $note->content }}</p>
                            <form action="{{ route('users.notes.unarchive', $note->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="mt-2 px-4 py-2  rounded text-white hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                  </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div> 
    </div>
@endsection
